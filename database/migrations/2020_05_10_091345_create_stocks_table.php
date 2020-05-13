<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('count');
            $table->unsignedBigInteger('asset_status_id');
            $table->unsignedBigInteger('asset_id');
            $table->timestamps();

            $table->foreign('asset_id')->references('id')->on('assets');
            $table->foreign('asset_status_id')->references('id')->on('asset_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
