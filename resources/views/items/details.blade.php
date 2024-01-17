@extends('layouts.main')

@section('body')
    <section class="main-page">
        <div class="container p-0">
            <div class="row">
                <div class="breadcrumb-error d-none d-sm-none d-md-flex" style="--bs-breadcrumb-divider: '<';"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('show.category' , $item->category->id)}}">{{$item->category->title}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$item->childCategory->title}}</li>
                    </ol>
                </div>
            </div>
            <div class="product-page">
                <!-- دا اول سيكشن ف الصفحه -->
                <div class="row row-100vw product-page-sec1">
                    <!-- هنا صوره المنتج -->
                    <div class="product-page-sec1-1 col-lg-5 col-md-4 col-xs-12">
                        <div class="img-col-5">
                            <img src="{{asset("images/$item->image")}}" alt="">
                            @if($item->discount != null)
                                <span class="discard-product">{{$item->discount ."%" . __(' خصم')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="product-page-sec1-2 col-lg-7 col-md-8 col-xs-12">
                        <!-- اسم المنتج -->
                        <h4>
                            {{$item->title}}
                        </h4>
                        <!-- نوعه -->
                        <p class="product-page-sec1-2-2">
                            {{$item->category->title}}
                            <span> : {{__('النوع')}}</span>
                        </p>
                        <!-- تقيمه -->
                        <div class="product-page-sec1-2-3">
                            <div class="stars">
                                <i class="fas fa-star star"></i></a>
                                <i class="fas fa-star star"></i></a>
                                <i class="fas fa-star star"></i></a>
                                <i class="fas fa-star star"></i></a>
                                <i class="fas fa-star star"></i></a>
                            </div>
                            <a href="#">اضافه تقيم</a>
                        </div>
                        <h5 class="product-page-sec1-2-1">{{__('الوصف')}}</h5>
                        <!-- وصفه -->
                        <p class="product-page-sec1-2-4">
                            {{$item->description}}
                        </p>
                        <!-- الكميه والسعر المنتج -->
                        <div class="product-page-sec1-2-5">
                            <!-- الكميه -->
                            <div class="product-page-sec1-2-5-1">
                                <span class="decrement">-</span>
                                <span class="number quantity-product">1</span>
                                <span class="increment">+</span>
                            </div>
                            <!-- السعر والسعر السابق -->
                            <div class="product-page-sec1-2-5-2">
                                <span class="price-product">{{$item->discount != null ? $item->discount($item->id): $item->price}}</span>
                                <span class="price-product-perv">{{$item->discount != null ? $item->price." LE" : ""}} </span>
                            </div>
                        </div>
                        <!-- اسم الطرق -->
                        <div class="product-page-sec1-2-6">
                            <h6 class="toggle-way active">طرق التغليف</h6>
                            <h6 class="toggle-way">طرق التعبئه</h6>
                        </div>
                        <!-- سكشن الطرق -->
                        <div class="product-page-sec1-2-7">
                            <!-- طريقه التغليف -->
                            <form class="ways-covering active">
                                <!-- هنا تكتب الطريفه الاولى -->
                                <div>
                                    <input type="radio" name="way">
                                    <!-- هنا تكتب الطريفه الاولى -->
                                    <label>هذا النص هو مثال لنص يمكن أن يستبدل في </label>
                                </div>
                                <!-- هنا تكتب الطريفه التانيه -->
                                <div>
                                    <input type="radio" name="way">
                                    <!-- هنا تكتب الطريفه الاولى -->
                                    <label>هذا النص هو مثال لنص يمكن أن يستبدل في </label>
                                </div>
                                <!-- هنا تكتب الطريفه التالته -->
                                <div>
                                    <input type="radio" name="way">
                                    <!-- هنا تكتب الطريفه الاولى -->
                                    <label>هذا النص هو مثال لنص يمكن أن يستبدل في </label>
                                </div>
                            </form>

                            <!-- طريقه التعبئه -->
                            <form class="ways-covering">
                                <div>
                                    <input type="radio" name="way">
                                    <label>هذا النص هو مثال لنص يمكن أن يستبدل في </label>
                                </div>
                                <div>
                                    <input type="radio" name="way">
                                    <label>هذا النص هو مثال لنص يمكن أن يستبدل في </label>
                                </div>
                                <div>
                                    <input type="radio" name="way">
                                    <label>هذا النص هو مثال لنص يمكن أن يستبدل في </label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="product-page-sec1-3">
                        <button class="submit btn-cart" onclick="window.location.href='{{route('add-card' , $item->id)}}'">
                            اضافه الى السله
                            <img src="../images/cart-svg.svg" alt="">
                        </button>
                    </div>

                </div>
                <!-- تانى سيكشن ف الصفحه -->
                <!-- اضافه تقيم -->
                @auth()
                <div class="row row-100vw product-page-sec2" id="rating">
                    <div class="product-page-sec2-1 col-xl-7 col-lg-6 col-12 offset-lg-1">
                        <h4 class="product-page-sec2-1-1">
                            اضافه تقييم
                        </h4>
                        <div class="product-page-sec2-1-2">
                            <span>تقيمك</span>
                            <!-- التقيم -->
                            <div class="stars-sec2">
                                <a class="star-rating"> <i class="fas fa-star"></i> </a>
                                <a class="star-rating"> <i class="fas fa-star"></i> </a>
                                <a class="star-rating"> <i class="fas fa-star"></i> </a>
                                <a class="star-rating"> <i class="fas fa-star"></i> </a>
                                <a class="star-rating"> <i class="fas fa-star"></i> </a>
                            </div>
                        </div>
                        <!-- كتابه التقيم -->
                        <form action="{{route('comment')}}" method="POST">
                            @csrf
                            <textarea class="product-page-sec2-1-3" rows="3" name="body" placeholder="اكتب تعليق"></textarea>
                            <input type="hidden" name="item_id" value="{{$item->id}}">
                            <button type="submit" class="submit product-page-sec2-1-4">ارسال</button>
                        </form>
                    </div>
                    @endauth
                    <div class="col-lg-5 col-xl-4 product-page-sec2-2 col-lg-offset-2 d-none d-sm-none d-md-none d-lg-flex">
                        <h3 class="product-page-sec2-2-1">4.7</h3>
                        <div class="stars product-page-sec2-2-2">
                            <i class="fas fa-star star"></i></a>
                            <i class="fas fa-star star"></i></a>
                            <i class="fas fa-star star"></i></a>
                            <i class="fas fa-star star"></i></a>
                            <i class="fas fa-star star"></i></a>
                        </div>
                        <div class="product-page-sec2-2-3">
                            <img src="../images/productPage.svg" alt="">
                        </div>
                    </div>
                </div>
                <!-- تالت سيكشن ف الصفحه -->
                <!-- الناس المقيمه للمنتج -->
                <div class="row row-100vw product-page-sec3">
                    <h3 class="product-page-sec3-1">
                        التقيميات
                    </h3>
                    <!-- اول تقيم -->
                    <div class="product-page-sec3-2">
                        <div class="stars product-page-sec3-2-1">
                            <i class="fas fa-star star"></i></a>
                            <i class="fas fa-star star"></i></a>
                            <i class="fas fa-star star"></i></a>
                            <i class="fas fa-star star"></i></a>
                            <i class="fas fa-star star"></i></a>
                        </div>
                        @foreach($item->comments as $comment)
                        <p class="product-page-sec3-2-2">{{$comment->body}}</p>
                        <div class="product-page-sec3-2-3">
                            <span class="product-page-sec3-2-3-1">{{$comment->user->name}}</span>
                            <span class="data-time product-page-sec3-2-3-2">{{$comment->created_at->diffForHumans()}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
