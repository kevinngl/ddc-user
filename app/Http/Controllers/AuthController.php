<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(){
        $this->authService = new AuthService();
    }
    
    public function do_login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        $login = $this->authService->login($email, $password);
        if ($login) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Selamat datang ' . $login->user->name,
                'callback' => route('home'),
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, email atau password anda salah, silahkan coba lagi.',
            ]);
        }
    }
    // Fungsi Register
    public function do_register(Request $request)
    {
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $password = $request['password'];
        
        // Register the user
        $register = $this->authService->register($name, $email,$phone, $password);

        if (!$register['success']) {
            if ($register['code'] == 409) {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'Akun telah terdaftar sebelumnya.',
                ]);
            }

            return response()->json([
                'alert' => 'error',
                'message' => $register['message'],
            ]);
        } else {
            return response()->json([
                'alert' => 'success',
                'message' => 'Registrasi berhasil. Anda akan diarahkan ke beranda.',
                'callback' => route('signin'),
            ]);
        }
    }


    public function do_logout()
    {
        if (session()->has('auth_token')) {
            session()->remove('auth_token');
        }

        return redirect()->route('home');
    }
}
