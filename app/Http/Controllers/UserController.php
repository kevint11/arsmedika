<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


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

    public function gantiPassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);
      
        $user = Auth::user();
        $current_password = $request->input('old_password');

        try {
            
            if(Hash::check($current_password, $user->password)){
                $user->password = Hash::make($request->input('password'));
                $user->save();
                
                return redirect()->back()->with('success','Ganti password sukses.');
            } else {
                return redirect()->back()->with('error','Ganti password gagal.');
            }
            
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e);
        }

    }

}
