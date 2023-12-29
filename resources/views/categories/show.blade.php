@extends('layouts.main')

@section('body')
    <x-cover :cover="$category->image "/>
    
    <!-- filterPage -->
    <div class="container">
        <div class="row" style="margin-top: 4.5rem;" id="filter">
            {{-- العناصر --}}
            <div class="sec-col-4-1 col-9">
                <h5>{{__("العناصر")}}</h5>
                <div class="row" id="products">
                    @foreach ($category->items as $item)
                    <div class="sec-col-4-1-card col-xl-4 col-md-6 col-sm-10 col-xs-9 product wow slideInLeft">
                        <x-card-item :item="$item"/>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- الاقسام -->
            <div class="col-3 divide wow bounceInRight" data-wow-duration="2s">
                <div>
                    <h5>{{ __('الاقسام') }}</h5>
                    <!-- الاقسام الرئيسيه -->
                    <ul>
                        
                        @foreach (App\Models\Category::all() as $category)
                            <a href="{{ route('show.category', $category->id) }}">
                                <li data-filter="productname" id="meat" class="filter depart {{$_SERVER['REQUEST_URI'] == "/categories/$category->id/items" ?'active' :''}}">
                                    {{ $category->title }}
                                </li>
                            </a>
                            
                        @endforeach
                    </ul>
                </div>
                <form class="types-prod">
                    <h5>{{__('اقسام داخليه')}}</h5>
                    <!-- اقسام داخليه -->
                    <div class="types-prod-num active">
                        <ul>
                            @foreach ($category->children as $child)                            
                                <div class="label-check">
                                    <a href="{{route('item_by_child' , $child->id)}}">
                                        <li data-filter="productname" id="meat" class="filter depart {{$_SERVER['REQUEST_URI'] == "/child/$child->id/items"? 'active' :''}}">
                                            {{$child->title}}
                                        </li>
                                    </a>
                                    <input class="mycheck filter1" data-filter="type" type="checkbox">
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </form>
                <!-- دى للتسجيل -->
                <div class="row-2-4 w-100 d-none d-sm-none d-md-none d-lg-flex" data-wow-duration="2s"
                    style="height: 602px;  margin-bottom: 2.5rem;">
                    <img src="../images/bkground.png" class="w-100">
                    <div class="row-text">
                        <h3>اكتشف صفقات موقع لذيذ واطياب الجديده والمذهله</h3>
                        <p>الغذائ العضوى الاكثر صحه هو امت للصحه</p>
                        <a href="signUp.html"> <button>سجل الان</button> </a>
                    </div>
                </div>

                <div class="w-100">
                    <img class="w-100" src="../images/Re-password.svg">
                </div>

            </div>


        </div>
    </div>
@endsection
