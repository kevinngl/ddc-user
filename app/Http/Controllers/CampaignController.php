<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\CampaignService;
use App\Services\CategoryService;
use App\Services\DonationService;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use App\Libraries\GoogleCloudStorage as GCS;
use DateTime;

class CampaignController extends Controller
{
    public function __construct(){
        $this->campaignService = new CampaignService();
        $this->categoryService = new CategoryService();
        $this->donationService = new DonationService();
        $this->authService = new AuthService();
    }
    
    public function detail($id)
    {
        $responseCampaign = $this->campaignService->detail($id);
        // dd($responseCampaign);

        $responseDonation = $this->donationService->list([
            'campaignId' => $id,
            'page' => 1,
            'limit' => 10,
        ]);

        $data = $responseCampaign["data"];
        $donation = $responseDonation["data"]["result"];
        // dd($donation);
        $donationCount = $responseDonation["data"]["total"];
        return view('pages.single.main', compact('data', 'donation', 'donationCount'));
    }

    public function index(Request $request)
    {
        $response = $this->campaignService->list($request);
        $result = null;

        if ($response["success"]) {
            $result = $response["data"]["result"];
        }

        $collection = Collection::make($result);
        $perPage = 6;
        $page = $request->query->get('page');
        $data = new LengthAwarePaginator(
            $collection,
            $response["data"]["total"],
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view('pages.home.main', compact('data'));
    }

    public function list(Request $request)
    {
        $response = $this->campaignService->list($request);
        $result = null;
        $responseCategory = $this->categoryService->list([
            'page' => 1,
            'limit' => 10,
        ]);
        $category = $responseCategory["data"]["result"];


        if ($response["success"]) {
            $result = $response["data"]["result"];
        }
        // dd($result);
        $collection = Collection::make($result);
        $perPage = 6;
        $page = $request->query->get('page');
        $data = new LengthAwarePaginator(
            $collection,
            $response["data"]["total"],
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view('pages.list.main', compact('data','category'));
    }
}