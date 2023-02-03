<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataPasien;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'nik_id' => ['required', 'integer', 'regex:/^[0-9]{16}$/', 'unique:user'],
            'password' => ['required', 'string', 'min:8'],
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
            'nik_id.unique' => 'NIK ini sudah terdaftar',  
            'nik_id.integer' => 'NIK harus berupa angka', 
            'email.unique' => 'Email ini sudah terdaftar',     
            'password.min' => 'Password anda harus minimal 8 karakter',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user2 = User::create([
            'email' => $request->email,
            'nik_id' => $request->nik_id,
            'password' => bcrypt($request->password),
            'status' => 'Terdaftar',
        ]);

        DataPasien::create([
            'nik' => $request->nik_id,
            'nama' => $request->nama,
            'user_id' => $user2->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        $user2->assignRole('user');

        $token = $user2->createToken('auth_token')->plainTextToken;

        return response()->json(['data' => $user2, 'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('nik_id', 'password'))) {
            $user = User::where('nik_id', $request['nik_id'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            Auth::logoutOtherDevices($request['password']);

            return response()->json(['message' => 'NIK ' . $user->nik_id . ', anda sudah berhasil login', 'access_token' => $token, 'token_type' => 'Bearer',]);
        } else if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            Auth::logoutOtherDevices($request['password']);

            return response()->json(['message' => 'Email : ' . $user->email . ', anda sudah berhasil login', 'access_token' => $token, 'token_type' => 'Bearer',]);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Sudah log-out dan token telah dihapus.'
        ];
    }
}
