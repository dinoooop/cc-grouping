<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Str;

class CityController extends Controller
{
    

    public function index(Request $request)
    {
        $query = City::query();
        if(isset($request->sb)){

            $query->orderBy($request->sb, $request->so);
        }
        $cities = $query->get();
        $so = $request->so == 'desc' ? 'asc' : 'desc';
        return view('city', compact('cities', 'so'));
    }
}