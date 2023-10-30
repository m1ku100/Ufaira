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
                'syarat' => ' <li><i class="fa fa-circle"></i>Harga di atas berlaku untuk WNI, terdapat charge untuk
                                    tiket dan service WNA sebesar Rp xxx.xxx ,- per orang (dapat dibayar langsung ke
                                    driver di hari-H)
                                </li>
                                <li><i class="fa fa-circle"></i> Kami menerima pembayaran penuh atau 30% di muka sebagai
                                    tanda jadi, pelunasan bisa dibayarkan cash ke tour leader / via transfer / QRIS
                                </li>
                                <li><i class="fa fa-circle"></i> Tanda jadi tidak dapat direfund bila terjadi pembatalan
                                    dari pihak tamu, reschedule kadangkala memungkinkan untuk konfirmasi maksimal H-1
                                </li>
                                <li><i class="fa fa-circle"></i> Destinasi Wisata tidak baku dan dapat berubah karena
                                    kondisi di area Bromo (lalu lintas, cuaca) tanpa mengganggu agenda secara
                                    keseluruhan
                                </li>'
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
                'syarat' => ' <li><i class="fa fa-circle"></i>Harga di atas berlaku untuk WNI, terdapat charge untuk
                                    tiket dan service WNA sebesar Rp xxx.xxx ,- per orang (dapat dibayar langsung ke
                                    driver di hari-H)
                                </li>
                                <li><i class="fa fa-circle"></i> Kami menerima pembayaran penuh atau 30% di muka sebagai
                                    tanda jadi, pelunasan bisa dibayarkan cash ke tour leader / via transfer / QRIS
                                </li>
                                <li><i class="fa fa-circle"></i> Tanda jadi tidak dapat direfund bila terjadi pembatalan
                                    dari pihak tamu, reschedule kadangkala memungkinkan untuk konfirmasi maksimal H-1
                                </li>
                                <li><i class="fa fa-circle"></i> Destinasi Wisata tidak baku dan dapat berubah karena
                                    kondisi di area Bromo (lalu lintas, cuaca) tanpa mengganggu agenda secara
                                    keseluruhan
                                </li>'
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
