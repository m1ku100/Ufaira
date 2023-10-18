<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourSyaratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_tour_syarat', function (Blueprint $table) {
            $table->uuid('uuid_tour_syarat');
            $table->string('keterangan')->nullable();
            $table->uuid('uuid_tour')->nullable();
            $table->timestamps();

            $table->primary('uuid_tour_syarat');
            $table->foreign('uuid_tour')
                ->references('uuid_tour')
                ->on('m_tour')
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
        Schema::dropIfExists('m_tour_syarat');
    }
}
