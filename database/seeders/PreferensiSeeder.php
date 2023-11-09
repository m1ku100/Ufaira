<?php

namespace Database\Seeders;

use App\Models\Master\Preferensi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferensiSeeder extends Seeder
{
    protected $preferensi = [
        [
            'key_preferensi'    => 'page',
            'nama_preferensi'   => 'Laman Web',
            'jenis_data'        => null,
            'nilai'             => null,
            'jenis_input'       => null,
            'children'      => [
                [
                    'key_preferensi'    => 'profil_aboutus',
                    'nama_preferensi'   => 'Halaman Tentang Kami',
                    'jenis_data'        => null,
                    'nilai'             => null,
                    'jenis_input'       => null,
                    'children'      => [
                        [
                            'key_preferensi'    => 'teks_aboutus',
                            'nama_preferensi'   => 'Teks About Us',
                            'jenis_data'        => Preferensi::STRING,
                            'nilai'             =>
                                '  <p>Kami merupakan salah satu biro perjalanan dan transportasi yang ada di kota Surabaya dan
                                sudah beroperasi sejak 2013. Kami melayani segala aspek tentang paket liburan mulai dari
                                paket wisata, ziarah, persewaan mobil include driver, gathering perusahaan, outbond, dan
                                rafting.
                                Kita juga sudah berkerja sama dengan berbagai pihak hotel di sekitar Bromo, Ijen,
                                Banyuwangi, Bali, Yogyakarta, Malang DLL</p>

                                  <p>
                                Produk Ufaira Tour N Travel
                                City Tour, Explore Adventure, Petualangan Ransel dan Koper yang unik
                                Kategori: Kota, Budaya, Belanja, Kuliner, Pantai, Gunung, Pulau, Air Terjun, dan Budaya Lokal
                                Level: Light Adventure atau Petualangan Ringan
                                Aktivitas: Trekking, Sunrise & Sunset, Snorkeling & Diving, Body Rafting
                                Fasilitas: Backpacker, Standar dan Platinum
                                Tipe: Open Trip, Private dan Group</p>

                                   <p>
                                Partner dan Rekan Kerja
                                Ufaira Tour N Travel akan terus melangkah dan berjuang dengan banyak pihak, market
                                place, media partner, hotel, maskapai penerbangan hingga tour agent lain agar lebih
                                memudahkan dalam kebersamaan memperjuangkan destinasi unik Indonesia di Pulau Jawa.
                                   </p>',
                            'jenis_input'       => Preferensi::RICHTEXT
                        ],
                    ]
                ],
                [
                    'key_preferensi'    => 'profil_contactus',
                    'nama_preferensi'   => 'Halaman Contact Us',
                    'jenis_data'        => null,
                    'nilai'             => null,
                    'jenis_input'       => null,
                    'children'      => [
                        [
                            'key_preferensi'    => 'koodinat',
                            'nama_preferensi'   => 'Koodinat Alamat',
                            'jenis_data'        => Preferensi::STRING,
                            'nilai'             => '
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8877195030573!2d112.71936699999999!3d-
                                    7.253618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f94c7210e223%3A0xdb8b419dcc1a0ae5!2sJl.%20Asembagus%203%20No.
                                    12%2C%20RT.003%2FRW.02%2C%20Tembok%20Dukuh%2C%20Kec.%20Bubutan%2C%20Surabaya%2C%20Jawa%20Timur%2060173!5e0!3m2!1sen!2sid!4v1699513101552!5m2!1sen!2sid"
                                      width="1200" height="535" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                            'jenis_input'       => Preferensi::TEXT
                        ],

                    ]
                ]
            ]
        ],
        [
            'key_preferensi'    => 'general',
            'nama_preferensi'   => 'General',
            'jenis_data'        => null,
            'nilai'             => null,
            'jenis_input'       => null,
            'children'           =>
                [
                    [
                        'key_preferensi'    => 'email',
                        'nama_preferensi'   => 'Email',
                        'jenis_data'        => Preferensi::STRING,
                        'nilai'             => 'ufairatour@gmail.com',
                        'jenis_input'       => Preferensi::TEXT
                    ],
                    [
                        'key_preferensi'    => 'instagram',
                        'nama_preferensi'   => 'Instagram',
                        'jenis_data'        => Preferensi::STRING,
                        'nilai'             => 'https://instagram.com',
                        'jenis_input'       => Preferensi::TEXT
                    ],
                    [
                        'key_preferensi'    => 'facebook',
                        'nama_preferensi'   => 'Facebook',
                        'jenis_data'        => Preferensi::STRING,
                        'nilai'             => 'https://facebook.com',
                        'jenis_input'       => Preferensi::TEXT
                    ],
                    [
                        'key_preferensi'    => 'telp',
                        'nama_preferensi'   => 'No. Telp',
                        'jenis_data'        => Preferensi::STRING,
                        'nilai'             => '6282218538394',
                        'jenis_input'       => Preferensi::TEXT
                    ],
                    [
                        'key_preferensi'    => 'display_telp',
                        'nama_preferensi'   => 'Display Telp',
                        'jenis_data'        => Preferensi::STRING,
                        'nilai'             => '(+62) 822 1853 8394',
                        'jenis_input'       => Preferensi::TEXT
                    ],
                    [
                        'key_preferensi'    => 'alamat',
                        'nama_preferensi'   => 'Alamat',
                        'jenis_data'        => Preferensi::STRING,
                        'nilai'             => 'Jalan Asem Bagus gg 3 no 12 kel. Tembok Dukuh,Kec Bubutan Surabaya',
                        'jenis_input'       => Preferensi::TEXT
                    ],

                ],
        ]
    ];
    public function run()
    {

            foreach ($this->preferensi as $item) {
                $this->createPreferensi($item);
            }
    }

    protected function createPreferensi($arr_preferensi, Preferensi $parent = null)
    {
        $children = isset($arr_preferensi['children']) ? $arr_preferensi['children'] : [];

        $preferensi = Preferensi::query()->firstOrCreate(
            [
                'uuid_preferensi'    => isset($arr_preferensi['uuid_preferensi']) ? $arr_preferensi['uuid_preferensi'] : new_uuid(),
            ],
            [
                'uuid_induk'        => is_null($parent) ? null : $parent->uuid_preferensi,
                'nama_preferensi'   => isset($arr_preferensi['nama_preferensi']) ? $arr_preferensi['nama_preferensi'] : null,
                'jenis_data'        => isset($arr_preferensi['jenis_data']) ? $arr_preferensi['jenis_data'] : null,
                'nilai'             => isset($arr_preferensi['nilai']) ? $arr_preferensi['nilai'] : null,
                'jenis_input'       => isset($arr_preferensi['jenis_input']) ? $arr_preferensi['jenis_input'] : null,
                'key_preferensi'    => $arr_preferensi['key_preferensi']

            ]
        );

        if (count($children) > 0) {
            foreach ($children as $arr_child) {
                $this->createPreferensi($arr_child, $preferensi);
            }
        }
    }
}
