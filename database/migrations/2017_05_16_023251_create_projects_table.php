<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     * 项目表
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mid')->comment('关联member ID');
            $table->string('product_name')->comment('产品名称');
            $table->integer('pid')->comment('关联项目名称ID');
            $table->string('profit_description')->comment('利润描述');
            $table->string('content')->comment('产品内容');
            $table->string('customer')->comment('目标用户');
            $table->string('problems')->comment('解决问题');
            $table->string('profit_point')->comment('盈利点');
            $table->string('product_profit')->comment('产品分润');
            $table->tinyInteger('train_methods')->comment('培训方式');
            $table->timestamp('train_time')->comment('培训时间');
            $table->string('area')->comment('培训地址');
            /*$table->integer('province')->comment('省');
            $table->integer('city')->comment('市');
            $table->integer('district')->comment('区');*/
            $table->string('address')->comment('详细地址');
            $table->integer('member_number')->comment('参与人数');
            $table->tinyInteger('status')->default('-1')->comment('状态 -1 审核中 1审核通过 2审核不通过');
            $table->tinyInteger('is_deletes')->default('0')->comment('删除状态 0未删除 1删除');
            $table->string('reason')->comment('审核理由');
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
