<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugements', function (Blueprint $table) {
            $table->id();
            $table->string('num')->nullable();
            $table->date('date')->nullable();
            $table->text('contenu')->nullable();
            $table->boolean('favorable')->nullable();
            $table->decimal("montant",11,2,true)->nullable();
            $table->foreignId('dossier_id')
                    ->constrained()
                    ->onDelete('cascade')
                    ->unique();
            $table->string("image")->nullable()->unique();
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
        Schema::dropIfExists('jugements');
    }
}
