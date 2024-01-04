@extends('layouts.front')
@section('title', 'Countries')


@section('content')

@include('templates.nav')
<div class="api-test">Test API</div>
<section class="content">
    <table class="general-table">
        <thead>
            <tr>
                <th><a href="{{ url('countries?sb=id&so=' . $so) }}">ID <span>&#x2195;</span></a></th>
                <th><a href="{{ url('countries?sb=name&so=' . $so) }}">Country <span>&#x2195;</span></a></th>
                <th><a href="{{ url('countries?sb=currency&so=' . $so) }}">Currency <span>&#x2195;</span></a></th>
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