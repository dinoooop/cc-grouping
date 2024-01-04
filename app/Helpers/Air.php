<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

/**
 * 
 * 
 * get current user id
 */
function gcuid()
{
    return Auth::user()->id;
}

function getCountries()
{
    $url = 'https://countriesnow.space/api/v0.1/countries/currency';
    $options = [
        'headers' => [
            'Authorization' => 'Bearer your_access_token',
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'key' => 'value',
        ],
    ];

    $response = Http::get($url, $options);
    $body = $response->body();
    return json_decode($body);
}
