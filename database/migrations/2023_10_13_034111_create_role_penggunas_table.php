<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePenggunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pengguna_role', function (Blueprint $table) {
            $table->uuid('uuid_pengguna');
            $table->uuid('uuid_role');

            $table->foreign('uuid_pengguna')
                ->references('uuid_pengguna')
                ->on('m_pengguna')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('uuid_role')
                ->references('uuid_role')
                ->on('m_role')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_pengguna_role');
    }
}
