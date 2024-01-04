@extends('layouts.sidenav')
@section('title', 'Groups')

@section('content')

<h1>Groups</h1>

<div class="table-top">
    <div class="form-group">
        <input type="text" name="search" />
    </div>
    <a href="/admin/groups" class="btn"><i class="fas fa-search"></i></a>
    <a href="/admin/groups/create" class="btn"><i class="fas fa-add"></i></a>
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
                <a href="/admin/groups/{{$group['id']}}/edit" class="btn"><i class="fas fa-edit"></i></a>
                <button data-model-end-point="groups" data-model-id="{{ $group->id }}" class="btn trash"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection