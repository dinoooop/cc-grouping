@extends('layouts.front')
@section('title', 'API List')


@section('content')

@include('templates.nav')
<div class="get-api">GET API</div>
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