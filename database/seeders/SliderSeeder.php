<?php

namespace Database\Seeders;

use App\Models\Master\Banner;
use App\Models\Master\Role;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    protected $daftar_role = [
       '1',
        '2',
        '3',
        '4',
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
                'uuid_produk'   =>   null,
            ]);
        }
    }
}
