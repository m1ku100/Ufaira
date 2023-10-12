<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_tour_detail', function (Blueprint $table) {
            $table->uuid('uuid_tour_detail');
            $table->string('harga');
            $table->string('min_pax')->comment('Jumlah minimal orang per tour');
            $table->uuid('uuid_tour')->nullable();
            $table->timestamps();

            $table->primary('uuid_tour_detail');
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
        Schema::dropIfExists('m_tour_detail');
    }
}
