@extends('layouts.admin')

@section('title','Update Post')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-6">
            Update Post
            @include('_errors')
            <form action="/admin/posts/{{$post->id}}" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}

                    {{--title--}}
                    <div class="form-group">
                        <label>Title*</label>
                        <input type="text" name="title" class="form-control" placeholder="Post Title" value="{{(old('title'))? old('title'): $post->title}}" required>
                    </div>

                    {{--category--}}
                    <div class="form-group">
                        <label>Category*</label>
                        <select class="form-control" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{($category->id === $post->category_id)? "selected":""}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>


                {{--description--}}
                    <div class="form-group">
                        <label>Description*</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Post Description" required>{{(old('description'))? old('description'): $post->description}}</textarea>
                    </div>

                {{--content--}}
                <div class="form-group">
                    <label>Content*</label>
                    <textarea name="content" class="form-control" rows="3" placeholder="Post Content" required>{{(old('content'))? old('content'): $post->content}}</textarea>
                </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                <a href="/admin/posts" class="btn btn-danger">Cancel</a>

            </form>
        </div>
    </div>

</section>


@endsection