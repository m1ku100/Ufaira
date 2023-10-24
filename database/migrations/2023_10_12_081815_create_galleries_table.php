<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_gallery', function (Blueprint $table) {
            $table->uuid('uuid_gallery');
            $table->string('gambar_gallery');
            $table->string('link_gallery')->nullable();

            $table->timestamps();
            $table->uuid('uuid_tour_detail')->nullable();
            $table->primary('uuid_gallery');


            $table->foreign('uuid_tour_detail')
                ->references('uuid_tour_detail')
                ->on('m_tour_detail')
                ->onDelete('set null')
                ->onUpdate('set null');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_gallery');
    }
}
