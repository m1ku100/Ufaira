<?php

namespace Database\Seeders;

use App\Models\Master\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    protected $daftar_role = [
        '1',
        '2',
        '3',
        '4',
        '5',
        '6'
    ];

    protected $bule_image = [
        'bromo_1.jpg',
        'bromo_2.jpg',
        'ijen_1.jpg',
        'ijen_2.jpg',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->daftar_role as $key => $role) {
            Gallery::query()->create([
                'uuid_gallery'   =>  new_uuid(),
                'gambar_gallery' =>  'galery_'. ($key+1) .'.jpg',
                'link_gallery'   =>  null,
                'uuid_tour_detail'   =>   null,
            ]);
        }

        foreach ($this->bule_image as $key => $role) {
            Gallery::query()->create([
                'uuid_gallery'   =>  new_uuid(),
                'gambar_gallery' =>  $role,
                'link_gallery'   =>  null,
                'uuid_tour_detail'   =>   null,
            ]);
        }
    }
}
