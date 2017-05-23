<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     * 资源表
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('mid')->comment('关联members ID');
        $table->string('resource_name')->comment('资源名称');
        $table->tinyInteger('type')->comment('资源分类 1 寻求资源  2 提供资源');
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
