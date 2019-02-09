<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('maladie');
            /** Foreign key */
            $table->integer('medicament_id');
            $table->foreign('medicament_id')->references('id')->on('medicament');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            /***/
            $table->integer('quantite');
            $table->date('time_need');
            $table->string('ordonnance');
            $table->boolean('statu')->default('false');
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
        Schema::dropIfExists('publications');
    }
}
