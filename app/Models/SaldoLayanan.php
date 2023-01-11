<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoLayanan extends Model
{
    use HasFactory;
    protected $table= 'saldo_layanan';
    public $incrementing = false;    
    protected $guarded = [];

    public function namaLayanan(){
        return $this->belongsTo(Layanan::class,'layanan_id');
    }
}
