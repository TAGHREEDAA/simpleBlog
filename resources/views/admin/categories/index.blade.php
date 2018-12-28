@extends('layouts.admin')

@section('title','All Categories')

@section('content')

    <section class="content">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Categories Data</h3>
                            <a class="btn btn-primary pull-right" href="/admin/categories/create">Add New Category</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="categories-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Created At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a class="btn btn-warning" href="/admin/categories/{{$category->id}}/edit"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <form action="/admin/categories/{{$category->id}}" method="POST">
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




@endsection

@section('script')
    <script>
        $(function () {

            $('#categories-table').DataTable({
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