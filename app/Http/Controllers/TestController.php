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
      $data = Group::where('user_id', 1)->with('countries')->get();
      return response()->json($data);
    }
}
