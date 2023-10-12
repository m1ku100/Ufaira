<?php

namespace Database\Seeders;

use App\Models\Master\Menu;
use App\Models\Master\Role;
use App\Support\Utilities\Previlege\Master\PrivilegeUser;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleMenuSeeder extends Seeder
{
    protected $daftar_roles = [
        'Super Admin' => [
            'Admin - Role'                  => '*',
            'Admin - Tour'                => '*',
            'Admin - Pengguna'              => '*',
            'Admin - Riwayat Aktivitas'     => '*',
            'Admin - Banner'                => '*',
            'Admin - Preferensi'            => '*'
        ],
        'Admin' => [
            'Admin - Riwayat Aktivitas'     => '*',
        ],
        'Pelanggan' => [

        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->daftar_roles as $nama_role => $daftar_menu) {
            $role = Role::search($nama_role);

            $role->getRoleMenu()->delete();

            foreach ($daftar_menu as $nama_menu => $daftar_akses) {
                $menu = Menu::search($nama_menu);

                $role->getRoleMenu()->create([
                    'uuid_menu'         => $menu->uuid_menu,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now(),
                    'uuid_role_menu'    => new_uuid()
                ]);

                $role_menu = $role->getRoleMenu(false)
                    ->where('uuid_menu', $menu->uuid_menu)
                    ->first();

                if ($daftar_akses == '*') {
                    foreach ($menu->getMenuAkses()->cursor() as $menu_akses) {
                        $role_menu->getMenuAkses()->attach($menu_akses->uuid_menu_akses);
                    }
                } else if (is_array($daftar_akses)) {
                    foreach ($daftar_akses as $nama_akses) {
                        $menu_akses = $menu->getMenuAkses()
                            ->where('nama_akses', $nama_akses)
                            ->first();

                        $role_menu->getMenuAkses()
                            ->attach($menu_akses->uuid_menu_akses);
                    }
                }
            }
        }
    }
}
