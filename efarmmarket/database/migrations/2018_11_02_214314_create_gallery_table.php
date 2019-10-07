<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('description');
            $table->integer('price');
            $table->text('address');
            $table->string('ownership');
            $table->integer('paymentStatus')->nullable();
            $table->string('transactionId');
            $table->string('v_transaction_id')->nullable();
            $table->boolean('bought');
            $table->boolean('bought_by');
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
        Schema::dropIfExists('gallery');
    }
}
