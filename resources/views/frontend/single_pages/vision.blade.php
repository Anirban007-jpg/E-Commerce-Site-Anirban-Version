@extends('frontend.layouts.master')
@section('content')
    <!-- Banner Section -->
    <section class="banner_part">
        <img src="{{asset('public/frontend/image/banner.jpg')}}" style="width: 100%">
    </section>

    <!-- About us Section -->
    <section class="mission_vision">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 style="padding-top: 15px;padding-bottom: 5px;border-bottom: 1px solid #000000; width: 23%;">Vision</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="{{asset('public/upload/vision_images/'. $vision->image)}}" style="border: 1px solid #ddd;padding: 5px;background: #EFEE03;border-radius: 30px;float: left;margin-right: 10px;">
                    <p style="text-align: justify;">{{$vision->title}}</p>
                </div>
            </div>
        </div>
    </section>

@endsection
