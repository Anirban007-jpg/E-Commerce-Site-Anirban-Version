@extends('frontend.layouts.master')
@section('content')
    <!-- Banner Section -->
    <section class="banner_part">
        <img src="{{asset('public/frontend/image/banner.jpg')}}" style="width: 100%">
    </section>

    <section class="news_events" style="background: #ddd">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="padding-top: 15px;">
                    <h3 style="border-bottom: 1px solid #000;width: 85%">News and Events</h3>
                </div>
                <div class="col-md-9" style="padding-top: 15px;">
                    <table class="table table-striped table-bordered table-hover table-md table-warning">
                        <thead class="thead-dark">
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $key => $newsevent)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{date('d-m-Y', strtotime($newsevent->date))}}</td>
                                <td><img src="{{asset('public/upload/news_event_images/'. $newsevent->image)}}"></td>
                                <td>{{$newsevent->short_title}}</td>
                                <td><a href="{{route('news.event.details', $newsevent->id)}}" class="btn btn-info">Details</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


@endsection
