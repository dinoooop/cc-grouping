<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function home(Request $request)
    {

        $countries = Country::all();
        return view('home', compact('countries'));

    }

    public function apiTest(Request $request)
    {

        return view('admin.apitest.test');

    }
}