<?php

namespace Database\Seeders;

use App\Models\Master\Banner;
use App\Models\Master\Role;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    protected $daftar_role = [
        [
            'judul_banner' => 'Mari Berpergian Bersama Kami',
            'sub_judul_banner' => 'Dengan kemudahan yang kami berikan mari nikmati keindahan yang ditawarkan Bumi pertiwi'
        ],
        [
            'judul_banner' => 'Trip Yang Menyejukkan Mata & Hatimu',
            'sub_judul_banner' => 'Rilekskan Pikiran yang Suntuk dengan menikmati perjalan dengan kami'
        ],
        [
            'judul_banner' => 'Nikmati Perjalanan yang Luar Biasa',
            'sub_judul_banner' => 'Sensai perjalan yang tidak akan kamu lupakan'
        ],
        [
            'judul_banner' => 'Sensasi yang Menenangkan Jiwa & Ragamu',
            'sub_judul_banner' => 'Cocok untuk kamu yang sedang ingin Healing'
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
            Banner::query()->create([
                'uuid_banner'   =>  new_uuid(),
                'gambar_banner' =>  'banner_'. ($key+1) .'.jpg',
                'link_banner'   =>  null,
                'judul_banner'   =>  $role['judul_banner'],
                'sub_judul_banner'   =>   $role['sub_judul_banner'],
            ]);
        }
    }
}
