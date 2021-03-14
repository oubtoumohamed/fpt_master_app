<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_formations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')
                    ->references('id')
                    ->on('students')
                    ->onDelete('cascade');
            $table->integer('formation_id')->unsigned()->nullable();
            $table->foreign('formation_id')
                    ->references('id')
                    ->on('formations')
                    ->onDelete('cascade');

            $table->string('year')->nullable(); 
            $table->string('semester')->nullable(); 
            $table->float('note', 8, 2)->nullable();
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
        Schema::dropIfExists('student_formations');
    }
}
