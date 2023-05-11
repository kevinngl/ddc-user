<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->userService = new UserService();
    }
    
    public function getUserData(Request $request)
    {
        $user = Session::get('user');
        $data = $this->userService->getUser($user->user->id);
        if ($data) {
            if ($data['success']) {
                $user = (object) $data['data'];
                return view('profile.main', compact('user'));
            }

            return redirect()->route('home');
        }
    }
}
