<?php

namespace App\Services;

use App\Libraries\HttpCurl;

use Illuminate\Support\Facades\Session;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CategoryService
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
            'limit' => $params['limit'] ?? 10,
        ];

        $queryString = http_build_query($queryParams);
        $url = $this->baseUrl . '/category?' . $queryString;
        $response = $this->httpCurl->get($url, []);
        return json_decode($response, true);
    }
}