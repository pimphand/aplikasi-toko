<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['order_id','cash','transfer','sisa','harga_catering','harga_sate_tanpa_catering','harga_cup_gulai_tanpa_catering','buah','ongkos','jam_delivery','keterangan','status'];
}
