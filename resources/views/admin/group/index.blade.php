@extends('layouts.sidenav')
@section('title', 'Groups')

@section('content')

<h1>Groups</h1>

<div class="table-top">
    <a href="/admin/groups/create" class="btn">Create</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Group Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($groups as $key => $group)
        <tr>
            <td>{{$group['id']}}</td>
            <td>{{$group['name']}}</td>
            <td>
                <a href="/admin/groups/{{$group['id']}}/edit" class="btn">Edit</i></a>
                <button data-model-end-point="groups" data-model-id="{{ $group->id }}" class="btn trash">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection