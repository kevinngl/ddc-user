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
        $data = json_decode(file_get_contents(public_path('data.json')));        
        return view('home.main', compact('data'));
    }
    // Fungsi Filter
    public function list(Request $request)
    {
        $data = json_decode(file_get_contents(public_path('data.json')));
        return view('list.main', compact('data'));
    }

    public function profilUser(Request $request)
    {
        $user = Auth::user();
        return view('profil.main', compact('user'));
    }
    public function signin(Request $request)
    {
        return view('auth.main');
    }
    public function single($id)
    {
        // Read the products from the JSON file
        $json = file_get_contents(public_path('data.json'));
        $datas = json_decode($json, true);

        // Find the product with the matching ID
        $data = null;
        foreach ($datas as $item) {
            if ($item['id'] == $id) {
                $data = $item;
                break;
            }
        }
        // dd($data);

        // If no product is found, return a 404 error
        if ($data == null) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        // Return the product as a JSON response
        return view('single.main', ['data' => $data]);
    }
}
