<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function tblLayanan()
    {
        $layanan = Layanan::all();
        return view('layanan.index',compact('layanan'));
    }

    public function pembayaran()
    {
        return view('layanan.payment');
    }
}
