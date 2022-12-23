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
}
