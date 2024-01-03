<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <meta http-equiv="X-UA-compatible" content="IE-edge">
    {{-- <link rel="shortcut icon" href="images/لوجو لذائذ.png" /> --}}
    {{-- <link rel="icon" href="images/لوجو لذائذ.png" /> --}}
    <title>{{ isset($title) ? $title : __('Zodiac') }}</title>
    <!-- CSS only -->
    <link rel="stylesheet" href={{ asset('css/swiper-bundle.min.css') }} />
    <link rel="stylesheet" href={{ asset('css/all.min.css') }}>

    <link href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">


    <link
        href="https://blogfonts.com/css/aWQ9MTE2NDIyJnN1Yj00MjImYz1iJnR0Zj1CYWhpal9UaGVTYW5zQXJhYmljLVBsYWluLnR0ZiZuPWJhaGlqLXRoZXNhbnNhcmFiaWMtcGxhaW4/Bahij TheSansArabic Plain.ttf"
        rel="stylesheet" type="text/css" />
    <link
        href="https://blogfonts.com/css/aWQ9NjQxOTEmc3ViPTE5MSZjPWImdHRmPUJhaGlqK1RoZVNhbnNBcmFiaWMtU2VtaUJvbGQudHRmJm49YmFoaWotdGhlc2Fuc2FyYWJpYy1zZW1pYm9sZA/Bahij TheSansArabic SemiBold.ttf"
        rel="stylesheet" type="text/css" />
    <link
        href="https://blogfonts.com/css/aWQ9MTE2NDIwJnN1Yj00MjAmYz1iJnR0Zj1CYWhpal9UaGVTYW5zQXJhYmljLUV4dHJhTGlnaHQudHRmJm49YmFoaWotdGhlc2Fuc2FyYWJpYw/Bahij TheSansArabic.ttf"
        rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href={{ asset('css/animate.css') }}>
    <link rel="stylesheet" href={{ asset('css/main.css') }}>
    <!-- <link rel="stylesheet" href="css/mainTrans.css"> -->
    {{-- @vite(['css/all.min.css', 'jcss/all.min.css' ]) --}}

</head>
@yield('style')

<body dir="rtl">

    <!-- loader -->
    <!-- sass/components/_loader-->
    <div class="loader">
        <div class="lds-default">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- end loader -->

    <!-- up -->
    <!-- sass/components/_up-->
    <div class="up">
        <a href="#up">
            <i class="fas fa-hand-point-up"></i>
        </a>
    </div>
    <!-- end---Up -->

    <!-- first --- header  -->
    <!-- sass/components/_firstheader-->
    <div class="row row-100vw first-tab">
        <div class="container first-header">

            <ul class="first-header-left-items">

                <li class="first-header-left-item">
                    <img src={{ asset('images/english.svg') }} />
                    <a href="#" action="" method="" id="language" data-language='english'>اللغه
                        الانجليزيه</a>
                </li>

                <li class="first-header-left-item">
                    <a href="pages/errorPage1.html">مساعده</a>
                    <img src={{ asset('images/help-circle.svg') }}>
                </li>

            </ul>

            <h2 class="d-none d-sm-none d-md-inline-block">
                {{ __('مرحبا بك في موقع زودياك للكمبيوتر والموبايل') }}
            </h2>

        </div>
    </div>
    <!-- end ---- first header  -->


    <!-- second tab -->
    <!-- sass/components/_secondHeader -->
    <div class="row row-100vw">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="container second-tab wow slideInRight" data-wow-duration="2.5s">
            <div class="second-header">
                <!-- mob toggle -->
                <div class="mob">
                    <span></span>
                </div>

                <!-- للتسجيل الدخول وايضا للاشياء تم شرائه -->
                <ul class="second-header-left login-sec-cart-second">
                        <li class="d-none d-md-none d-lg-flex">

                            <a href="{{route('show-card')}}">
                                <div class="cart">
                                    <img class="cart-img" src={{ asset('images/Bag-header.svg') }}>
                                    <span class="cart-quantity">{{count((array) session('card'))}}</span>
                                </div>
                            </a>
                            <span class="price-cart"> $0.00 </span>
                        </li>
                    @guest
                        <li>

                            <a href="{{ route('login') }}">
                                <span class="login">تسجيل دخول</span>
                                <img src={{ asset('images/login.svg') }}></i>
                            </a>
                        </li>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src={{ asset('images/login.svg') }}></i>
                                {{ auth()->user()->name }}
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                @can('update-item')
                                    <li><a class="dropdown-item" href="{{ route('admin.index') }}">{{ __('لوحه التحكم') }}</a>
                                    </li>
                                @endcan
                                <li><a class="dropdown-item" href="#">{{ __('مشترياتي') }}</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('profile.edit') }}">{{ __('الملف الشخصي') }}</a></li>
                                <hr>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            {{ __('تسجيل خروج') }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </ul>


                <!-- لمعرفه جميع الاقسام والبراند -->
                <ul class="second-header-right">
                    <li>
                        <!-- كود البحث -->
                        <div class="search">
                            <img src={{ asset('images/search-line(3).svg') }}>
                            <input data-filter="type" class="input-search search-placeholder" name="search"
                                type="search" placeholder="ابحث عن المنتج">
                        </div>
                    </li>

                    <li>
                        <a href="\" class="brand">
                            {{ __('Zodiac') }}
                        </a>
                    </li>
                </ul>
            </div>

            <nav class="container nav">
                <ul>
                    <li class="nav-item">
                        <a href="pages/joinUs.html">تواصل معنا</a>
                    </li>

                    <li class="nav-item">

                        <div class="menu-information-toggle">
                            <i class="fas fa-caret-down"></i>
                            <a style="pointer-events: none;">معلومات عنا</a>
                        </div>

                        <ul class="menu-information">
                            <li>
                                <a href="pages/ConditionPage.html">السياسه والاحكام</a>
                            </li>
                            <li>
                                <a href="pages/privacyPolicy.html">سياسه الخصوصيه</a>
                            </li>
                            <li>
                                <a href="pages/question.html">الاسئله الشائعه</a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('companies.index') }}"
                            class="{{ $_SERVER['REQUEST_URI'] == '/compaies' ? 'active' : '' }}">{{ __('الشركات') }}</a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="pages/offers.html"class="{{ $_SERVER['REQUEST_URI'] == '#' ? 'active' : '' }}">{{ __('العروض') }}</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('home') }}"
                            class="{{ $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' }}">{{ __('الصفحه الرئيسيه') }}</a>
                    </li>

                    <li class="nav-item">
                        <div class="menu-information-toggle">
                            <i class="fas fa-chevron-down"></i>
                            <a> كل الاقسام</a>
                        </div>
                        <ul class="menu-information">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('show.category', $category->id) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ route('categories.home') }}">{{ __('كل الاقسام') }}</a>
                            </li>
                        </ul>

                    </li>

                    <li class="nav-item mob-toggle-link">
                        <a href="pages/signIn.html">
                            تسجيل الدخول
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- end ------- second header code  -->

    <!-- page sections -->
    <section class="main-page">


        <!-- end ------- slider -->
        @yield('body')
    </section>

    <!-- footer -->
    <section class="footer wow slideInLeft" data-wow-duration="2s">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 footer-1 col-md-4 col-xs-6">
                    <h5>حسابي</h5>
                    <ul>
                        <li> <a href="pages/errorPage3.html" class="footer-inf"> حسابي </a></li>
                        <li> <a href="pages/errorPage3.html" class="footer-inf"> طلباتى </a></li>
                        <li> <a href="pages/errorPage3.html" class="footer-inf">السله</a></li>
                        <li><a href="pages/joinUs.html" class="footer-inf">تواصل معنا</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-7 col-xs-6">
                    <h5>معلومات</h5>
                    <ul>
                        <li>
                            <a href="pages/whoUs.html" class="footer-inf">من نحن</a>
                        </li>
                        <li>
                            <a href="pages/privacyPolicy.html" class="footer-inf">الخصوصيه</a>
                        </li>
                        <li>
                            <a href="pages/ConditionPage.html" class="footer-inf">شروط الاستخدام</a>
                        </li>
                        <li>
                            <a href="pages/question.html" class="footer-inf">الاسئله الشائعه</a>
                        </li>
                    </ul>
                </div>



                <div class="col-lg-2 fast-arrive-sec offset-lg-1 col-md-4 col-xs-3">
                    <h5 class="fast-arrive-h5"> الوصول السريع </h5>
                    <div class="fast-arrive" style="display: flex; justify-content: flex-end;">
                        <ul style="margin-right: 6rem;">
                            <li>
                                <a href="#" class="footer-inf">{{ __('كمبيوتر') }}</a>
                            </li>
                            <li><a href="#" class="footer-inf">{{ __('كمبيوتر') }}</a></li>
                            <li><a href="#" class="footer-inf">{{ __('كمبيوتر') }}</a></li>
                            <li><a href="pages/filterPage.html#spices" class="footer-inf">{{ __('كمبيوتر') }}</a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="pages/filterPage.html#meat" class="footer-inf">{{ __('كمبيوتر') }}</a>
                            </li>
                            <li><a href="pages/filterPage.html#zab2h" class="footer-inf">{{ __('كمبيوتر') }}</a></li>
                            <li><a href="pages/filterPage.html#tools"class="footer-inf">{{ __('كمبيوتر') }}</a></li>
                            <li><a href="pages/filterPage.html#spices" class="footer-inf">{{ __('كمبيوتر') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-md-2 offset-lg-0 col-xs-6 footer-join" style="margin-top: -5px;">
                    <img src={{ asset('images/brand.svg') }}>

                    <div class="footor-join-call">
                        <div>
                            <p>للاستفسار ؟ تواصل معنا</p>
                            <a href="tel:+800800185880600874548">(800) 8001-8588,(0600) 874 548</a>
                        </div>
                        <div>
                            <img src={{ asset('images/headphone.svg') }}>
                        </div>
                    </div>

                    <div class="footor-join-information">
                        <h5>معلومات التواصل</h5>
                        <p> المنصوره , الدقهليه, جمهوريه مصر العربيه , مجمع المحاكم 10 بلوك شارع المحكمه </p>
                    </div>

                </div>

            </div>
        </div>

        <div class="container footer-before-footer">

            <div>
                <a href="https://play.app.goo.gl/?link=https://play.google.com/store/apps/details?id=com.myapp">
                    <img src={{ asset('images/app-store (1).svg') }} />
                    <span>apple store</span>
                </a>
                <a href="https://play.app.goo.gl/?link=https://play.google.com/store/apps/details?id=com.myapp">
                    <img src={{ asset('images/google-play.svg') }} />
                    <span>Google play</span>
                </a>
                <span class="d-none d-sm-inline-block">لتحميل التطبيق</span>
            </div>

            <div>
                <a href="" class="socail"><img src={{ asset('images/snapchat.png') }}></a>
                <a href="" class="socail"><img src={{ asset('images/NoPath - Copy.png') }}></a>
                <a href=""><img src={{ asset('images/instagram.png') }}></a>
            </div>

        </div>
    </section>

    <!-- all rights -->
    <div class="footer-footer">
        <div class="container">
            <div class="footer-footer-allrights">
                <div>
                    <span>لذائذ واطياب <span style="font-weight: 200;">
                            - All Rights Reserved
                        </span>
                    </span>
                </div>
                <div>
                    <span style="font-weight: 200;">Made by <img src={{ asset('images/footer-footer.svg') }}>
                        SoftSteps</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src={{ asset('js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('js/axios.min.js') }}></script>
    <script src={{ asset('js/nav.js') }}></script>
    {{-- <script src={{asset("../js/filter.js")}}></script> --}}
    <script src={{ asset('js/searchindex.js') }}></script>
    <script src={{ asset('js/changeEnglishIndex.js') }}></script>
    <script src={{ asset('js/main.js') }}></script>
    <script src={{ asset('js/lockNav.js') }}></script>

    <script src={{ asset('js/swiper-bundle.min.js') }}></script>

    <script src={{ asset('js/wow.min.js') }}></script>
    <script src={{ asset('js/jQuery1.3.2.js') }} type="text/javascript"></script>
    <script>
        new WOW().init();
        let swiperNum = document.querySelectorAll(".swiper");
        console.log(swiperNum);

        var swiper = new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            // init: false,
            loop: true,

            breakpoints: {

                568: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },

                786: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                994: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1224: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },

            navigation: {
                nextEl: '.swiper-arrow-right',
                prevEl: '.swiper-arrow-left',
            },
        });

        var swiper1 = new Swiper('.swiper1', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            // init: false,

            breakpoints: {

                568: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },

                786: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                994: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1224: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },

            navigation: {
                nextEl: '.swiper-arrow-right1',
                prevEl: '.swiper-arrow-left1',
            },
        });

        var swiper2 = new Swiper('.swiper2', {
            slidesPerView: 1,
            spaceBetween: 10,
            // init: false,
            loop: true,

            breakpoints: {

                568: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },

                786: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                994: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1224: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },

            navigation: {
                nextEl: '.swiper-arrow-right2',
                prevEl: '.swiper-arrow-left2',
            },
        });

        var swiper4 = new Swiper('.swiper4', {
            pagination: {
                el: '.swiper4-pagination',
                clickable: true,
            }
        });

        var openPage = document.querySelectorAll('.sec1-card');
        for (let i = 0; i < openPage.length; i++) {
            openPage[i].addEventListener('click', function() {
                window.location.href = 'pages/filterPage.html';
            })
        }
    </script>


</body>
