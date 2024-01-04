<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
  function test()
  {

    echo round(10.2563);
    exit();
    $cities = getCities();
    $count = 0;
    foreach ($cities->data as $key => $city) {

      $tock[] = [
        'name' => $city->city,
        'population' => end($city->populationCounts)->value
      ];
    }

    print_r($tock);
  }
}
