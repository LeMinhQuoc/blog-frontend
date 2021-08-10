<?php
namespace App\Helper;
use GuzzleHttp\Client;
//require_once "vendor/autoload.php";
use App\Controller\HomeController;
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
        session_start();
        $auth=$_SESSION["token"];
        $term=json_decode($auth,true);
        $auths=$term['token'];
        return json_decode($this -> client-> request('GET', $router, [
             "headers" => [
                 "Content-Type" => "application/json",
                 "Authorization" => 'Bearer'." ".$auths
            ],
            'query' => [
                'page' => '1',
            ]
        ]) -> getBody() -> getContents(), true);
    }
    public function getLogin(string $username, string $password){

        $response = $this->client->request('POST', "/api/login_check", [

            'headers' => [
                'Content-Type' => "application/json"
            ],
            'body' =>  json_encode([
                'username' => $username,
                'password' => $password
            ])
        ]);
        $_SESSION["token"] = $response->getBody()->getContents();
    }


}
