<?php

namespace App\Http\Controllers;

use App\Models\KartuPasien;
use App\Models\Layanan;
use App\Models\SaldoLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LayananController extends Controller
{
    
    public function tblLayanan()
    {
        $layanan = Layanan::paginate(10);
        return view('layanan.index',compact('layanan'));
    }

    public function saldo()
    {
        $nik_id = auth()->user()->nik_id;
        
        $kartu = KartuPasien::where('nik_id', $nik_id)->first();
        $layanan = SaldoLayanan::where('kartu_id', $kartu->id)->with('namaLayanan')->get();
        return view('layanan.saldo', compact('layanan'));

    }
}
