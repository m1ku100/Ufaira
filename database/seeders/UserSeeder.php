<?php

namespace Database\Seeders;

use App\Models\Master\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    protected $daftar_admin = [
        'Admin', 'Admin_2'
    ];

    protected $daftar_superadmin = [
        'IT',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengguna = User::query()->create([
            'email_pengguna'     => 'admin@email.com',
            'nama_pengguna'      => 'Admin',
            'password_pengguna'  => bcrypt('admin'),
            'uuid_pengguna' => new_uuid()
        ]);

        $pengguna->getRole()->attach(
            Role::search(Role::ADMIN)
        );

        foreach ($this->daftar_admin as $item) {
            $pengguna = User::query()->create([
                'email_pengguna'     => Str::replaceArray('?', [str_replace(' ', '', strtolower($item))], '?@admin.com'),
                'nama_pengguna'      => $item,
                'password_pengguna'  => bcrypt(strtolower($item)),
                'uuid_pengguna' => new_uuid()
            ]);

            $pengguna->getRole()->attach(
                Role::search(Role::ADMIN)
            );
        }

        foreach ($this->daftar_superadmin as $item) {
            $pengguna = User::query()->create([
                'email_pengguna'     => Str::replaceArray('?', [str_replace(' ', '', strtolower($item))], '?@super.com'),
                'nama_pengguna'      => $item,
                'password_pengguna'  => bcrypt(strtolower($item)),
                'uuid_pengguna' => new_uuid()
            ]);

            $pengguna->getRole()->attach(
                Role::search(Role::SUPERADMIN)
            );
        }
    }
}
