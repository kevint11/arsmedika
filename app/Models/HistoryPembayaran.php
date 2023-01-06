<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPembayaran extends Model
{
    use HasFactory;
    protected $table= 'history_pembayaran';
    public $incrementing = true;    
    protected $guarded = [];
}
