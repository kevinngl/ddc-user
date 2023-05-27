<?php

namespace App\Services;

use App\Libraries\HttpCurl;

use Illuminate\Support\Facades\Session;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class DonationService
{
    private $baseUrl;
    private $httpCurl;

    public function __construct()
    {
        $this->baseUrl = env('API_BE_DDC');
        $this->httpCurl = new HttpCurl($this->baseUrl);
    }

    public function create($data)
    {
        $url = $this->baseUrl . '/donation/create';
        $response = $this->httpCurl->post(json_encode($data), $url);
        return json_decode($response, true);
    }

    public function list($params)
    {
        $queryParams = [
            'page' => $params['page'] ?? 1,
            'limit' => $params['limit'] ?? 10,
        ];

        if (isset($params['campaignId'])) { // Adjust the parameter name to 'campaignId'
            $queryParams['campaignId'] = $params['campaignId'];
        }
        
        if (isset($params['donatorId'])) { // Adjust the parameter name to 'donatorId'
            $queryParams['donatorId'] = $params['donatorId'];
        }

        $queryString = http_build_query($queryParams);
        $url = $this->baseUrl . '/donation/list?' . $queryString;
        $response = $this->httpCurl->get($url, []);
        return json_decode($response, true);
    }

}
