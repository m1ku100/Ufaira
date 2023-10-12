<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_banner', function (Blueprint $table) {
            $table->uuid('uuid_banner');
            $table->string('gambar_banner');
            $table->string('link_banner')->nullable();
            $table->uuid('uuid_produk')->nullable();

            $table->timestamps();
            $table->primary('uuid_banner');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_banner');
    }
}
