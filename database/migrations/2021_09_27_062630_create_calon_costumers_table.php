<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_costumers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costumer_id');
            $table->date('tanggalMasuk');
            $table->date('tanggalKeluar');
            $table->enum('status',['PFU','C','MHPL','RO']);
            $table->enum('taksiran',['FB','BFB']);
            $table->text('keterangan');
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
        Schema::dropIfExists('calon_costumers');
    }
}
