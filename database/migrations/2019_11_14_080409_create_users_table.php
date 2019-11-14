<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->comment('用户名');
            $table->string('nickname')->default('')->comment('昵称');
            $table->char('mobile',11)->comment('移动电话号码');
            $table->string('email',50)->default('')->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->boolean('status')->default('0')->comment('状态 0启用 1禁用');
            $table->timestamps();


            $table->unique('name');
            $table->unique('mobile');
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
