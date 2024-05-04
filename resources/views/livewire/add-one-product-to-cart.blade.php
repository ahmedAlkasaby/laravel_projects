<div>
    <div class="row">
        @foreach ($products as $p)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item ">
                    <div class="product-image">
                        <a href="{{ route('Product', ['slug' => $p->slug]) }}"><img class="image"
                                src={{ asset('storage/' . $p->image) }} alt=""></a>
                    </div>
                    <h3>{{ $p->name }}</h3>
                    <p class="product-price"><span>Per Kg</span> {{ $p->selling_price }}$</p>
                    <span> @if ($p->qty<=5)
                        الكميه قابله للنفاز
                         qty = {{ $p->qty }}

                        @endif
                    </span>
                    <br>
                    @if ($p->statue=='is added to cart')
                    <a class="cart-btn" ><i class="fas fa-shopping-cart" ></i>Is Added</a>
                    @else
                    <a class="cart-btn" wire:click='addToCart({{$p->id}})'><i class="fas fa-shopping-cart" ></i>Add To Cart</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
