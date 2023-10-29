<?php

namespace Database\Seeders;

use App\Models\Master\Tour;
use App\Models\Master\TourDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TourSeeder extends Seeder
{
    protected $daftar_tour = [
        [
            'nama_tour' => 'Gunung Bromo',
            'detail' => [
                'harga' => '350000',
                'destinasi' => [
                    'Penanjakan ( Sunrise View )',
                    'Kawah Bromo',
                    'Pasir Berbisik',
                    'Bukit Savana'
                ],
                'layanan_include' => [
                    'Akomodasi Transport PP (Pergi Pulang)',
                    'Hardtop Bromo',
                    'Tiket masuk lokal wisata bromo',
                    'Makan 2x',
                    'Minum 600ml 4x',
                    'Guide Lokal',
                    'Supir & BBM'
                ],
                'layanan_exclude' => [
                    'Biaya Masuk Toll',
                    'Tiket masuk wisata yang tidak dalam paket',
                    'Biaya makan terlepas dari paket',
                ],
                'min_pax' => '5',
                'syarat' => '5'
            ],
            'foto_slider' => [

            ]
        ],
        [
            'nama_tour' => 'Gunung Bromo Ijen',
            'detail' => [
                'harga' => '850000',
                'destinasi' => [
                    'Penanjakan ( Sunrise View )',
                    'Kawah Bromo',
                    'Pasir Berbisik',
                    'Bukit Savana',
                    'Kawah Ijen',
                    'Hutan Mati'
                ],
                'layanan_include' => [
                    'Akomodasi Transport PP (Pergi Pulang)',
                    'Hardtop Bromo',
                    'Tiket masuk lokal wisata bromo',
                    'Makan 2x',
                    'Minum 600ml 4x',
                    'Guide Lokal',
                    'Supir & BBM'
                ],
                'layanan_exclude' => [
                    'Biaya Masuk Toll',
                    'Tiket masuk wisata yang tidak dalam paket',
                    'Biaya makan terlepas dari paket',
                ],
                'min_pax' => '5',
                'syarat' => '5'
            ],
            'foto_slider' => [

            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->daftar_tour as $key => $item) {
            $tour = Tour::query()->create([
               'uuid_tour' => new_uuid(),
                'nama_tour' => $item['nama_tour'],
                'slug_tour' =>  Str::slug($item['nama_tour'], '_')
            ]);

            $detail = $item['detail'];

            $detail_tour = TourDetail::query()->create([
                'uuid_tour_detail' => new_uuid(),
                'uuid_tour' => $tour->uuid_tour,
                'harga' => $detail['harga'],
                'destinasi' => json_encode($detail['destinasi']),
                'layanan_include'=> json_encode($detail['layanan_include']),
                'layanan_exclude' => json_encode($detail['layanan_exclude']),
                'min_pax' => $detail['min_pax'],
                'syarat' => $detail['syarat'],
            ]);
        }
    }
}
