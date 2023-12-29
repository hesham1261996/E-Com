@extends('layouts.main')

@section('body')
    @php
        $totalprice = 0;
        $discount = 0 ;
    @endphp
    <section class="main-page">
        <div class="container">
            <div class="row row-100vw">
                <div class="breadcrumb-error d-none d-sm-none d-md-flex" style="--bs-breadcrumb-divider: '<';"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">السله</li>
                        <li class="breadcrumb-item"><a href="clientPage.html">الصفحه الرئيسيه</a></li>
                    </ol>
                </div>
            </div>
            <div class="row row-100vw cart-Page">
                <!-- سكشن المنتجات ال اختارها -->
                <div class="col-lg-9 col-12  cart-Page-sec-2">
                    <div class="sec-cart">
                        <h4>
                            {{ __('المنتجات') }}
                        </h4>

                        @foreach ($item_of_cart as $item)
                            @php
                                $totalprice += $item->price * $item->pivot->number_of_copies;
                                if ($item->discount != null) {
                                    $discount += ( $item->price / $item->discount ) *  $item->pivot->number_of_copies ;
                                }
                            @endphp
                            <div class="sec-cart-product">
                                <div class="sec-cart-product-img-text">
                                    <div class="sec-cart-product-img">
                                        <img src="images/{{ $item->image }}">
                                    </div>
                                    <div class="sec-cart-product-text">
                                        <h3>{{ $item->title }}</h3>
                                        <p>{{ $item->description }}</p>
                                        <p class="sec-cart-product-text-price">
                                            <span
                                                class="price-product">{{ __(' LE ') . number_format($item->price - ($item->price * $item->discount) / 100) }}
                                            </span>
                                            <span
                                                class="price-product-perv">{{ $item->discount != null ? $item->price : '' }}
                                            </span>

                                        </p>
                                    </div>
                                </div>
                                <div class="sec-cart-product-sec2">
                                    <div class="sec-cart-product-sec2-quantity">
                                        <span class="decrement">-</span>
                                        <span class="number quantity-product">{{ $item->pivot->number_of_copies }} </span>
                                        <span class="increment">+</span>
                                    </div>
                                    <div class="sec-cart-product-se2-delete delete">
                                        <img src="{{ asset('images/trash-2.svg') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="space"></div>
                        @endforeach

                    </div>

                    <button onclick="window.location.href='{{route('cline_data')}}'">
                        اتمام عمليه الشراء
                    </button>
                </div>
                <!-- السكشن ال ف الجنب الصغير -->
                <div class="col-12 col-sm-10 col-lg-3 cart-Page-sec-1">
                    <!-- الهيدر-->
                    <div>
                        <h4>{{ __('ملخص الدفع') }}</h4>
                        <!-- المنتجات التى احتارها -->
                        <p style="display: flex; ">
                            {{ __('منتجات') }}
                            <!-- عدد المنتجات ال اختارها -->
                            <span class="cart-quantity" style="margin-left: 4px;"> {{ $item_of_cart->count() }} </span>
                        </p>
                    </div>
                    <div class="space"></div>
                    <!-- المجموع الفرعى للمنتجات -->
                    <div>
                        <span>
                            {{__('المجموع قبل الخصم')}}
                        </span>
                        <span class="price price-All-products">{{$totalprice}}</span>
                    </div>
                    <!-- المخصوم -->
                    <div class="discard-sec">
                        <span>
                            {{__('الخصم')}}
                        </span>
                        <span class="price discard">{{ $item->discount != null ?  $discount.  __(' ج ') : '0' }}</span>
                    </div>
                    <!-- رسوم الخدمات -->
                    {{-- <div>
                        <span>
                            رسوم الخدمات
                        </span>
                        <span class="price price-serivces">40.00 LE</span>
                    </div> --}}
                    <!-- القيمه المضافه -->
                    {{-- <div>
                        <span>
                            قيمه الضريبه المضافه
                        </span>
                        <span class="price price-taxse">10.00 LE</span>
                    </div> --}}
                    <!-- المجموع الكلى -->
                    <div>
                        <span>
                        {{__('المجموع الكلى بعد الخصم')}}
                        </span>
                        <span class="price all-prices">{{ $item->discount != null ?  $totalprice -   $discount .  __(' ج '): $totalprice  }}</span>
                    </div>
                    <!-- مجموع كل السابق -->
                    <div class="all-prices all-prices-sec">{{ $item->discount != null ?  $totalprice -   $discount .  __(' جنيه '): $totalprice    }}</div>
                </div>


            </div>
        </div>
    </section>
@endsection
