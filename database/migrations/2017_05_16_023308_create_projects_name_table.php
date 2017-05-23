<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsNameTable extends Migration
{
    /**
     * Run the migrations.
     *项目名称
     * @return void
     */
    public function up()
    {
        Schema::create('projects_name', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mid')->commnet('关联memberID');
            $table->string('pname')->comment('项目名称');
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
        //
    }
}
