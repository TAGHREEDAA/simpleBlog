@extends('layouts.admin')

@section('title','Add New Post')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                Add New Post
                @include('partials._errors')
                <form action="/admin/posts" method="POST">
                    {{csrf_field()}}
                    {{--title--}}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>Title*</label>
                        <input type="text" name="title" class="form-control" placeholder="Post Title" value="{{old('title')}}" required>
                    </div>

                    {{--category--}}
                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label>Category*</label>
                        <select class="form-control" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--description--}}
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label>Description*</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Post Description" required>{{old('description')}}</textarea>
                    </div>

                    {{--content--}}
                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <label>Content*</label>
                        <textarea name="content" class="form-control" rows="3" placeholder="Post Content" required>{{old('content')}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/admin/posts" class="btn btn-danger">Cancel</a>

                </form>
            </div>
        </div>

    </section>


@endsection