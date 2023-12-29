<div>
    <!-- slider  -->
    <!-- sass/components/_slider -->
    <div class="row row-100vw p-0 parent-slider">
        <div class="swiper4 row row-100vw p-0 h-100 w-100" style="position: relative;">
            <div class="swiper-wrapper parent-slider-slides">
                <div class="swiper-slide slider">
                    @isset($cover)
                        <img src={{ asset("images/$cover") }} class="d-block w-100" alt="...">
                    @else
                        <img src={{ asset('images/cover.jpg') }} class="d-block w-100" alt="...">
                    @endisset

                    <div class="carousel-caption d-none d-md-flex slider-text">
                        <span>{{ __(' احدث انواع الاب توب والموبايل') }}</span>
                        <h5>{{ __('اكتشف احدث اجهزه الكمبيوتر والاب توب') }}</h5>
                        <p>{{ __('اجهزه موثوقه 100 % وبضمان كامل') }}</p>
                        <button>تسوق الان</button>

                    </div>
                </div>
                <div class="swiper-slide slider">
                    <img src={{ asset('images/front-image.png') }} class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-flex slider-text">

                        <span>{{ __(' احدث انواع الاب توب والموبايل') }}</span>
                        <h5>{{ __('اكتشف احدث اجهزه الكمبيوتر والاب توب') }}</h5>
                        <p>{{ __('اجهزه موثوقه 100 % وبضمان كامل') }}</p>
                        <button>تسوق الان</button>

                    </div>
                </div>
                <div class="swiper-slide slider">
                    <img src={{ asset('images/front-image.png') }} class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-flex slider-text">

                        <span>لحوم عضويه طازجه %100</span>
                        <h5>اكتشف صققات موقع لذائذ واطياب الجديده والمذهله</h5>
                        <p>الغذاء الصحى الاكثر صحه هو امن صحه</p>
                        <button>تسوق الان</button>

                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper4-pagination parent-slider-indicators"></div>
        </div>
    </div>
    <!-- end ------- slider -->
</div>