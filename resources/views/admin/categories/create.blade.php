@extends('layouts.admin')

@section('title','Add New Category')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                Add New Category
                @include('partials._errors')
                <form action="/admin/categories" method="POST">
                    {{csrf_field()}}
                    {{--name--}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Name*</label>
                        <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{old('name')}}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/admin/categories" class="btn btn-danger">Cancel</a>

                </form>
            </div>
        </div>

    </section>


@endsection