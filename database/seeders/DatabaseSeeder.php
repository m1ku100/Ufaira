<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(RoleMenuSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PreferensiSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(RentalSeeder::class);
        $this->call(TourSeeder::class);


    }
}
