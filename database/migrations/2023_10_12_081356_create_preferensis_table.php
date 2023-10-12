<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_preferensi', function (Blueprint $table) {
            $table->uuid('uuid_preferensi');
            $table->string('key_preferensi');
            $table->string('nama_preferensi');
            $table->text('nilai')
                ->nullable();
            $table->string('jenis_data')
                ->default(\App\Models\Master\Preferensi::STRING)
                ->nullable();
            $table->string('jenis_input')
                ->default(\App\Models\Master\Preferensi::TEXT)
                ->nullable();
            $table->string('related_class')
                ->nullable();
            $table->string('related_column')
                ->nullable();
            $table->uuid('uuid_induk')
                ->nullable();
            $table->timestamps();
            $table->primary('uuid_preferensi');
            $table->foreign('uuid_induk')
                ->references('uuid_preferensi')
                ->on('u_preferensi')
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
        Schema::dropIfExists('u_preferensi');
    }
}
