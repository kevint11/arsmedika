<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory, Uuid;
    protected $table= 'pembayaran';
    public $incrementing = false;    
    protected $guarded = [];
}
