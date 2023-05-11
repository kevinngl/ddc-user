<?php

namespace App\Services;

use App\Libraries\HttpCurl;

use Illuminate\Support\Facades\Session;

class UserService {

    private $baseUrl;
    private $httpCurl;

    public function __construct() {
        $this->baseUrl = env('API_BE_DDC');
        $this->httpCurl = new HttpCurl($this->baseUrl);
    }

    public function getUser($id) {
        $url = $this->baseUrl . '/user' . '/' . $id;
        $response = $this->httpCurl->get(null, $url);
        $response = json_decode($response, true);

        return $response;
    }

}
