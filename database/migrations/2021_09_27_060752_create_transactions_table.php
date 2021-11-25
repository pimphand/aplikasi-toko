<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->integer('cash');
            $table->integer('transfer');
            $table->integer('sisa');
            $table->integer('harga_catering');
            $table->integer('harga_sate_tanpa_catering');
            $table->integer('harga_cup_gulai_tanpa_catering');
            $table->integer('buah');
            $table->integer('ongkos');
            $table->char('jam_delivery');
            $table->text('keterangan');
            $table->enum('status',['Lunas','Belum Lunas']);
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
        Schema::dropIfExists('transactions');
    }
}
