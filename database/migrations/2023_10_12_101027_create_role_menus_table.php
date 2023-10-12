<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_role_menu', function (Blueprint $table) {
            $table->uuid('uuid_role_menu');
            $table->uuid('uuid_role');
            $table->uuid('uuid_menu');
            $table->char('status_role_menu', 2)
                ->default('I');
            $table->timestamps();

            $table->primary('uuid_role_menu');
            $table->foreign('uuid_role')
                ->references('uuid_role')
                ->on('m_role')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('uuid_menu')
                ->references('uuid_menu')
                ->on('m_menu')
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
        Schema::dropIfExists('m_role_menu');
    }
}
