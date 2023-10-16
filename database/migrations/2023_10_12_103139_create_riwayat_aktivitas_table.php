<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatAktivitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_riwayat_aktivitas', function (Blueprint $table) {
            $table->uuid('uuid_aktivitas');
            $table->string('object');
            $table->string('object_class');
            $table->string('subject')
                ->nullable();
            $table->string('subject_class')
                ->nullable();
            $table->text('properties');
            $table->text('activity')
                ->nullable();
            $table->string('event')
                ->nullable();
            $table->timestamps();
            $table->primary('uuid_aktivitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('u_riwayat_aktivitas');
    }
}
