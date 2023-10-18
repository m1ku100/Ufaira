<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_tour', function (Blueprint $table) {
            $table->uuid('uuid_tour');
            $table->string('nama_tour', 500)
                ->nullable();
            $table->char('status_tour', 2)
                ->default('I');
            $table->string('slug_tour', 300)
                ->nullable()
                ->unique();

            $table->timestamps();
            $table->primary('uuid_tour');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_tour');
    }
}
