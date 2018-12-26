@extends('layouts.app')

@section('title','Category Posts')


@section('content')


    <div class="panel panel-primary col-md-6 col-md-offset-3">
        <div class="panel-heading"><h3>{{$post->title}}</h3></div>
        <div class="panel-body">
            <h4>Category: <span class="label label-success">{{$post->category->name}}</span></h4>
            <h4>Description:</h4>
            <p>{{$post->description}}</p>

            <h4>Content:</h4>
            <p>{{$post->content}}</p>
        </div>
    </div>

@endsection