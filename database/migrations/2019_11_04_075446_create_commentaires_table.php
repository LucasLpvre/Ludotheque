<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre', 255)->nullable(false);
            $table->string('body', 1000)->nullable(false);
            $table->string('auteur', 255)->nullable(false);
            $table->bigInteger('jeux_id')->unsigned();
            $table->foreign('jeux_id')->references('id')->on('jeux');
            //$table->dateTime('created_at')->nullable(false);
            //$table->dateTime('updated_at')->nullable(false);
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
        Schema::dropIfExists('commentaires');
    }
}
