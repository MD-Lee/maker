<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsReportTable extends Migration
{
    /**
     * Run the migrations.
     * 业务报备 分润审核
     * @return void
     */
    public function up()
    {
        Schema::create('projects_report', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('psid')->comment('关联项目ID');
            $table->integer('mid')->comment('关联member ID');
            $table->string('customer_name')->comment('客户名称');
            $table->integer('customer_province')->comment('客户省');
            $table->integer('customer_city')->comment('客户市');
            $table->integer('customer_district')->comment('客户区');
            $table->string('customer_address')->comment('客户地址');
            $table->string('customer_require')->comment('客户需求');
            $table->tinyInteger('status')->default('2')->comment('合作状态  1 合作 2未合作');
            $table->tinyInteger('pstatus')->default('2')->comment('分润状态  1 已分 2未分');
            $table->decimal('amount',10,2)->comment('合同金额');
            $table->decimal('profit',10,2)->comment('分润金额');
            $table->string('agreement_doc')->comment('合同文件地址');
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
