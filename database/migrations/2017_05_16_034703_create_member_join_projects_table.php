<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberJoinProjectsTable extends Migration
{
    /**
     * Run the migrations.
     * 用户参与的项目
     * @return void
     */
    public function up()
    {
        Schema::create('member_join_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->comment('关联project ID');;
            $table->integer('mid')->comment('关联members ID');
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
