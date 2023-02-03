<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DataPasien;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'nik_id' => ['required', 'integer', 'regex:/^[0-9]{16}$/', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nama' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
        ],
        [
            'email.required' => 'Email anda belum di isi', 
            'nik_id.required' => 'NIK anda belum di isi', 
            'password.required' => 'Password anda belum di isi',  
            'nama.required' => 'Nama anda belum di isi', 
            'tempat_lahir.required' => 'Tempat lahir anda belum di isi', 
            'tanggal_lahir.required' => 'Tanggal lahir anda belum di isi', 
            'jenis_kelamin.required' => 'Jenis kelamin anda belum di isi',  
            'nik_id.regex' => 'Format NIK tidak sesuai, harus 16 digit angka',  
            'nik_id.integer' => 'NIK harus berupa angka', 
            'nik_id.unique' => 'NIK ini sudah terdaftar',  
            'email.unique' => 'Email ini sudah terdaftar',     
            'password.min' => 'Password anda harus minimal 8 karakter',
            'password.confirmed' => 'Password anda tidak sama dengan password ketik ulang', 
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        
        $user2 = User::create([
            'email'=>$data['email'],
            'nik_id'=>$data['nik_id'],
            'password'=>bcrypt($data['password']),
            'status'=>'Terdaftar'
        ]);
                
        $dpasien1 = DataPasien::create([
            'nik'=>$data['nik_id'],
            'user_id'=>$user2->id,
            'nama'=>$data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
        ]);

        $user2->assignRole('user');

        return $user2;
    }
}
