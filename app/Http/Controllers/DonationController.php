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
class DonationController extends Controller
{
    public function __construct(){
        $this->donationService = new DonationService();
        $this->campaignService = new CampaignService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $response = $this->campaignService->detail($id);

        $data = $response["data"];

        return view('pages.payment.main', compact('data'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        // dd($request);
        $createdBy = session('user')->user->id;
        $campaignId = $id;
        $comment = $request['comment'];
        $amount = Str::of($request['amount'])->replace(',','')?: 0;
        $donatorId = $createdBy;
        $payload = [
            'campaignId' => $campaignId,
            'donatorId' => $donatorId,
            'comment' => $comment,
            'amount' => $amount,
        ];

        $response = $this->donationService->create($payload);
        if ($response['success']) {
            return response()->json([
                'alert' => 'success',
                'message' => 'Silahkan bayar',
                'data' => $response['data'],
                'callback' => route('single',$id)
            ]);
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Maaf, sepertinya ada yang salah, silahkan coba lagi.',
            ]);
        }
    }
     
}
