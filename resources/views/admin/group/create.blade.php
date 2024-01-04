@extends('layouts.sidenav')
@section('title', 'Create Group')

@section('content')

<h1>Create Group</h1>
<form method="post" action="/admin/groups">
    @csrf
    <div class="form-group">
        <label for="name">Group Name:</label>
        <input name="name" type="text" id="name" />
    </div>
    
    <button type="submit">Submit</button>
</form>

@endsection