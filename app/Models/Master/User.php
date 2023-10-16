<?php

namespace App\Models\Master;

use App\Models\Exception;
use App\Models\Transaksi\PesananPelanggan;
use App\Support\Eloquent\CustomSoftDelete;
use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasStringPrimaryKey, CustomSoftDelete, HasHistoryActivities;

    protected $table = 'm_pengguna';

    protected $primaryKey = 'uuid_pengguna';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $prefix_kode = 'PGN';

    protected $field_kode = 'kode_pengguna';

    protected $object_name_field = 'nama_pengguna';

    protected $status_field = 'status_pengguna';

    protected $literal_name = 'Pengguna';

    public const DIHAPUS = 'D';

    public const AKTIF = 'I';

    /**
     * Ubah default field password menjadi password_pengguna
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password_pengguna;
    }

    /**
     * Mendapatkan daftar role dari pengguna terkait
     *
     * @param boolean $queryReturn
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Collection
     */
    public function getRole($queryReturn = true)
    {
        $relation = $this->belongsToMany(Role::class, 'm_pengguna_role', 'uuid_pengguna', 'uuid_role');

        return ($queryReturn ? $relation : $relation->get());
    }



    /**
     * Mendapatkan daftar menu yang bisa diakses oleh user
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDaftarRoleMenu()
    {
        $daftar_role = $this->getRole(false)
            ->pluck('uuid_role')
            ->toArray();

        $daftar_role_menu = RoleMenu::query()
            ->whereIn('uuid_role', $daftar_role)
            ->get()
            ->pluck('uuid_menu');

        $data = Menu::query()
            ->whereIn('uuid_menu', $daftar_role_menu)
            ->orderBy('urutan_menu')
            ->get();

        return $data;
    }

    /**
     * Mendapatkan daftar menu yang bisa diakses oleh pengguna terkait
     *
     * @return \Illuminate\Support\Collection
     */
    public function getMenu()
    {
        $daftar_menu = collect([]);

        foreach ($this->getRole(false) as $role) {
            foreach ($role->getRoleMenu(false) as $role_menu) {
                $daftar_menu = $daftar_menu->merge($role_menu->getMenu(false));
            }
        }

        return $daftar_menu;
    }

    /**
     * Mengecek apakah user terkait memiliki role tertentu
     *
     * @param string $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            $role = Role::search($role);
        }

        $builder = $this->getRole()
            ->where('m_role.uuid_role', $role->uuid_role)
            ->count();

        return $builder > 0;
    }

    /**
     * Mengecek apakah pengguna terkait memiliki menu tertentu
     *
     * @param string|\App\Models\Master\Menu $menu
     * @return boolean
     */
    public function hasMenu($menu)
    {
        $uuid_menu = null;

        if ($menu instanceof Menu) {
            $uuid_menu = $menu->uuid_menu;
        } else if (is_string($menu)) {
            $uuid_menu = Menu::search($menu)->uuid_menu;
        }

        $builder = DB::table('m_pengguna as mpg')
            ->join('m_pengguna_role as mpr', 'mpr.uuid_pengguna', 'mpg.uuid_pengguna')
            ->join('m_role_menu as mrm', 'mrm.uuid_role', 'mpr.uuid_role')
            ->where('mpg.uuid_pengguna', $this->uuid_pengguna)
            ->where('mrm.uuid_menu', $uuid_menu);

        return $builder->count() > 0;
    }

    /**
     * Mendapatkan akses pengguna terkait ke sebuah aktivitas
     *
     * @param string $nama_akses
     * @return \Illuminate\Database\Query\Builder
     */
    public function getAkses($nama_akses)
    {
        $builder = DB::table('m_menu_akses as ma')
            ->join('m_role_menu_akses as rma', 'ma.uuid_menu_akses', 'rma.uuid_menu_akses')
            ->join('m_role_menu as rm', 'rma.uuid_role_menu', 'rm.uuid_role_menu')
            ->join('m_pengguna_role as pr', 'pr.uuid_role', 'rm.uuid_role')
            ->join('m_pengguna as pg', 'pg.uuid_pengguna', 'pr.uuid_pengguna')
            ->where('ma.nama_akses', $nama_akses)
            ->where('pg.uuid_pengguna', $this->uuid_pengguna);

        return $builder;
    }

    /**
     * Mengecek apakah pengguna terkait memiliki akses ke sebuah aktivitas
     *
     * @param string $nama_akses
     * @return bool
     */
    public function hasPermission($nama_akses)
    {
        $akses = $this->getAkses($nama_akses)->count() > 0;

        return $akses;
    }

    /**
     * Mengecek apakah pengguna terkait tidak memiliki akses ke sebuah aktivitas
     *
     * @param string $nama_akses
     * @return bool
     */
    public function doesntHavePermission($nama_akses)
    {
        $akses = $this->getAkses($nama_akses)->count() == 0;

        return $akses;
    }

    /**
     * Menyimpan data pengguna baik tambah atau ubah
     *
     * @param null|\App\Models\Master\Pengguna $pengguna
     * @param array $data
     * @return boolean|string
     */
    public function simpan($pengguna, $data)
    {
        DB::beginTransaction();

        try {
            if (is_null($pengguna)) {
                $pengguna = self::query()->create($data['user']);

                $pengguna->getRole()->detach();

                foreach ($data['role'] as $uuid_role) {
                    $pengguna->getRole()->attach($uuid_role);
                }


                $pengguna->writeCreateLog($pengguna->toArray(), 'Menambah Pengguna');
            } else {
                $pengguna->update($data['user']);

                $pengguna->getRole()->detach();

                foreach ($data['role'] as $uuid_role) {
                    $pengguna->getRole()->attach($uuid_role);
                }
                $pengguna->writeUpdateLog($pengguna->getChanges(), 'Mengubah Pengguna');
            }
        } catch (Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }

    public function deleteRestore($data)
    {
        DB::beginTransaction();

        try {
            $data = static::query()
                ->updateOrCreate([
                    'uuid_user' => $data['uuid_user']
                ], [
                    'status_pengguna' => $data['status_pengguna']
                ]);

            $this->writeDeleteLog($data,'Nonaktifkan user');

        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }

    /**
     * Menyimpan role ke pengguna tertentu
     *
     * @param array $daftar_uuid_role
     * @return void
     */
    public function simpanRole($daftar_uuid_role)
    {
        $this->getRole()->detach();

        foreach ($daftar_uuid_role as $uuid_role) {
            $this->getRole()->attach($uuid_role);
        }
    }

    /**
     * Mendapatkan daftar pengguna untuk ditampilkan pada tabel
     *
     * @param Request $request
     * @return array
     */
    public function tableData(Request $request)
    {
        $builder = DB::table('m_pengguna as mpg')
            ->selectRaw("*");

        $builder->when(!empty($request->input('search.value')), function ($query) use ($request) {
            $query->where('mpg.nama_pengguna', 'like', '%' . $request->input('search.value') . '%')
                ->orWhere('mpg.email_pengguna', 'like', '%' . $request->input('search.value') . '%');
        });

        $total_data = $builder->count();

        $builder->take($request->length)
            ->offset($request->start);

        return [
            'draw'              => $request->draw,
            'recordsTotal'      => $total_data,
            'recordsFiltered'   => $total_data,
            'data'              => $builder->get()
        ];
    }

    /**
     * Mendapatkan daftar pengguna untuk ditampilkan
     * pada combobox/dropdown/select
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function selectData(Request $request)
    {
        $builder = DB::table('m_pengguna as mpg')
            ->selectRaw("mpg.uuid_pengguna, mpg.nama_pengguna")
            ->when(!empty($request->q), function ($query) use ($request) {
                $query->where('mpg.nama_pengguna', 'like', '%' . $request->q . '%');
            })
            ->take(10);

        $data = $builder->get();

        return $data;
    }
}
