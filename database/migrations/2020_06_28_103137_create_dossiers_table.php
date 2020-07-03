<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->nullable();
            $table->boolean('encours')->default(false);
            $table->enum('niveau',['إبتدائي','إستئناف','نقض'])->nullable();
            $table->string('type')->nullable();
            $table->enum('annee',['2010','2011','2012','2013','2014','2015','2016','2017','2018','2019','2020'])->nullable();
            $table->foreignId('tribunal_id')->nullable();
            $table->text('observation')->nullable();
            // $table->foreignId('dossier_id')->nullable();
            //$table->foreignId('dossier_id')->nullable();
            $table->integer('dossier_id')->nullable()->unsigned();
            //$table->foreign('dossier_id')->references('id')->on('dossiers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossiers');
    }
}
