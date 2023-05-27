<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Services\CampaignService;
use App\Services\CategoryService;
use App\Services\DonationService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->userService = new UserService();
        
        $this->campaignService = new CampaignService();
        $this->categoryService = new CategoryService();
        $this->donationService = new DonationService();
    }
    
    public function getUserData()
    {
        $user = Session::get('user');

        $responseDonation = $this->donationService->list([
            'donatorId' => $user->user->id,
            'page' => 1,
            'limit' => 10,
        ]);
        
        $responseCategory = $this->categoryService->list([
            'page' => 1,
            'limit' => 10,
        ]);
        $donation = $responseDonation["data"]["result"];

        $data = $this->userService->getUser($user->user->id);
        if ($data) {
            if ($data['success']) {
                $user = (object) $data['data'];
                return view('pages.profile.main', compact('user', 'donation'));
            }

            return redirect()->route('home');
        }
    }
  
}
