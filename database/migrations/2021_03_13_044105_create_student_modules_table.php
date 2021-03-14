<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable();
            $table->foreign('student_id')
                    ->references('id')
                    ->on('students')
                    ->onDelete('cascade');
            $table->integer('module_id')->unsigned()->nullable();
            $table->foreign('module_id')
                    ->references('id')
                    ->on('modules')
                    ->onDelete('cascade');

            $table->date('date_affect')->nullable(); 
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
        Schema::dropIfExists('student_modules');
    }
}
