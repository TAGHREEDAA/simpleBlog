@extends('layouts.app')

@section('title','Category Posts')


@section('content')

@foreach($posts as $post)
    <div class="panel panel-primary col-md-6 col-md-offset-3">
        <div class="panel-heading"><h3>{{$post->title}}</h3></div>
        <div class="panel-body">
            <p>{{substr($post->description, 0, 100).'...'}}
                <a href="/posts/{{$post->id}}">see more</a></p>
        </div>
    </div>
    @endforeach
@endsection