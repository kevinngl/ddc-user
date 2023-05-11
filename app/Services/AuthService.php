<?php

namespace App\Services;

use App\Libraries\HttpCurl;

use Illuminate\Support\Facades\Session;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthService {

    private $baseUrl;
    private $httpCurl;

    public function __construct() {
        $this->key = env('JWT_SECRET');
        $this->baseUrl = env('API_BE_DDC');
        $this->httpCurl = new HttpCurl($this->baseUrl);
    }

    public function login($email, $password) {
        $params = [
            'email' => $email,
            'password' => $password,
        ];

        $params = json_encode($params);
        $url = $this->baseUrl . '/auth/login';
        $response = $this->httpCurl->post($params, $url);
        $response = json_decode($response, true);

        if ($response['success']) {
            Session::put('auth_token', $response['data']);
            $user = base64_decode($response['data']);
            $decoded = JWT::decode($response['data'], new Key($this->key, 'HS256'));
            Session::put('user', $decoded);

            return $decoded;
        }
        
        return false;
    }

    public function register($name, $email,$phone, $password)
    {
        $params = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
        ];

        $params = json_encode($params);
        $url = $this->baseUrl . '/auth/register';
        $response = $this->httpCurl->post($params, $url);
        $response = json_decode($response, true);

        if ($response['success']) {
            Session::put('auth_token', $response['data']);
            $user = base64_decode($response['data']);
            $decoded = JWT::decode($response['data'], new Key($this->key, 'HS256'));
            Session::put('user', $decoded);

            $response['data'] = $decoded;
            return $response;
        }

        return $response;
    }

}
