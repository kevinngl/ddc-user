<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
// use App\Mail\web\WelcomeMail;
use Exception;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('do_logout');
    }
    public function index()
    {
        return view('auth.main');
    }
    public function do_login(Request $request)
    {
        $datas = $request->only('email', 'password', 'role');
        if (Auth::attempt($datas)) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Selamat datang ' . Auth::user()->name,
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        $user = new User;
        $user->name = Str::title($request->name);
        $user->email = $request->email;
        $user->role = 'user';
        $user->password = Hash::make($request->password);
        $user->save();

        // $token = Str::random(64);

        // UserVerify::create([
        //     'user_id' => $user->id,
        //     'token' => $token
        // ]);
        // Mail::to($request->email)->send(new WelcomeMail($user));
        return response()->json([
            'alert' => 'success',
            'message' => 'Pengguna ' . $request->name . ' berhasil terdaftar',
        ]);
    }

    public function do_logout()
    {
        $user = Auth::user();
        Auth::logout($user);
        return redirect()->route('home');
    }

    // Fungsi Lupa Password
    public function showLinkRequestForm()
    {
        return view('page.user.auth.email');
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

        $mail = Mail::send('page.user.auth.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        // dd($mail);
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {
        return view('page.user.auth.reset', ['token' => $token]);
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
// dibawah ini tidak digunakan
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }
    public function showResetForm(Request $request)
    {
        return view('auth.passwords.reset', ['token' => $request->route('token')]);
    }
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['status' => __($status)])
            : back()->withErrors(['email' => [__($status)]]);
    }
    public function resetPage()
    {
        return view('page.user.auth.reset');
    }
}
