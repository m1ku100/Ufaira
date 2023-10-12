<?php

namespace Database\Seeders;

use App\Models\Master\Menu;
use App\Support\Privilege\Master\PrivilegePengguna;
use App\Support\Privilege\Master\PrivilegeRole;
use App\Support\Privilege\Master\PrivilegeTour;
use App\Support\Privilege\Profile\PrivilegeBanner;
use App\Support\Privilege\Profile\PrivilegeGallery;
use App\Support\Privilege\Profile\PrivilegePreferensi;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    protected $daftar_menu;

    public function __construct()
    {
        $this->daftar_menu = [
            // untuk Admin & Super admin
            [
                'nama_menu'          => 'Master',
                'nama_tampilan_menu' => 'Master',
                'route_prefix_menu'  => null,
                'view_path_menu'     => null,
                'status_menu'        => 'A',
                'children'      => [
                    [
                        'nama_menu'          => 'Admin - Role',
                        'nama_tampilan_menu' => 'Role',
                        'route_prefix_menu'  => 'master.role.',
                        'view_path_menu'     => 'master/role',
                        'status_menu'        => 'A',
                        'akses'              => PrivilegeRole::getSemuaAkses()
                    ],
                    [
                        'nama_menu'          => 'Admin - Pengguna',
                        'nama_tampilan_menu' => 'Pengguna',
                        'route_prefix_menu'  => 'master.pengguna.',
                        'view_path_menu'     => 'master/pengguna',
                        'status_menu'        => 'A',
                        'akses'              => PrivilegePengguna::getSemuaAkses()
                    ],
                    [
                        'nama_menu'          => 'Admin - Tour',
                        'nama_tampilan_menu' => 'Produk',
                        'route_prefix_menu'  => 'master.produk.',
                        'status_menu'        => 'A',
                        'akses'              => PrivilegeTour::getSemuaAkses()
                    ],
                    [
                        'nama_menu'          => 'Admin - Riwayat Aktivitas',
                        'nama_tampilan_menu' => 'Riwayat Aktivitas',
                        'route_prefix_menu'  => 'admin.riwayat.aktivitas.',
                        'status_menu'        => 'A',
                        'akses'              => []
                    ],
                ]
            ],
            [
                'nama_menu'          => 'Lainnya',
                'nama_tampilan_menu' => 'Lainnya',
                'route_prefix_menu'  => null,
                'status_menu'        => 'A',
                'children'           => [
                    [
                        'nama_menu'          => 'Admin - Preferensi',
                        'nama_tampilan_menu' => 'Preferensi',
                        'route_prefix_menu'  => 'utilities.preferensi.',
                        'status_menu'        => 'A',
                        'akses'              => PrivilegePreferensi::getSemuaAkses()
                    ],
                ]
            ],
            [
                'nama_menu'          => 'Profile',
                'nama_tampilan_menu' => 'Profile',
                'route_prefix_menu'  => null,
                'status_menu'        => 'A',
                'children'      => [
                    [
                        'nama_menu'          => 'Admin - Banner',
                        'nama_tampilan_menu' => 'Banner',
                        'route_prefix_menu'  => 'profile.banner.',
                        'view_path_menu'     => 'profile/banner',
                        'status_menu'        => 'A',
                        'akses'              => PrivilegeBanner::getSemuaAkses()
                    ],
                    [
                        'nama_menu'          => 'Admin - Gallery',
                        'nama_tampilan_menu' => 'Banner',
                        'route_prefix_menu'  => 'profile.banner.',
                        'view_path_menu'     => 'profile/banner',
                        'status_menu'        => 'A',
                        'akses'              => PrivilegeGallery::getSemuaAkses()
                    ],
                ]
            ],
        ];
    }

    public function run()
    {
        foreach ($this->daftar_menu as $arr_menu) {
            $this->createMenu($arr_menu);
        }
    }

    protected function createMenu($arr_menu, Menu $parent = null)
    {
        if (Menu::query()->where('nama_menu', $arr_menu['nama_menu'])->count() == 0) {
            $menu = Menu::query()->create([
                'uuid_menu_induk'    => is_null($parent) ? null : $parent->uuid_menu,
                'nama_menu'          => $arr_menu['nama_menu'],
                'nama_tampilan_menu' => $arr_menu['nama_tampilan_menu'],
                'route_prefix_menu'  => $arr_menu['route_prefix_menu'],
                'status_menu'        => $arr_menu['status_menu'],
                'uuid_menu'          => new_uuid()
            ]);
        } else {
            $menu = Menu::query()->where('nama_menu', $arr_menu['nama_menu'])->first();
        }

        if (isset($arr_menu['akses'])) {
            $this->createAksesMenu($menu, $arr_menu['akses']);
        }

        if (isset($arr_menu['children'])) {
            foreach ($arr_menu['children'] as $arr_child) {
                $this->createMenu($arr_child, $menu);
            }
        }
    }

    protected function createAksesMenu(Menu $menu, $arr_akses)
    {
        foreach ($arr_akses as $akses) {
            if ($menu->getMenuAkses()->where('nama_akses', $akses)->count() == 0) {
                $menu->getMenuAkses()->create([
                    'nama_akses'        => $akses,
                    'uuid_menu_akses'   => new_uuid()
                ]);
            }
        }
    }
}
