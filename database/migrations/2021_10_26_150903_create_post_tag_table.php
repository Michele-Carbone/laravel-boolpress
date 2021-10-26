<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            //creazione per le colonne della foreign key
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');

            //creazione dei vincoli per la foreign key  //per coerenza se l utente si cancellera' e' giusto eliminare entrambe le relazioni pke non avrebbe senso tenerne una con la cancellazionde dell utente
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');  //cascade ci permette di eliminare tutto
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
