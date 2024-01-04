<?php

namespace App\Http\Controllers;

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
        return view('admin.group.edit', compact('group'));
    }

    public function create()
    {
        return view('admin.group.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'countries' => 'sometimes',
        ]);

        $validated['user_id'] = gcuid();
        $validated['slug'] = Str::slug($validated['name'], '-');

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

        $validated['slug'] = Str::slug($validated['name'], '-');
        
        $group = Group::find($id);
        $group->update($validated);
        $group->countries()->sync($request->countries);

        return redirect('/admin/groups/' . $id . '/edit');
    }

    public function destroy(Request $request, $id)
    {
        $data = Group::find($id)->delete();
        return response()->json($data);
    }
}
