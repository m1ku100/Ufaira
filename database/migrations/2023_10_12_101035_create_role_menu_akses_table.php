<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleMenuAksesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_role_menu_akses', function (Blueprint $table) {
            $table->uuid('uuid_role_menu');
            $table->uuid('uuid_menu_akses');
            $table->timestamps();
            $table->foreign('uuid_role_menu')
                ->references('uuid_role_menu')
                ->on('m_role_menu')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('uuid_menu_akses')
                ->references('uuid_menu_akses')
                ->on('m_menu_akses')
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
        Schema::dropIfExists('m_role_menu_akses');
    }
}
