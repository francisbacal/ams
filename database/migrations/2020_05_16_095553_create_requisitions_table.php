<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('requested_date');
            $table->longText('notes');
            $table->unsignedBigInteger('requisition_status_id')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('requisition_status_id')->references('id')->on('requisition_statuses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisitions');
    }
}
