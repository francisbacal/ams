<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price', 12, 2);
            $table->string('code');
            $table->string('serial');
            $table->longText('description')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('category_id')->default(1);
            $table->unsignedBigInteger('asset_status_id')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('asset_status_id')->references('id')->on('asset_statuses');
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
        Schema::dropIfExists('assets');
    }
}
