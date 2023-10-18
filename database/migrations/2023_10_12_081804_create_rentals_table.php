<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_rental', function (Blueprint $table) {
            $table->uuid('uuid_rental');
            $table->string('nama_kendaraan')->nullable();
            $table->string('harga')->nullable();
            $table->string('foto')->nullable();
            $table->string('min_pax')->comment('Jumlah minimal orang dalam 1 kendaraan')->nullable();
            $table->boolean('is_automatic')->default(false);
            $table->boolean('is_include_supir')->default(false);
            $table->boolean('is_include_bbm')->default(false);
            $table->char('status_rental', 2)
                ->default('I');
            $table->timestamps();

            $table->primary('uuid_rental');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_rental');
    }
}
