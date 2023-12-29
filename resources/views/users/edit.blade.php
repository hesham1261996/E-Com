@extends('layouts.main')

@section('body')
    <!-- سيكشن الصفحه -->
    <section class="main-page">
        <div class="container">
            <div class="row row-100vw">
                <div class="row row-100vw personal-Page">
                    <!-- دى السكشن ال فيها الفورم ال عاوز يعدل فيها الاسم والخ -->
                    <div class="col-lg-8 col-md-7  personal-Page-sec1">
                        <form action="{{route('profile.update')}}" name="adjustment-sign" method="POST">
                            @csrf
                            @method('PATCH')
                            <h3>{{__('الحساب الشخصى')}}</h3>
                            <label>{{__('الاسم')}}</label>
                            <!-- الاسم  -->
                            <input type="text" name="name" value="{{$user->name}}">
                            <label>{{__('البريد الالكترونى')}}</label>
                            <!-- البريد الالكترونى -->
                            <input type="text" name="email" value="{{$user->email}}">
                            <button type="submit" class="submit">{{__(' حفظ التعديلات')}}</button>
                        </form>
                    </div>
                    <!-- دى سكشن ال يتم التنقل فيها لصفحه الطلبات والتنبيهات -->
                    <div class="col-lg-4 col-md-5 d-none d-sm-none d-md-flex personal-Page-sec2">
                        <ul class="nav-items">
                            <li class="nav-item active" onclick="window.location.href='personalPage.html'">
                                <span>حسابي</span>
                                <img src="../images/user.png" alt="" />
                            </li>
                            <li class="nav-item" onclick="window.location.href='notificationPage.html'">
                                <span>التنبيهات</span>
                                <img src="../images/bell.svg" alt="" />
                            </li>
                            <li class="nav-item" onclick="window.location.href='talabatPage.html'">
                                <span>طلباتى</span>
                                <img src="../images/package.svg" alt="">
                            </li>
                            <li class="nav-item" onclick="window.location.href='../index.html'">
                                <span>تسجيل الخروج</span>
                            </li>
                        </ul>
                        <div class='help'>
                            <h5>المساعده ؟</h5>
                            <span class="space"></span>
                            <p>تواصل معنا للحصول ع الدعم الفنى</p>
                            <button onclick="window.location.href='joinUs.html'">تواصل معنا</button>
                        </div>
                        <div>
                            <h6>استخدم تطبيق لذائذ واطايب</h6>
                            <p>مميزات كتير وعروض حصريه على التطبيق</p>
                            <div class="button-card">
                                <a
                                    href="https://play.app.goo.gl/?link=https://play.google.com/store/apps/details?id=com.myapp">
                                    <img src="../images/google-play.svg" />
                                    <span>Google play</span>
                                </a>
                                <a
                                    href="https://play.app.goo.gl/?link=https://play.google.com/store/apps/details?id=com.myapp">
                                    <img src="../images/app-store (1).svg" />
                                    <span>Apple store</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
