<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagJeux extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_jeux', function (Blueprint $table) {
            $table->bigInteger('tags_id')->unsigned();
            $table->bigInteger('jeux_id')->unsigned();
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('jeux_id')->references('id')->on('jeux')->onDelete('cascade');
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
    Schema::dropIfExists('tag_jeux');
}
}
