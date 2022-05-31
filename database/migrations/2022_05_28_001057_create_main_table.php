<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main', function (Blueprint $table) {
            // nullable()つけるところを確認する
            $table->id();
            $table->integer('user_id');
            $table->integer('year');
            $table->integer('month');
            $table->integer('date');
            $table->integer('category1_id');
            $table->integer('category2_id');
            $table->integer('amount');
            $table->string('description');
            $table->integer('payment_method_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main');
    }
}
