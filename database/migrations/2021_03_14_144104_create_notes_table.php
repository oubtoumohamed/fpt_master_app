<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_formation_id')->unsigned()->nullable();
            $table->foreign('student_formation_id')
                    ->references('id')
                    ->on('student_formations')
                    ->onDelete('cascade');

            $table->integer('module_id')->unsigned()->nullable();
            $table->foreign('module_id')
                    ->references('id')
                    ->on('modules')
                    ->onDelete('cascade');

            $table->string('semester')->nullable(); 

            $table->float('note_normale', 8, 2)->nullable(); 
            $table->string('remark_normale')->nullable(); 

            $table->float('note_ratt', 8, 2)->nullable(); 
            $table->string('remark_ratt')->nullable(); 

            $table->boolean('validate')->nullable();
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
        Schema::dropIfExists('notes');
    }
}
