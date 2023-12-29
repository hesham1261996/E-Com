@extends('layouts.main')


@section('body')
    <!-- sign Up -->
    <section class="main-page">

        <div class="row ">

            <!-- sign up -->
            <section class="sec-form sec-form-sign-up">
                <div class="container">
                    <div class="sec-title-from">
                        <h3>تسجيل جديد</h3>
                    </div>
                </div>

                <div class="container">
                    <div class="row row-100vw form-sign form-sign-Up">
                        <form method="POST" action="{{ route('register') }}" name="signUp">
                            @csrf
                            <div>
                                <!-- الاسم -->
                                <div>
                                    <input type="text" placeholder="الاسم" name="name" :value="old('name')" required />
                                    <div></div>
                                </div>

                                {{-- <!-- رقم الهاتف -->
                                <div>
                                    <input type="tel" class="number" placeholder="رقم الهاتف" name="yourphone"
                                        required />
                                    <div></div>
                                </div> --}}

                                <!-- البريد الالكترونى -->
                                <div>
                                    <input type="text" placeholder="البريد الالكترونى" name="email" required />
                                    <div></div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                </div>

                                <!-- الباسورد -->
                                <div>
                                    <div class="show-hide-password">
                                        <input class="password" type="password"  placeholder="كلمه المرور" name="password"
                                            required />
                                            <i class="far fa-eye-slash show-hide-icon"></i>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div></div>
                                </div>

                                <!-- اعاده الباسورد -->
                                <div>
                                    <div class="show-hide-password">
                                        <input class="password" type="password" placeholder="تأكيد كلمة المرور"
                                            name="password_confirmation" required />
                                        <i class="far fa-eye-slash show-hide-icon"></i>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                    <div></div>
                                </div>

                            </div>



                            <div>
                                <button type="submit" class="submit">
                                    تسجيل الحساب
                                </button>
                            </div>



                            <div class="question">

                                <span>
                                    لديك حساب؟
                                    <a href="{{route('login')}}">تسجيل دخول </a>
                                </span>

                            </div>

                        </form>
                    </div>
                </div>

            </section>

        </div>

    </section>
@endsection
