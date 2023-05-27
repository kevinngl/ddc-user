<?php

namespace App\Services;

use App\Libraries\HttpCurl;

use Illuminate\Support\Facades\Session;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CampaignService
{
    private $baseUrl;
    private $httpCurl;

    public function __construct()
    {
        $this->baseUrl = env('API_BE_DDC');
        $this->httpCurl = new HttpCurl($this->baseUrl);
    }

    public function list($params)
    {
        $queryParams = [
            'page' => $params['page'] ?? 1,
            'limit' => $params['limit'] ?? 6,
            'status' => 'live'
        ];

        if (isset($params['title'])) {
            $queryParams['title'] = $params['title'];
        }

        if (isset($params['categoryId'])) {
            $queryParams['campaignCategoryId'] = $params['categoryId'];
        }
        
        if (isset($params['status'])) {
            $queryParams['status'] = $params['status'];
        }

        $queryString = http_build_query($queryParams);
        $url = $this->baseUrl . '/campaign?' . $queryString; 
        $response = $this->httpCurl->get($url, []);
        return json_decode($response, true);
    }

    public function detail($id)
    {
        $url = $this->baseUrl . '/campaign/' . $id;
        $response = $this->httpCurl->get($url, []);
        return json_decode($response, true);
    }

}
