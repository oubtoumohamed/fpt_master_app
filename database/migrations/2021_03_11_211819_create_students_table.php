<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cne')->nullable();
            $table->integer('num_ins')->nullable();
            $table->string('cin')->nullable();
            $table->string('nom_fr')->nullable();
            $table->string('prenom_fr')->nullable();
            $table->string('nom_ar')->nullable();
            $table->string('prenom_ar')->nullable();
            $table->string('statut')->nullable();
            $table->date('date_de_naissance')->nullable();
            $table->string('lieu_naissance_fr')->nullable();
            $table->string('lieu_naissance_ar')->nullable();
            $table->string('sexe')->nullable();
            $table->string('serie_bac')->nullable();
            $table->integer('annee_bac')->nullable();
            $table->string('mention_bac')->nullable();
            $table->string('licence')->nullable();
            $table->integer('annee_licence')->nullable();
            $table->string('code_diplome')->nullable();
            $table->integer('annee_ins')->nullable();

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
        Schema::dropIfExists('students');
    }
}
