<?php

namespace Database\Seeders;

use App\Models\Master\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    protected $daftar_role = [
        Role::SUPERADMIN,
        Role::ADMIN,
        Role::EDITOR,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->daftar_role as $role) {
            Role::query()->create([
                'uuid_role' => new_uuid(),
                'nama_role' => $role
            ]);
        }
    }
}
