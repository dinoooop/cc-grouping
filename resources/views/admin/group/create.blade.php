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
    <div class="form-group select-list-item">
        <label for="countries">Select Countries:</label>
        @foreach($countries as $key => $country)
        <label class="select-item" for="country-{{ $country->id }}">{{ $country->name }}</label>
        <input name="countries[]" type="checkbox" value="{{ $country->id }}" id="country-{{ $country->id }}" />
        @endforeach
    </div>
    <div class="form-group select-list-item">
        <label for="cities">Select Cities:</label>
        @foreach($cities as $key => $city)
        <label class="select-item" for="city-{{ $city->id }}">{{ $city->name }}</label>
        <input name="cities[]" type="checkbox" value="{{ $city->id }}" id="city-{{ $city->id }}" />
        @endforeach
    </div>

    <button type="submit">Submit</button>
</form>

@endsection