@extends('layouts.admin')

@section('title','All Categories')

@section('content')

    <section class="content">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
            <div class="alert alert-info hidden" id="delete-msg"></div>

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
                'responsive'    : true,
                'processing'    : true,
                'serverSide'    : true,
                'ajax'          : '{!! route('datatables.categories') !!}',
                'columns'       : [
                    {data:'name', name: 'name'},
                    {data:'created_at', name: 'created_at'},
                    {data: 'update', name: 'update', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false}

                ],
                'paging'        : true,
                'lengthChange'  : false,
                'searching'     : true,
                'ordering'      : true,
                'info'          : true,
                'autoWidth'     : false
            })
        });


        $('#categories-table').on('click', '.btn-delete[data-remote]', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = $(this).data('remote');
            // confirm then
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {method: '_DELETE', submit: true},
                success:function (data) {
                    $('#delete-msg').removeClass('hidden');
                    $('#delete-msg').text(data.message);
                }
            }).always(function (data) {
                $('#categories-table').DataTable().draw(false);
            });
        });
    </script>
@endsection