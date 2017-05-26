<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     * 回款审核
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid')->comment('关联业务报备report ID');
            $table->tinyInteger('pay_method')->comment('支付方式');
            $table->decimal('receipts',10,2)->comment('实收款');
            $table->tinyInteger('status')->default('2')->comment('回款状态 1已回款 2待回款');
            $table->string('content')->comment('备注');
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
