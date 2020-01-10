<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJeuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeux', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom', 255)->nullable(false);
            $table->integer('anneeS')->nullable(false);
            $table->string('ageMax', 255)->nullable(false);
            $table->string('nbJoueurMinMax', 255)->nullable(false);
            $table->string('dureePartieMaxMin',255)->nullable(false);
            $table->string('description',1000)->default('Inconnu');
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
        Schema::dropIfExists('jeux');
    }
}
