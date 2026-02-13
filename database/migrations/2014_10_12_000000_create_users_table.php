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
            $table->string('name')->index();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('numero_documento');
            $table->string('telefono');
            $table->unsignedBigInteger('pais_id');
            $table->string('email')->unique();
            $table->integer('puntos')->index()->default(0);
            $table->unsignedBigInteger('codigo_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status_user')->index()->default(1);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('codigo_id')
                ->references('id')
                ->on('codigos')
                ->onUpdate('cascade')
                ->onDelete('restrict');
                
            $table->foreign('pais_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade')
                ->onDelete('restrict');
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