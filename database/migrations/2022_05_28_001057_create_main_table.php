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
            $table->foreignId('user_id')->constrained();
            $table->integer('year');
            $table->integer('month');
            $table->integer('date');
            $table->integer('primary_category_id');
            $table->integer('secondary_category_id');
            $table->integer('amount');
            $table->string('description');
            $table->foreignId('payment_methods_id');
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
