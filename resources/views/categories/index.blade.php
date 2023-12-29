@extends('layouts.main')
@section('style')
    <style>
        body {
            background: #efefef;
        }

        .featured-section {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .featured {
            background: #fff;
            height: 300px;
            display: block;
            border: 1px solid blue;
        }

        .category a {
            background: #fff;
            height: 95px;
            display: block;
            margin: 5px 0;
            border: 1px solid blue;
            position: relative;
        }

        .category a span {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
            color: #000;
        }

        .category a span i {
            display: block;
            font-size: 20px;
        }
    </style>
@endsection
@section('body')
    <x-cover :cover="$cover" />
    @if ($categories->count() > 0)
        <section class="container wow bounceInDown" data-wow-duration="2.5s">

            <div class="container mt-5 mb-5" dir="rtl">
                <div class="p-2 bg-white px-4">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row align-items-center filters">
                            <h4>{{ __('عدد الاقسام') }}</h4><span class="ml-2">({{ $categories->count() . ' قسم' }}
                                )</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="row">
                            @foreach ( $categories as $category )
                                <div class="col-xs-4 p-4 col-md-2 category"><a href="{{route('show.category' , $category->id)}}"><span><i
                                    class="fa fa-address-card"></i>{{$category->title}}</span></a></div>
                            @endforeach
                            
                        </div>
                    </div>
        </section>
    @else
        <div class="alert alert-dark" role="alert">
            {{ __('لا يوجد اقسام') }}
        </div>
    @endif
@endsection
