<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pengguna', function (Blueprint $table) {
            $table->uuid('uuid_pengguna');
            $table->string('kode_pengguna', 50)
                ->nullable()
                ->unique();
            $table->string('nama_pengguna');
            $table->string('email_pengguna', 100)->unique();
            $table->string('foto_pengguna')->nullable();
            $table->string('password_pengguna');
            $table->char('status_pengguna', 2)
                ->default('I');
            $table->rememberToken();
            $table->timestamps();

            $table->primary('uuid_pengguna');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_pengguna');
    }
}
