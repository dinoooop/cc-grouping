@extends('layouts.front')
@section('title', 'Countries')


@section('content')

@include('templates.nav')
<section class="content">
    <table class="general-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Country</th>
                <th>Currency</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $key => $country)
            <tr>
                <td>{{$country['id']}}</td>
                <td>{{$country['name']}}</td>
                <td>{{$country['currency']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection