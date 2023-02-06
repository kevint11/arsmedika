<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function formPassword()
    {
        return view('profile.gantiPassword');
    }

    public function gantiPassword()
    {
        return view('profile.index');
    }

}
