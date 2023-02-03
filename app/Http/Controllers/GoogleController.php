<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $user = Socialite::driver('google')->user();
            // dd($user->getEmail());
            $google = User::where('google_id',$user->id)->first();
            if($google){
                Auth::login($google);
                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([      
                    'email'=>$user->email,
                    'password'=>bcrypt('12341234'),
                    'status'=>'Terdaftar',
                    'google_id' => $user->getId(),
                ]);
                $dpasien = DataPasien::create([
                    'nik'=>$newUser->id,
                    'nama'=>$user->name,
                    'user_id'=>$newUser->id,
                ]);
                
                $newUser->assignRole('user');

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch(Throwable $th){
            //throw $th
        }
    }
}
