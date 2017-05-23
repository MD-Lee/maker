<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxCofigTable extends Migration
{
    /**
     * Run the migrations.
     * 微信设置
     * @return void
     */
    public function up()
    {
        Schema::create('wx_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token')->comment('token');
            $table->string('appid')->comment('appid');
            $table->string('appsecret')->comment('appsecret');
            $table->text('access_token')->comment('access_token');
            $table->text('jsapi_ticket')->comment('jsapi_ticket');
            $table->integer('jsapi_expire_time')->comment('jsapi_expire_time');
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
