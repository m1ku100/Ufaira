<?php

namespace App\Models\Master;

use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasStringPrimaryKey,
        HasHistoryActivities;

    protected $table = 'm_role';

    protected $primaryKey = 'uuid_role';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $object_name_field = 'nama_role';

    public const PELANGGAN = 'Pelanggan';

    public const ADMIN = 'Admin';

    public const SUPERADMIN = 'Super Admin';

    public const EDITOR = 'Editor';


    /**
     * Mendapatkan daftar menu yang terhubung ke role terkait
     *
     * @param bool $query_return
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\Illuminate\Support\Collection
     */
    public function getRoleMenu($query_return = true)
    {
        $relation = $this->hasMany(RoleMenu::class, 'uuid_role', 'uuid_role');

        return ($query_return ? $relation : $relation->get());
    }

    /**
     * Mendapatkan daftar pengguna yang memiliki role tertentu
     *
     * @param boolean $query_return
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Support\Collection
     */
    public function getPengguna($query_return = true)
    {
        $relation = $this->belongsToMany(User::class, 'm_pengguna_role', 'uuid_role', 'uuid_pengguna');

        return ($query_return ? $relation : $relation->get());
    }

    /**
     * Mendapatkan role dengan nama tertentu
     *
     * @param string $nama_role
     *
     * @return Role|null
     */
    public static function search($nama_role)
    {
        return static::where('nama_role', $nama_role)->first();
    }

    /**
     * Mendapatkan daftar role untuk ditampilkan pada combobox/dropdown/select
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function selectData(Request $request)
    {
        $builder = self::query()
            ->selectRaw("uuid_role as id, nama_role as text");

        $builder->when($request->has('q'), function ($query) use ($request) {
            $query->where('m_role.nama_role', 'like', '%' . $request->q . '%');
        });

        return $builder->get();
    }

    /**
     * Menyimpan role
     *
     * @param Role|null $role
     * @param array $data
     * @return bool
     */
    public function simpan($role, $data)
    {
        DB::beginTransaction();

        try {
            if (is_null($role)) {
                $role = Role::query()->create($data);

                $role->writeCreateLog($role->toArray(), 'Menambah Role');
            } else {
                $role->update($data);

                $role->writeUpdateLog($role->getChanges(), 'Mengubah Role');
            }
        } catch (Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }

    public function simpanAksesMenu(Request $request)
    {
        DB::beginTransaction();

        try {

            $menu = Menu::query()->find($request->input('menu.uuid_menu'));

            $role = Role::query()->find($request->input('role.uuid_role'));

            $role->getRoleMenu()
                ->where('uuid_menu', $menu->uuid_menu)
                ->delete();

            $role_menu = null;

            $menu->update([
                'urutan_menu' => 0
            ]);

            if (is_boolean($request->input('menu.akses'))) {
                $role_menu = $role->getRoleMenu()
                    ->create([
                        'uuid_menu' => $menu->uuid_menu,
                        'uuid_role_menu' => new_uuid()
                    ]);
            }

            if (! is_null($role_menu)) {
                if ($request->has('daftar_akses')) {
                    foreach ($request->daftar_akses as $menu_akses) {
                        if (is_boolean($menu_akses['akses'])) {
                            $role_menu->getMenuAkses()
                                ->attach($menu_akses['uuid_menu_akses']);
                        }
                    }
                }
            }
        } catch (\Exception $exception) {
            DB::rollback();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }

    /**
     * Mendapatkan daftar menu dari role terkait
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \App\Repositories\RepositoryResponse
     */
    public function getDaftarMenu(Request $request)
    {
        $uuid_role = $request->uuid_role;

        $builder = DB::table('m_menu as mm')
            ->selectRaw('mm.uuid_menu, mm.nama_tampilan_menu, if(mrm.uuid_role is null, 0, 1) as akses,
									 mm.urutan_menu')
            ->leftJoin('m_role_menu as mrm', function ($query) use ($uuid_role) {
                $query->on('mm.uuid_menu', 'mrm.uuid_menu')
                    ->where('mrm.uuid_role', $uuid_role);
            })
            ->whereNotNull('mm.uuid_menu_induk')
            ->orderBy('mm.urutan_menu');

        $daftar_menu = $builder->get();

        return $daftar_menu;
    }

    /**
     * Mendapatkan daftar hak akses dari menu yang dimiliki
     * oleh role tertentu
     *
     * @param \Illuminate\Http\JsonResponse $request
     *
     * @return \App\Repositories\RepositoryResponse
     */
    public function getDaftarMenuAkses(Request $request)
    {
        $uuid_role = $request->uuid_role;
        $uuid_menu = $request->uuid_menu;

        $builder = DB::table('m_menu as mm')
            ->selectRaw('mma.uuid_menu_akses, mma.nama_akses, if(mrma.uuid_menu_akses is null, 0, 1) as akses')
            ->leftJoin('m_role_menu as mrm', function ($query) use ($uuid_role) {
                $query->on('mm.uuid_menu', 'mrm.uuid_menu')
                    ->where('mrm.uuid_role', $uuid_role);
            })
            ->leftJoin('m_menu_akses as mma', 'mma.uuid_menu', 'mm.uuid_menu')
            ->leftJoin('m_role_menu_akses as mrma', function ($query) {
                $query->on('mrma.uuid_role_menu', 'mrm.uuid_role_menu')
                    ->on('mrma.uuid_menu_akses', 'mma.uuid_menu_akses');
            })
            ->where('mm.uuid_menu', $uuid_menu)
            ->whereNotNull('mm.uuid_menu_induk')
            ->whereNotNull('mma.nama_akses');

        $daftar_menu = $builder->get();

        return $daftar_menu;
    }

    /**
     * Menghapus data role
     *
     * @return boolean|string
     */
    public function hapus()
    {
        DB::beginTransaction();

        try {
            $data = $this->toArray();

            $this->delete();

            $this->writeForceDeleteLog($data, 'Menghapus Permanen Role');
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }
}
