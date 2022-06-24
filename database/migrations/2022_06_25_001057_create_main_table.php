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
            $table->foreignId('users_id')->constrained();
            $table->integer('year');
            $table->integer('month');
            $table->integer('date');
            $table->foreignId('primary_categories_id')->nullable()->constrained();
            $table->integer('amount');
            $table->string('description');
            $table->foreignId('payment_methods_id')->nullable()->constrained();
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
