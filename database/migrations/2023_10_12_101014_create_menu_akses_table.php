<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuAksesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_menu_akses', function (Blueprint $table) {
            $table->uuid('uuid_menu_akses');
            $table->uuid('uuid_menu');
            $table->string('nama_akses');
            $table->char('status_akses', 2)
                ->default('I');
            $table->timestamps();
            $table->primary('uuid_menu_akses');
            $table->foreign('uuid_menu')
                ->references('uuid_menu')
                ->on('m_menu')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_menu_akses');
    }
}
