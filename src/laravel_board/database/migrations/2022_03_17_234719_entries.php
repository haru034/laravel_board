<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Entries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); // usersテーブルのid
            $table->foreign('user_id') 
                ->references('id')->on('users')
                ->onDelete('cascade');  // usersテーブルのidが削除された場合、同じuser_idをentriesテーブルから削除
            $table->string('thread_text'); // スレッドの本文
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
