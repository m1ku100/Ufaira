<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_menu', function (Blueprint $table) {
            $table->uuid('uuid_menu');
            $table->uuid('uuid_menu_induk', 36)
                ->nullable();
            $table->string('nama_menu');
            $table->string('nama_tampilan_menu');
            $table->string('route_prefix_menu', 100)
                ->nullable();
            $table->string('icon_menu')
                ->nullable();
            $table->string('view_path_menu')
                ->nullable();
            $table->integer('urutan_menu')
                ->default(0);
            $table->char('status_menu')
                ->default('I');
            $table->timestamps();

            $table->primary('uuid_menu');
            $table->foreign('uuid_menu_induk')
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
        Schema::dropIfExists('m_menu');
    }
}
