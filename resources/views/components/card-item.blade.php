<div>
    <div class="card sec-card product-sec" id="90">
        <div class="sec-card-img">
            @if( $item->image != null )
                <img src={{ asset("images/$item->image") }} class="card-img-top" alt="...">
            @else
                <img src={{ asset("images/default.jpg") }} class="card-img-top" alt="...">
            @endif

        </div>

        <!-- card-body consists of titles -->
        <div class="card-body sec-card-body">
            @if ($item->categories != null)
                <span class="sec-card-body-top">{{ $item->category->title }}</span>
            @endif

            <!-- //غنوان الكارد -->
            <div class="card-title sec-card-body-title">
                <div class="stars-card">
                    <span>4.5</span>
                    <i class="fas fa-star"></i>
                </div>
                <a href="{{ route('show.item', $item->id) }}" class="name-product">
                    {{ Str::limit($item->title, 30, '...') }}
                </a>
            </div>

            <!-- price of card -->
            <p class="card-text card-price">
                <span>{{ $item->price ? $item->discount($item->id) : $item->price }}</span>
            </p>
            <p class="card-text card-price">{{ $item->discount != null ? $item->price : '' }}</p>

        </div>
        <!-- end body card -->

        <!-- footer of card -->
        <!-- footer of card -->
        <div class="sec-card-footer">

            <a href="{{route('add-card' , $item->id)}}" class="card-bag">
                <img src="{{asset('images/bag-card.svg')}}"></i>
            </a>

            {{-- <div class="card-increment-decrement">
                <span class="increment">+</span>
                <span class="number">0</span>
                <span class="decrement">-</span>
            </div> --}}
        </div>

        @if ($item->discount > 0)
            <span class="discard-card-swiper"> %خصم {{ $item->discount }}</span>
        @endif
    </div>
</div>
