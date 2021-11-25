<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costumer_id');
            $table->foreignId('product_id');
            $table->foreignId('agen_id')->nullable();
            $table->integer('diskon')->nullable();
            $table->date('booking');
            $table->date('delivery')->nullable();
            $table->enum('status',['Pending','Accepted','Canceled']);
            $table->integer('totalPrice');
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
