@extends('layouts.main')

@section('body')
    @php
        $totalprice = 0;
        $discount = 0 ;
    @endphp

    <div class="container">
        <!-- اول ديف فوق خالص  -->
        <div class="row row-100vw">
            <div class="breadcrumb-error d-none d-sm-none d-md-flex" style="--bs-breadcrumb-divider: '<';"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">الدفع</li>
                    <li class="breadcrumb-item" style="padding-right: 20px;"><a href="cart.html">السله</a></li>
                    <li class="breadcrumb-item"><a href="clientPage.html">الصفحه الرئيسيه</a></li>
                </ol>
            </div>
        </div>
        <!-- اول سكشن ف الصفحه -->
        <div class="row row-100vw cart-Page cart-pag-2">
            <!-- السكشن ال ف الجنب -->
            <div class="col-12 col-md-10  col-lg-4 cart-Page-2-sec-1 ">

                <!-- header section -->
                <h3 class="header-cart">ملخص الطلب</h3>

                <div class="cart-Page-2-sec-1-sections">

                    <div class="header">
                        <h4>ملخص طلبك</h4>
                        <p style="display: flex; ">
                            {{__('منتجات')}}
                            <span class="cart-quantity" style="margin-left: 4px;">{{$item_of_cart->count()}} </span>
                        </p>
                    </div>
                    <!-- مسافه -->
                    <div class="space"></div>
                    <!-- المنتج الاولانى -->
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
                                <h3>{{$item->title}}</h3>
                                <p class="sec-cart-product-text-price">
                                    <span class="price-product">{{ __(' LE ') . number_format($item->price - ($item->price * $item->discount) / 100) }}</span>
                                </p>
                                <span class="last-text"> {{__('العدد : ').$item->pivot->number_of_copies}}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- مسافه -->
                    <div class="space"></div>
                    @endforeach
                    <!-- price all products -->
                    <div class="price-card first-price-card">
                        <span>
                            {{__('المجموع قبل الخصم')}}
                        </span>
                        <span class="price price-All-products">{{number_format($totalprice)}}</span>
                    </div>
                    @if ($item->discount != null)
                            
                        <!-- سعر الخصم -->
                        <div class="discard-sec price-card">
                            <span>
                                المخصوم
                            </span>
                            <span class="price discard">{{ number_format($discount) }} LE</span>
                        </div>
                    @endif

                    <!-- سعر المنتجات بشكل نهائى مع اضافه الرسوم والضرايب -->
                    <div class="price-card">
                        <span>
                            {{__('المجموع الكلى')}}
                        </span>
                        <span class="price all-prices">{{ $item->discount != null ? number_format( $totalprice -   $discount ).  __(' LE '): $totalprice  }}</span>
                    </div>
                </div>

                <!-- sec price all products -->
                <div class="all-prices all-prices-sec">{{ $item->discount != null ? number_format( $totalprice -   $discount ).  __(' LE '): $totalprice}}</div>

                <!-- سيكشن طلب مساعده او هناك مشكله  -->
                <div class="help">
                    <h5>المساعده ؟</h5>
                    <span class="space"></span>
                    <p>تواصل معنا للحصول ع الدعم الفنى</p>
                    <button onclick="window.location.href='joinUs.html'">تواصل معنا</button>
                </div>
            </div>

            <!-- السكشن التانى -->
            <div class="col-lg-8 col-12 cart-Page-2-sec-2">
                <!-- header section -->
                <h3 class="header-cart">{{__('بيانات التوصيل')}}</h3>
                <!-- فورم عن معلومات العميل الذى يطلب الطلب -->
                <form action="{{route('create_cline_data')}}" name="addAddress" method="POST">
                    @csrf
                    <h4>{{__('اضافه عنوان')}}</h4>
                    <!-- دا تنبيه الخطا عندما لايملىء كل الحقول -->
                    <div class="alert-error w-100">
                    </div>

                    <!-- الاسم -->
                    <div class="name cart-Page-2-sec-2-form">
                        <label>{{__('الاسم')}}</label>
                        <div class="cart-Page-2-sec-2-form-input">
                            <input type="text" class="username" name="name" placeholder=" الاسم كاملا" required>
                            <img src="{{asset('../images/Mask Group 1.svg')}}">
                        </div>
                    </div>

                    <!-- رقم الهاتف والرقم الاضافى -->
                    <div class="phone cart-Page-2-sec-2-form sec-flex">
                        <div class="phone1">
                            <label>{{__('رقم الهاتف')}}</label>
                            <div class="cart-Page-2-sec-2-form-input">
                                <input type="tel" class="number" class="phone_number" name="phone_number"
                                    placeholder="رقم الهاتف" required>
                                <img src="{{__('../images/Mask Group 7.svg')}}">
                            </div>
                        </div>
                        {{-- <div class="phone2">
                            <label> رقم هاتف أضافى</label>
                            <div class="cart-Page-2-sec-2-form-input">
                                <input type="tel" class="number" name="yourphone2" placeholder="رقم الهاتف" required>
                                <img src="../images/Mask Group 7.svg">
                            </div>
                        </div> --}}
                    </div>

                    <!-- اختيار المحافظه -->
                    <div class="place sec-flex">
                        <div class="country cart-Page-2-sec-2-form">
                            <label>{{__('المحافظه')}}</label>
                            <select name="country" required class="governate">
                                <option selected="selected">الغربية</option>
                                <option>الإسكندرية</option>
                                <option>الإسماعيلية</option>
                                <option>كفر الشيخ</option>
                                <option>أسوان</option>
                                <option>أسيوط</option>
                                <option>الأقصر</option>
                                <option>الوادي الجديد</option>
                                <option>شمال سيناء</option>
                                <option>البحيرة</option>
                                <option>بني سويف</option>
                                <option>بورسعيد</option>
                                <option>البحر الأحمر</option>
                                <option>الجيزة</option>
                                <option>الدقهلية</option>
                                <option>جنوب سيناء</option>
                                <option>دمياط</option>
                                <option>سوهاج</option>
                                <option>السويس</option>
                                <option>الشرقية</option>
                                <option>الغربية</option>
                                <option>الفيوم</option>
                                <option>القاهرة</option>
                                <option>القليوبية</option>
                                <option>قنا</option>
                                <option>مطروح</option>
                                <option>المنوفية</option>
                                <option>المنيا</option>
                            </select>
                        </div>

                        <!-- اختيار المدينه -->
                        <div class="city cart-Page-2-sec-2-form">
                            <label>{{__('المدينه')}}</label>
                            <input type="text" class="city" name="city" placeholder="المدينه" required>
                        </div>
                    </div>

                    <!-- كتابه العنوان -->
                    <div class="address cart-Page-2-sec-2-form">
                        <label>{{__('العنوان بالتفصيل')}}</label>
                        <textarea placeholder="" name="details_address" required></textarea>
                    </div>
                    <button class="submit submitAddAddress"> {{__('التالى')}} </button>
                </form>

            </div>
        </div>
    </div>
@endsection
