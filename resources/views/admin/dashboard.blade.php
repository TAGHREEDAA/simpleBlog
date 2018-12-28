@extends('layouts.admin')

@section('tite','Dashboard')

@section('content')


        <section class="content">

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$categories}}</h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sitemap"></i>
                        </div>
                        <a href="/admin/categories" class="small-box-footer">Show All <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$posts}}</h3>

                            <p>Posts</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sticky-note"></i>
                        </div>
                        <a href="/admin/posts" class="small-box-footer">Show All <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$users}}</h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>


        </section>
    @endsection
