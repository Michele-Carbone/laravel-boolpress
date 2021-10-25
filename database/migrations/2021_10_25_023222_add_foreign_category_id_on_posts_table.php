<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryIdOnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //definizione della colonna

            $table->unsignedBigInteger('category_id')->after('id')->nullable(); //aggiungiamo il nome della colonna category_id positionato dopo id

            //definizione foreign key
            /*
            //creiamo una relazione fateing() sulla colonna category_id che fa riferimento alla colonna id nella tabella categories  
            //onDelete(); cosa succede se una categoria venisse cancellata? Gestendolo con questa funzione gli diciamo che quando verra'
            cancellato il post di una categoria voglio che compaia "set null" sul post e non cancellarla
            Senza di essa non posto' cancellare una categoria fino a quando avro' ancora i post
            */
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            /******Versione semplificata di scrittura*******/
            //e' possibile usarla solo e soltanto se vengono rispettare i nome delle colonne e tutto il resto se no non funziona
            //$table->foreignId('category_id')->after('id')->nullable()->onDelete('set null')->constrained(); //constrained() serve per legare tutto quanto
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //eliminiamo il vincolo della foreign key PRIMA VA ELIMINATO IL VINCOLO e poi LA COLONNA
            /*
            ogni che da phpMyadmim creiamo delle tabelle per aggiungere un indice ci viene chiesto sempre un nome, 
            lo stesso vale quando vogliamo aggiungere una foreign key, se noi non lo specifichiamo Laravel lo aggiunge 
            lui di default mettendo: nome della tabella_nome della colonna_tipo indice per eliminare il vincolo basta ripassare lo stesso nome
            */
            $table->dropForeign('posts_category_id_foreign');

            //eliminare la colonna
            $table->dropColumn('category_id');
        });
    }
}
