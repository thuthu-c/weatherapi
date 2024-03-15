<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getweather(){

        $username = 'ufrn_dealbuquerque_thuanny';
        $password = 'n3o4BI0Ocx';

        $client = new Client([
            'curl' => [CURLOPT_SSL_VERIFYPEER => false],
            'auth' => [$username, $password]
        ]);

        $apiUrl = "https://api.meteomatics.com/2024-03-15T00:00:00Z/t_2m:C/52.520551,13.461804/json";


        try {
            $response = $client->get($apiUrl);

            $data = json_decode($response->getBody(), true);

            //dd($data);


            return view('weather', ['weatherData' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }


    }
}
