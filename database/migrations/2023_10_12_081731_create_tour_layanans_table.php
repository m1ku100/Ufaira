<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_tour_layanan', function (Blueprint $table) {
            $table->uuid('uuid_tour_layanan');
            $table->string('keterangan');
            $table->boolean('include')->comment('Jika false maka akan di render menjadi exclude');
            $table->uuid('uuid_tour')->nullable();
            $table->timestamps();

            $table->primary('uuid_tour_layanan');
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
        Schema::dropIfExists('m_tour_layanan');
    }
}
