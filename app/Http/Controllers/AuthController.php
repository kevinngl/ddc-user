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
    public function signin(Request $request)
    {
        return view('pages.auth.main');
    }
    public function do_login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        
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
                    'message' => 'Email/No.hp telah terdaftar sebelumnya.',
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
    // Fungsi Lupa Password
    public function showLinkRequestForm()
    {
        return view('pages.auth.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $mail = Mail::send('auth.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        // dd($mail);
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'token' => $request->token
            ])
            ->first();

        // dd($updatePassword);
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }
        $user =  User::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $updatePassword->email])->delete();

        return redirect()->route('home')->with('message', 'Your password has been changed!');
    }
}
