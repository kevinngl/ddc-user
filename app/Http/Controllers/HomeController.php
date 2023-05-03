<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Donation;
use App\Models\Category;

class HomeController extends Controller
{
    // Fungsi Search
    public function index(Request $request)
    {
        $catTitle = $request->query('category') ?? '';

        $donation = Donation::getDonationByCategory($catTitle);
        $selectedCategory = Category::getCategoryByTitle($catTitle);
        $category = Category::paginate(6);
        return view('home.main', ['donation' => $donation, 'category' => $category, 'selectedCategory' => $selectedCategory[0]->tc_title]);
    }
    // Fungsi Filter
    public function list(Request $request)
    {
        $catTitle = $request->query('category') ?? '';
        $donationTitle = $request->query('donation-title') ?? '';

        $donation = Donation::getDonationByCategory($catTitle);
        if ($donationTitle) {
            $donation = Donation::getDonationByTitle($donationTitle);
        }

        $selectedCategory = Category::getCategoryByTitle($catTitle);
        $category = Category::paginate(6);
        return view('list.main', ['donation' => $donation, 'category' => $category, 'selectedCategory' => $selectedCategory[0]->tc_title]);
    }

    public function profilUser(Request $request)
    {
        $user = Auth::user();
        return view('profil.main', compact('user'));
    }
    public function signup(Request $request)
    {
        return view('auth.main');
    }
    public function signin(Request $request)
    {
        return view('auth.main');
    }
    // Fungsi Melihat Detail Donasi
    public function single($single)
    {
        $donation = Donation::where('td_title', $single)->first();
        return view('single.main', compact('donation'));
    }
}
