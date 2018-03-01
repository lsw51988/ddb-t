<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_bikes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->string('brand')->comment("品牌");
            $table->integer('voltage')->comment("电压");
            $table->integer('price')->comment("价格");
            $table->date('buy_date')->comment("购买日期");
            $table->date('battery_change_date')->nullable()->comment("最近一次更换电池时间");
            $table->smallInteger('buy_status')->comment("购买时状态 1全新 2二手");
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
        Schema::dropIfExists('e_bikes');
    }
}
