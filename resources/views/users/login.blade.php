@extends('layouts.main')

@section('body')
    <section class="main-page">

        <div class="row row-100vw">
            <section class="sec-form">
                <div class="container">
                    <div class="row row-100vw form-sign form-sign-in">
                        <div class="form-sign-img col-lg-6 col-xl-5 d-sm-none d-none d-md-none d-lg-inline-block">
                            <img src="../images/signIn.svg" />
                        </div>
                        <form class="col-md-9 col-lg-6 col-xl-6 offset-xl-1 col-xs-9" method="POST" action="{{ route('login') }}" name="signIn">
                            @csrf
                            <h3 class="sec-title-from">تسجيل الدخول</h3>
                            <!-- البريد الالكترونى او الهاتف  -->
                            <!-- عملت ال name : yourphone فى التسجيل كان email or yourphone -->
                            <div>
                                <input type="email"  name="email" :value="old('email')" onkeypress="isInputNumber(event)"
                                    placeholder="البريد الاليكتروني" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <div></div>
                            </div>

                            <!--الرقم السري  -->
                            <div>

                                <div class="show-hide-password text-right">
                                    <input class="password mb-0" type="password" name="password" :value="__('Password')" placeholder="كلمه المرور"
                                        required />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    <i class="far fa-eye-slash show-hide-icon"></i>
                                </div>

                                <div></div>
                            </div>

                            <!-- check box -->
                            <div class="rember-password">


                                <a href="forgetPassword.html">نسيت كلمه السر ؟</a>
                                <div>
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    
                                </div>

                            </div>

                            <!-- زرار الادخال ع الصفحه -->
                            <button class="submit">تسجيل الدخول</button>

                            <div class="question qus-signin">

                                <span>
                                    أليس لديك حساب؟
                                    <a href="{{route('register')}}">انشاء حساب جديد</a>
                                </span>

                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
