@extends('layouts.main')

@section('body')

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
            @if(session('card') != null)
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
                                {{ __('المجموع قبل الخصم') }}
                            </span>
                            <span class="price price-All-products"></span>
                        </div>
                        <!-- المخصوم -->
                        <div class="discard-sec">
                            <span>
                                {{ __('الخصم') }}
                            </span>
                            <span class="price discard">#</span>
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
                                {{ __('المجموع الكلى بعد الخصم') }}
                            </span>
                            <span class="price all-prices">#</span>
                        </div>
                        <!-- مجموع كل السابق -->
                        @php
                            $total_price = 0;
                        @endphp
                        @foreach (session('card') as $item)
                            @php $total_price += $item['price'] *  $item['quantity']; @endphp
                        @endforeach
                        <div class="all-prices all-prices-sec">{{ number_format($total_price) }}</div>
                    </div>
                    <!-- السكشن التانى -->
                    <div class="col-lg-8 col-12 cart-Page-2-sec-2">
                        <!-- header section -->
                        <h3 class="header-cart">الدفع</h3>
                        <!-- فورم عن معلومات العميل الذى يطلب الطلب -->
                        <form action="{{route('customer-data')}}" name="addAddress" method="POST">
                            @csrf
                            <h4>اضافه عنوان</h4>
                            <!-- دا تنبيه الخطا عندما لايملىء كل الحقول -->
                            <div class="alert-error w-100">
                            </div>

                            <!-- الاسم -->
                            <div class="name cart-Page-2-sec-2-form">
                                <label>الاسم</label>
                                <div class="cart-Page-2-sec-2-form-input">
                                    <input type="text" class="username" name="name" placeholder=" الاسم كاملا" required>
                                    <img src="../images/Mask Group 1.svg">
                                </div>
                            </div>

                            <!-- رقم الهاتف والرقم الاضافى -->
                            <div class="phone cart-Page-2-sec-2-form sec-flex">
                                <div class="phone1">
                                    <label>رقم الهاتف</label>
                                    <div class="cart-Page-2-sec-2-form-input">
                                        <input type="tel" class="number" class="phone1" name="phone_number"
                                            placeholder="رقم الهاتف" required>
                                        <img src="../images/Mask Group 7.svg">
                                    </div>
                                </div>
                                {{-- <div class="phone2">
                                    <label> رقم هاتف أضافى</label>
                                    <div class="cart-Page-2-sec-2-form-input">
                                        <input type="tel" class="number" name="yourphone2" placeholder="رقم الهاتف"
                                            required>
                                        <img src="../images/Mask Group 7.svg">
                                    </div>
                                </div> --}}
                            </div>

                            <!-- اختيار المحافظه -->
                            <div class="place sec-flex">
                                <div class="country cart-Page-2-sec-2-form">
                                    <label>المحافطه</label>
                                    <select class="form-control" id="exampleSelectVendor" name="country">
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
                                    <label>المدينه</label>
                                    <input type="text" class="city" name="city" placeholder="ادخل مدينتك" required>
                                </div>
                            </div>

                            <!-- كتابه العنوان -->
                            <div class="address cart-Page-2-sec-2-form">
                                <label>العنوان بالتفصيل</label>
                                <textarea placeholder="" name="details_address" required></textarea>
                            </div>
                            
                            <button class="submit submitAddAddress"> التالى </button>
                        </form>

                    </div>

                </div>
            @endif
        </div>
    </section>
@endsection
