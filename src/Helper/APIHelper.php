<?php
namespace App\Helper;
use GuzzleHttp\Client;
//require_once "vendor/autoload.php";
class APIHelper
{
    protected Client $client;
    public function __construct(){
        $this -> client = new Client([
        'verify' => false,
        'base_uri' => 'https://127.0.0.1:8001',
        ]);
    }
    public function get(string $router) {
        return $this -> client-> request('GET', $router, [
            'query' => [
                'page' => '1',
            ]
        ]);;
    }
}
