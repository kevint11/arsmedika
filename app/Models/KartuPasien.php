<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuPasien extends Model
{
    use HasFactory, Uuid;
    protected $table= 'kartu_pasien';
    public $incrementing = false;    
    protected $guarded = [];
}

