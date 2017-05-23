<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersWithdrawCashTable extends Migration
{
    /**
     * Run the migrations.
     * 用户提取余额
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_cash', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mid')->comment('关联members ID');
            $table->decimal('money',10,2)->comment('提取金额');
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
