@extends('layouts.admin')

@section('tite','Dashboard')

@section('content')

    <section class="content">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Posts Data</h3>
                            <a class="btn btn-primary pull-right" href="/admin/posts/create">Add new post</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="posts-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->description}}</td>
                                        <td>{{$post->content}}</td>
                                        <td><span class="label label-success">{{$post->category->name}}</span></td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a class="btn btn-warning" href="/admin/posts/{{$post->id}}/edit"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <form action="/admin/posts/{{$post->id}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fa fa-remove"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>

<script>
    $(function () {

        $('#posts-table').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>


@endsection