<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Str;

class GroupController extends Controller
{


    public function index(Request $request)
    {
        $groups = Group::orderBy('created_at', 'DESC')->get();
        return view('admin.group.index', compact('groups'));
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $countries = Country::all();
        $selected = $group->countries->pluck('id')->all();
        return view('admin.group.edit', compact('group', 'countries', 'selected'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.group.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'countries' => 'sometimes',
        ]);

        $validated['user_id'] = gcuid();

        $group = Group::create($validated);
        $group->countries()->attach($request->countries);

        return redirect('/admin/groups');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'countries' => 'sometimes',
        ]);

        $group = Group::find($id);
        $group->update($validated);
        $group->countries()->sync($request->countries);

        return redirect('/admin/groups');
    }

    public function destroy(Request $request, $id)
    {
        $data = Group::find($id)->delete();
        return response()->json($data);
    }

    public function groups(Request $request)
    {
        $groups = Group::where('user_id', gcuid())->orderBy('created_at', 'DESC')->with('countries')->get();
        return response()->json($groups);
    }

    public function single(Request $request, $id)
    {
        $groups = Group::where('user_id', gcuid())->where('id', $id)->orderBy('created_at', 'DESC')->with('countries')->get();
        return response()->json($groups);
    }
}
