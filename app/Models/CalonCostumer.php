<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalonCostumer extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['costumer_id','tanggalMasuk','tanggalKeluar','status','taksiran','keterangan'];
    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }
}
