<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avatarUrl')->comment("微信头像");
            $table->string('city');
            $table->string('country')->comment("国家");
            $table->string('language')->comment("语言");
            $table->integer('gender')->comment("性别 1男 0女");
            $table->string('nickName')->comment("微信昵称");
            $table->string('realName')->comment("真实姓名")->nullable();
            $table->string('mobile')->comment("电话号码")->nullable();
            $table->string('province');
            $table->string('token')->comment("登录token")->nullable();
            $table->string('ip')->comment("登录ip")->nullable();
            $table->dateTime('auth_time')->comment("认证时间")->nullable();
            $table->dateTime('token_time')->comment("token有效时间")->nullable();
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
        Schema::dropIfExists('members');
    }
}
