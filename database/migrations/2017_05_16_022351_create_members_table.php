<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *会员表
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->comment('父ID')->nullable();
            $table->string('openid')->comment('微信标示')->nullable();
            $table->string('headimg')->comment('微信头像')->nullable();
            $table->string('uname')->comment('用户名');
            $table->string('password')->comment('密码')->default('');
            $table->integer('idcard')->comment('身份证号')->nullable();
            $table->string('back')->comment('身份证反面')->nullable();
            $table->string('front')->comment('身份证正面')->nullable();
            $table->tinyInteger('sex')->default('1')->comment('性别 1男 2女');
            $table->string('mobile')->comment('手机号');
            $table->string('birthday')->comment('生日')->nullable();
        /*    $table->integer('province')->comment('省');
            $table->integer('city')->comment('市');
            $table->integer('district')->comment('区');*/
            $table->string('area')->comment('省市区')->nullable();
            $table->string('address')->comment('详细地址')->nullable();
            $table->string('code')->comment('推荐二维码')->nullable();
            $table->decimal('money',10,2)->comment('余额')->nullable();
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
