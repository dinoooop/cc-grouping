<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    

    public function index(Request $request)
    {
        $query = Country::query();
        if(isset($request->sb)){

            $query->orderBy($request->sb, $request->so);
        }
        $countries = $query->get();
        $so = $request->so == 'desc' ? 'asc' : 'desc';
        return view('home', compact('countries', 'so'));
    }
}