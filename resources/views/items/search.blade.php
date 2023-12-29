@extends('layouts.main')

@section('body')
    <!-- sass/components/_slider -->
    <div class="row row-100vw p-0 parent-slider">
        <div class="swiper4 row row-100vw p-0 h-100 w-100" style="position: relative;">
            <div class="swiper-wrapper parent-slider-slides">
                <div class="swiper-slide slider">
                    <img src={{asset("images/cover.jpg")}} class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-flex slider-text">

                        <span>{{__(' احدث انواع الاب توب والموبايل')}}</span>
                        <h5>{{__('اكتشف احدث اجهزه الكمبيوتر والاب توب')}}</h5>
                        <p>{{__('اجهزه موثوقه 100 % وبضمان كامل')}}</p>
                        <button>تسوق الان</button>

                    </div>
                </div>
                <div class="swiper-slide slider">
                    <img src={{asset("images/front-image.png")}} class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-flex slider-text">

                        <span>{{__(' احدث انواع الاب توب والموبايل')}}</span>
                        <h5>{{__('اكتشف احدث اجهزه الكمبيوتر والاب توب')}}</h5>
                        <p>{{__('اجهزه موثوقه 100 % وبضمان كامل')}}</p>
                        <button>تسوق الان</button>

                    </div>
                </div>
                <div class="swiper-slide slider">
                    <img src={{asset("images/front-image.png")}} class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-flex slider-text">

                        <span>{{__(' احدث انواع الاب توب والموبايل')}}</span>
                        <h5>{{__('اكتشف احدث اجهزه الكمبيوتر والاب توب')}}</h5>
                        <p>{{__('اجهزه موثوقه 100 % وبضمان كامل')}}</p>
                        <button>تسوق الان</button>

                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper4-pagination parent-slider-indicators"></div>
        </div>
    </div>
    <!--- sec1  -->

    {{--  highest price card --}}
    <section class="container sec-high-price wow bounceInUp" data-wow-duration="2s">
        <div class="sec-title">
            <!-- arrows for slider -->
            <div class="arrows">
                <i class="fas fa-chevron-left arrow swiper-arrow-left"></i>
                <i class="fas fa-chevron-right arrow swiper-arrow-right"></i>
            </div>
            <h3>
                {{ __('نتائج البحث') }}
            </h3>
        </div>
        <div class="sec-swiper swiper">
            <div class="swiper-wrapper">
                @foreach ($items as $item)
                    <div class="swiper-slide">
                        <x-card-item :item="$item"/>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ادخال الايميل -->
    <section class="row row-100vw row-1-4 wow slideInRight" data-wow-duration="2s">
        <img src="images/before-footer.png" />
        <div class="row-form">
            <input class="enter-email" placeholder="Enter your email address" type="email">
            <a href="{{route('register')}}"><button class="enterbtn">Sign Up</button></a>
        </div>
    </section>
    <!-- end ------ sec1 -->

@endsection
