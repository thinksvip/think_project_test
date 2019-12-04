<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeixinUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weixin_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id')->comment('用户id');
            $table->string('nickname',50)->default('')->comment('微信昵称');
            $table->string('sex')->default('')->comment('用户性别，1为男性，2为女性');
            $table->string('language')->default('')->comment('语言');
            $table->string('city')->default('')->comment('城市');
            $table->string('province')->default('')->comment('省份');
            $table->string('country')->default('')->comment('国家');
            $table->string('headimgurl')->default('')->comment('头像 有0、46、64、96、132数值可选，0代表640*640正方形头像');
            $table->string('openid')->default('')->comment('openid');
            $table->string('unionid')->default('')->comment('用户统一标识');
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
        Schema::dropIfExists('weixin_users');
    }
}
