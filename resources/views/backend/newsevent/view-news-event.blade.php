@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage News and Event</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">News & Events</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3>News & Events List</h3>
                            <a class="btn btn-success float-right btn-sm" href="{{route('news_events.add')}}"><i class="fa fa-plus-circle"></i>Add News & Event</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Date</th>
                                    <th>Image</th>
                                    <th>Short_Title</th>
                                    <th>Long_Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allData as $key => $news_event)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{date('d-m-Y',strtotime($news_event->date))}}</td>
                                        <td><img src="{{!empty($news_event->image)?url('public/upload/news_event_images/'. $news_event->image): url('public/upload/noimage.png')}}" width="120px" height="130px"></td>
                                        <td>{{$news_event->short_title}}</td>
                                        <td>{{$news_event->long_title}}</td>
                                        <td>
                                            <a title='Edit' class="btn btn-sm btn-primary" href="{{route('news_events.edit', $news_event->id)}}"><i class="fa fa-edit"></i> </a>
                                            <a title='Delete' id='delete' class="btn btn-sm btn-danger" href="{{route('news_events.delete', $news_event->id)}}"><i class="fa fa-trash"></i> </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </section>
                <!-- /.Left col -->

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
@endsection
