@extends('layouts.front')
@section('title', 'Cities')


@section('content')

@include('templates.nav')
<section class="content">
    <table class="general-table">
        <thead>
            <tr>
                <th><a href="{{ url('cities?sb=id&so=' . $so) }}">ID <span>&#x2195;</span></a></th>
                <th><a href="{{ url('cities?sb=name&so=' . $so) }}">City Name <span>&#x2195;</span></a></th>
                <th><a href="{{ url('cities?sb=population&so=' . $so) }}">Population<span>&#x2195;</span></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cities as $key => $city)
            <tr>
                <td>{{$city['id']}}</td>
                <td>{{$city['name']}}</td>
                <td>{{$city['population']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection