<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->timestamp('create_time');
            $table->timestamp('update_time')->nullable();
            $table->timestamp('auth_time')->comment("认证时间")->nullable();
            $table->timestamp('token_time')->comment("token有效时间")->nullable();
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
        Schema::dropIfExists('member_times');
    }
}
