<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name')->unique()->comment('用户名');
            $table->string('email')->comment('邮箱');
            $table->integer('status')->default(1)->comment('用户状态 0：未启用| 1：启用');
            $table->decimal('price',8,2)->comment('余额');
            $table->float('exc',2,2)->comment('费率');
            $table->integer('open_time')->comment('开启时间');
            $table->integer('open_status')->default(0)->comment('开启状态 0:未开启|1：已开启');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
