<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Str;

class GroupController extends Controller
{


    public function index(Request $request)
    {
        $groups = Group::where('user_id', gcuid())->orderBy('created_at', 'DESC')->get();
        return view('admin.group.index', compact('groups'));
    }

    public function edit($id)
    {
        $group = Group::where('user_id', gcuid())->where('id', $id)->firstOrFail();
        $countries = Country::all();
        $cities = City::all();
        $selectedCountries = $group->countries->pluck('id')->all();
        $selectedCities = $group->cities->pluck('id')->all();
        return view('admin.group.edit', compact('group', 'countries', 'selectedCountries', 'cities', 'selectedCities'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        return view('admin.group.create', compact('countries', 'cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'countries' => 'sometimes',
            'cities' => 'sometimes',
        ]);

        $validated['user_id'] = gcuid();

        $group = Group::create($validated);
        $group->countries()->attach($request->countries);
        $group->cities()->attach($request->cities);

        return redirect('/admin/groups');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'countries' => 'sometimes',
            'cities' => 'sometimes',
        ]);

        $group = Group::find($id);
        $group->update($validated);
        $group->countries()->sync($request->countries);
        $group->cities()->sync($request->cities);

        return redirect('/admin/groups');
    }

    public function destroy(Request $request, $id)
    {
        $data = Group::find($id)->delete();
        return response()->json($data);
    }

    public function groups(Request $request)
    {
        $groups = Group::where('user_id', gcuid())->with('countries')->with('cities')->orderBy('created_at', 'DESC')->get();
        return response()->json($groups);
    }

    public function single(Request $request, $id)
    {
        $groups = Group::where('user_id', gcuid())->where('id', $id)->with('countries')->with('cities')->get();
        return response()->json($groups);
    }
}
