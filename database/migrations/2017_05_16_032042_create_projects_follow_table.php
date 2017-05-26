<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsFollowTable extends Migration
{
    /**
     * Run the migrations.
     * 业务报备跟进情况
     * @return void
     */
    public function up()
    {
        Schema::create('projects_follow', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->comment('关联项目 ID');
            $table->string('content')->comment('跟进情况');
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
