@extends('layouts.admin')

@section('title','Update Category')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-6">
            Update Post
            @include('partials._errors')
            <form action="/admin/categories/{{$category->id}}" method="POST">
                {{csrf_field()}}
                {{method_field('PUT')}}

                    {{--name--}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Title*</label>
                        <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{(old('name'))? old('name'): $category->name}}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                <a href="/admin/categories" class="btn btn-danger">Cancel</a>

            </form>
        </div>
    </div>

</section>


@endsection