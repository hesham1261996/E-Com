@extends('layouts.main')

@section('body')
        <!-- slider  -->
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
    <!-- sass/components/_stylesMainPage -->
        <section class="container sec-imp-dep wow bounceInDown" data-wow-duration="2.5s">
            <div class="container sec-title">
                <h3>
                    {{ __('تصفح اهم اقسامنا') }}
                </h3>
            </div>

            <div class="parent-col-1-4">
                @foreach ($categories as $category)
                <a href="{{route('show.category' , $category->id)}}"class="col-1-4-card" >
                    <div class="col-1-4 sec1-card fourth-card">
                        <img src="images/{{$category->image != null ? $category->image : "index.png"}}">
                        <div class="col-1-4-card">
                                <span>{{ $category->title }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        {{--  highest price card --}}
        <section class="container sec-high-price wow bounceInUp" data-wow-duration="2s">
            <div class="sec-title">
                <!-- arrows for slider -->
                <div class="arrows">
                    <i class="fas fa-chevron-left arrow swiper-arrow-left"></i>
                    <i class="fas fa-chevron-right arrow swiper-arrow-right"></i>
                </div>
                <h3>
                    {{ __('احدث العناصر') }}
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
        <!-- swiper for offers section -->
        <!-- sass/components/_stylesMainPage -->
        <section class="container sec-offers wow bounceInDown" data-wow-duration="2s">
            <!-- tiltle -->
            <div class="sec-title">
                <!-- arrows for slider -->
                <div class="arrows">
                    <i class="fas fa-chevron-left arrow swiper-arrow-left1"></i>
                    <i class="fas fa-chevron-right arrow swiper-arrow-right1"></i>
                </div>
                <h3>
                    {{ __('العروض') }}
                </h3>
            </div>
            <div class="sec-swiper swiper1">
                <div class="swiper-wrapper">
                    @foreach ($offers as $offer)
                        <div class="swiper-slide">
                            <div class="card sec-card" id="product-5">
                                <div class="sec-card-img">
                                    <img src="images/{{$offer->image}}" class="card-img-top" alt="...">
                                </div>

                                <!-- card-body consists of titles -->
                                <div class="card-body sec-card-body">
                                    <span
                                        class="sec-card-body-top">{{ \Str::limit($offer->category->title, 30, '...') }}</span>

                                    <!-- //غنوان الكارد -->
                                    <div class="card-title sec-card-body-title">
                                        <div class="stars-card">
                                            <span>4.5</span>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <a href="pages/productPage.html" class="name-product">
                                            {{ \Str::limit($offer->title, 30, '...') }}
                                        </a>
                                    </div>

                                    <!-- price of card -->
                                    <p class="card-text card-price">

                                        <span>{{ $offer->price - ($offer->price * $offer->discount) / 100 }}</span>
                                    </p>
                                    <p class="card-text card-price">{{ $offer->price }} $</p>

                                </div>
                                <!-- end body card -->

                                <!-- footer of card -->
                                <div class="sec-card-footer">

                                    <a href="pages/errorPage3.html" class="card-bag">
                                        <img src="images/bag-card.svg"></i>
                                    </a>

                                    <div class="card-increment-decrement">
                                        <span class="increment">+</span>
                                        <span class="number">0</span>
                                        <span class="decrement">-</span>
                                    </div>
                                </div>

                                <span class="discard-card-swiper">خصم %{{ $offer->discount }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!-- section for sign and mob -->
        <!-- sass/components/_stylesMainPage -->
        <section class="container sec-col-1-2">
            <div class="row row-100vw justify-content-start col-1-2">

                <div class="sec-col-1-2-text col-xl-4 col-lg-4 col-md-5 m-r-xs-0 row-1-2  col-xs-9 wow bounceInLeft"
                    data-wow-duration="2s">
                    <h3 class="row-1-2-title">تسوق اسرع مع تطبيق لذائذ واطياب</h3>
                    <p>متاح التطبيق الان للاندؤويد والايفون</p>
                    <div class="button-card">
                        <a href="https://play.app.goo.gl/?link=https://play.google.com/store/apps/details?id=com.myapp">
                            <img src="images/google-play.svg" />
                            <span>Google play</span>
                        </a>
                        <a href="https://play.app.goo.gl/?link=https://play.google.com/store/apps/details?id=com.myapp">
                            <img src="images/app-store (1).svg" />
                            <span>play store</span>
                        </a>
                    </div>
                    <div class="img">
                        <img src="images/android-screen.png" alt="">
                        <img src="images/apple-screen.png" alt="">
                    </div>

                </div>

                <div class="col-xl-7 col-lg-7 row-2-4 col-md-6  col-xs-9 wow bounceInRight" data-wow-duration="2s">
                    <img src="images/cover.jpg">
                    <div class="row-text">
                        <h3>{{ __('اكتشف صفقات موقع زودياك الجديده والمذهله') }}</h3>
                        <a href="{{ route('register') }}"> <button>{{ __('سجل الان') }}</button> </a>
                    </div>
                </div>

            </div>
        </section>
        <!-- end section -->
    <!-- section search -->
    <section class="container sec-col-4-1 search-sec-main">
        <div class="row">
            <div class="filter-search parent-sec-col-4-1"
                style="display:flex;flex-wrap: wrap;justify-content:space-around;align-content: center;">

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
