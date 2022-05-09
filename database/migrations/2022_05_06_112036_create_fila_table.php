<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fila', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Area_id');
            $table->unsignedBigInteger('usuario_id');

            $table->foreign('Area_id')->references('Area_id')
            ->on('area');
            $table->foreign('usuario_id')->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fila');
    }
}
