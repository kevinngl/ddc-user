<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Session;

class HttpCurl {

    private $url;
    private $token;

    public function __construct() {
        $this->url = env('API_BE_DDC');
        $this->token = Session::get('auth_token');
    }

    public function get($url, $params) {
        $url = $url ?? $this->url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', $this->token !== null ? 'Authorization: Bearer ' . $this->token : ''));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function post($params, $url) {
        $url = $url ?? $this->url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', $this->token !== null ? 'Authorization: Bearer ' . $this->token : ''));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function put($params, $url) {
        $url = $url ?? $this->url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', $this->token !== null ? 'Authorization: Bearer ' . $this->token : ''));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
