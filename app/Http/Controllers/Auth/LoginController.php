<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    public function redirectTo()
    {
        $this->redirectTo = route('Dashboard');
        return $this->redirectTo;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'nik_id';
    }

    protected function credentials(Request $request)
    {
        $user = User::where('nik_id', $request->nik_id)->first();
        
        if (!empty($user)){    
            $credentials = $request->only('nik_id','password');
        } else {
            $user = User::where('email', $request->nik_id)->first();
            $credentials = array('email'=>$request->nik_id, 'password'=>$request->password);
        }
        
        if ($user !== null && $user->status == 'Terdaftar') {
            $data = Arr::add($credentials, 'status', 'Terdaftar');
        } else {
            $data = Arr::add($credentials, 'status', 'Aktif');
        }

        return $data;
    }

    /**
     * The user has been authenticated.
     *
     */
    protected function authenticated(Request $request)
    {
        $password = $request->input('password');
        Auth::logoutOtherDevices($password);
    }

}
