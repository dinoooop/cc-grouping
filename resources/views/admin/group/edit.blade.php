@extends('layouts.sidenav')
@section('title', 'Edit Group')

@section('content')

<h1>Edit Group</h1>
<form method="post" action="/admin/groups/{{ $group->id }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Group Name:</label>
        <input name="name" type="text" id="name" value="{{ $group->name }}" />
    </div>


    <div class="form-group select-list-item">
        <label for="countries">Select Countries:</label>
        @foreach($countries as $key => $country)
        <?php $checked = in_array($country->id, $selectedCountries) ? 'checked' : ''; ?>
        <label class="select-item {{ $checked }}" for="country-{{ $country->id }}">{{ $country->name }}</label>
        <input name="countries[]" type="checkbox" value="{{ $country->id }}" {{ $checked }} id="country-{{ $country->id }}" />
        @endforeach
    </div>

    <div class="form-group select-list-item">
        <label for="cities">Select Cities:</label>
        @foreach($cities as $key => $city)
        <?php $checked = in_array($city->id, $selectedCities) ? 'checked' : ''; ?>
        <label class="select-item {{ $checked }}" for="city-{{ $city->id }}">{{ $city->name }}</label>
        <input name="cities[]" type="checkbox" value="{{ $city->id }}" {{ $checked }} id="city-{{ $city->id }}" />
        @endforeach
    </div>

    <button type="submit">Submit</button>
</form>

@endsection