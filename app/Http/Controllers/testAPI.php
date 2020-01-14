<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testAPI extends Controller
{
    public function test()
    {
        $client = new GuzzleHttp\Client();
$res = $client->get('https://api.github.com/user', ['auth' =>  ['user', 'pass']]);
echo $res->getStatusCode(); // 200
echo $res->getBody();
    }
}