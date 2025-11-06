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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('numero_documento');
            $table->string('telefono');
            $table->integer('pais_id');
            $table->string('email')->unique();
            $table->integer('puntos')->default(0);
            $table->unsignedBigInteger('codigo_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status_user')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('codigo_id')->references('id')->on('codigos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}