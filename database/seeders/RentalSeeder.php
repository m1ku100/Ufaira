<?php

namespace Database\Seeders;

use App\Models\Master\Rental;
use Illuminate\Database\Seeder;

class RentalSeeder extends Seeder
{
    protected $daftar_role = [
        [
            'nama_kendaraan' => 'apv',
            'harga'          => 800000,
            'min_pax'          => '4',
            'is_automatic' => false,
        ],
        [
            'nama_kendaraan' => 'evalia',
            'harga'          => 500000,
            'min_pax'          => '5',
            'is_automatic' => false,
        ],
        [
            'nama_kendaraan' => 'hiace',
            'harga'          => 1200000,
            'min_pax'          => '10',
            'is_automatic' => false,
        ],
        [
            'nama_kendaraan' => 'zenix',
            'harga'          => 800000,
            'min_pax'          => '6',
            'is_automatic' => true,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->daftar_role as $key => $role) {
            Rental::query()->create([
                'nama_kendaraan' => $role['nama_kendaraan'],
                'harga' => $role['harga'],
                'min_pax' => $role['min_pax'],
                'is_automatic' => $role['is_automatic'],
                'is_include_supir' => false,
                'is_include_bbm' => false,
                'status_rental' => Rental::AKTIF,
                'foto' => 'assets/images/rental/'. $role['nama_kendaraan'] . '.png',
                'uuid_rental' =>  new_uuid()
            ]);
        }
    }
}
