@extends('layout')

@section('content')
<h1>{{$heading}}</h1>
<h2>
        <a href="/post/{{$post['id']}}">
        {{$post['title']}}</a>
    </h2>
    <p>
        {{$post['description']}}
    </p>
@endsection
