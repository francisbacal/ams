<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('available')->default(0);
            $table->bigInteger('allocated')->default(0);
            $table->bigInteger('reserved')->default(0);
            $table->bigInteger('for_diagnosis')->default(0);
            $table->bigInteger('for_repair')->default(0);
            $table->bigInteger('total')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_stocks');
    }
}
