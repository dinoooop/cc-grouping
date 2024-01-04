@extends('layouts.sidenav')
@section('title', 'Edit Group')

@section('content')

<h1>Edit Group</h1>
<form method="post" action="/admin/groups">
    @csrf
    <div class="form-group">
        <label for="name">Group Name:</label>
        <input name="name" type="text" id="name" value="{{ $group->name }}" />
    </div>
    
    <button type="submit">Submit</button>
</form>

@endsection