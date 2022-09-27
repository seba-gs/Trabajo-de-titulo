<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotografiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotografias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_especie');
            $table->string('nombre', 15);
            $table->string('imagen');
            $table->string('descripcion', 200);
            $table->integer('valor')->unsigned();
            $table-> softDeletes();
            $table->timestamps();
            $table->foreign('id_admin')->references('id')->on('usuarios');
            $table->foreign('id_especie')->references('id')->on('especies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotofrafias');
    }
}
