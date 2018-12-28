@extends('layouts.app')

@section('content')
    @if($posts->total() === 0)
        @include('partials._no_results')
    @endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($posts as $post)
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3>{{$post->title}}</h3></div>
                    <div class="panel-body">
                        <h4>Category: <span class="label label-success">{{$post->category->name}}</span></h4>
                        <p>{{substr($post->description, 0, 100).'...'}}
                            <a href="/posts/{{$post->id}}">see more</a></p>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="row col-md-8 col-md-offset-2">{{ $posts->links() }}</div>
    </div>
</div>
@endsection
