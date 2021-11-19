<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('docType')->unsigned();
            $table->string('document')->unique();
            $table->string('name1');
            $table->string('name2');
            $table->string('apel1');
            $table->string('apel2');
            $table->string('address');
            $table->integer('phone');
            $table->string('city');
            $table->bigInteger('role')->unsigned();
            $table->timestamps();
            $table->foreign('docType')->references('id')->on('document_types');
            $table->foreign('role')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
