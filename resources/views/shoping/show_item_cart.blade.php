@extends('layouts.main')

@section('body')
    @php
        $totalprice = 0;
        $discount = 0;
    @endphp
    <section class="main-page">
        <div class="container">
            <div class="row row-100vw">
                <div class="breadcrumb-error d-none d-sm-none d-md-flex" style="--bs-breadcrumb-divider: '<';"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">السله</li>
                        <li class="breadcrumb-item"><a href="{{route('home')}}">الصفحه الرئيسيه</a></li>
                    </ol>
                </div>
            </div>
            @if (session('card') != null)
                <div class="row row-100vw cart-Page">
                    <!-- السكشن ال ف الجنب الصغير -->
                    <div class="col-12 col-sm-10 col-lg-3 cart-Page-sec-1">
                        <!-- الهيدر-->
                        <div>
                            <h4>{{ __('ملخص الدفع') }}</h4>
                            <!-- المنتجات التى احتارها -->
                            <p style="display: flex; ">
                                {{ __('منتجات') }}
                                <!-- عدد المنتجات ال اختارها -->
                                <span class="cart-quantity" style="margin-left: 4px;"> {{ count((array) session('card')) }}
                                </span>
                            </p>
                        </div>
                        <div class="space"></div>
                        <!-- المجموع الفرعى للمنتجات -->
                        <div>
                            <span>
                                {{ __('عدد المنتجات') }}
                            </span>
                            <span class="price price-All-products">{{ count((array) session('card')) }}</span>
                        </div>
                        <!-- المخصوم -->
                        <div class="discard-sec">
                            <span>
                                {{ __('الخصم') }}
                            </span>
                            <span class="price discard">#</span>
                        </div>
                        <!-- حساب المجموع الكلي-->
                        @php
                            $total_price = 0;
                        @endphp
                        @foreach (session('card') as $item)
                            @php $total_price += $item['price'] *  $item['quantity']; @endphp
                        @endforeach
                        <div>
                            <span>
                                {{ __('المجموع الكلي') }}
                            </span>
                            <span class="price all-prices">{{ number_format($total_price) . "LE" }} </span>
                        </div>
                        <div class="all-prices all-prices-sec">{{ number_format($total_price) }}</div>
                    </div>
                    <!-- سكشن المنتجات ال اختارها -->
                    <div class="col-lg-9 col-12  cart-Page-sec-2">
                        <div class="sec-cart">
                            <h4>
                                {{ __('عربه المشتريات') }}
                            </h4>

                            @foreach ((array) session('card') as $id => $item)
                                @php
                                    $tatal_price = 0;
                                @endphp
                                <div class="sec-cart-product">
                                    <div class="sec-cart-product-img-text">
                                        <div class="sec-cart-product-img">
                                            <img src="images/{{ $item['image'] }}">
                                        </div>
                                        <div class="sec-cart-product-text">
                                            <h3>{{ $item['title'] }}</h3>

                                            <p class="sec-cart-product-text-price">
                                                <span
                                                    class="price-product">{{ number_format($item['price'] * $item['quantity']) }}
                                                </span>
                                                <span class="price-product">
                                                    {{ __('السعر الكلي') }}
                                                </span>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="sec-cart-product-sec2">
                                        <div class="sec-cart-product-sec2-quantity">
                                            {{ $item['quantity'] . ' العدد' }}
                                            {{-- <span class="decrement">-</span>
                                            <span class="number quantity-product"></span>
                                            <span class="increment">+</span> --}}
                                        </div>
                                        <form action="{{ route('remove_from_cart', $id) }}" method="post" class="d-inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" value="حذف" class="btn btn-danger btn-sm"onclick="return confirm('هل انت متاكد؟')">
                                            {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل انت متاكد؟')"><i
                                                    class="fa fa-trash"></i>{{ __('حذف') }}</button> --}}
                                        </form>
                                        {{-- <div class="sec-cart-product-se2-delete delete">
                                            <img src="{{ asset('images/trash-2.svg') }}">
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="space"></div>
                            @endforeach

                        </div>

                        <button onclick="window.location.href='{{ route('customer_data') }}'">
                            اتمام عمليه الشراء
                        </button>
                    </div>



                </div>
            @else
                <div class="alert alert-danger" dir="rtl" role="alert">
                    لا يوجد عناصر مضافه للسله
                </div>
            @endif
        </div>
    </section>
@endsection
