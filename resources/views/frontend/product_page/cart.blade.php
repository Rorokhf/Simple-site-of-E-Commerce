@extends('frontend.app.app')

@section('content')

    <!-- Cart view section -->
    <section id="cart-view">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            @if (session('message'))
                                                <div> {{ session('message') }}</div>
                                            @endif
                                            <th>delet</th>
                                            <th>image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $value)


                                            <tr>
                                                <form action="{{ route('cart.destroy', $value->rowId) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td>

                                                        <button type="submit" class="fa fa-close">


                                                        </button>
                                                    </td>
                                                </form>
                                                <td><a href="#"><img src="{{ asset('images/products/' . $value->image) }}"
                                                            alt="{{ $value->name }}"></a></td>
                                                <td><a class="aa-cart-title"
                                                        href="{{ route('product-details', $value->id) }}">{{ $value->name }}</a>
                                                </td>
                                                <td>{{ $value->price }}</td>
                                                <td><input class="aa-cart-quantity" type="number"
                                                        value="{{ $value->qty }}"></td>
                                                <td>{{ $value->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6" class="aa-cart-view-bottom">
                                                <div class="aa-cart-coupon">
                                                    <input class="aa-coupon-code" type="text" placeholder="Coupon">
                                                    <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                                                </div>
                                                <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                                            </td>
                                        </tr>
                                </table>
                            </div>

                            <!-- Cart Total view -->
                            <div class="cart-view-total">
                                <h4>Cart Totals</h4>
                                <table class="aa-totals-table">
                                    <tbody>
                                        {{-- @if (Session::has('discount_amount_price'))
                                        <tr>

                                        <li>Sub Total <span>$ {{$total_price}}</span></li>
                                        </tr>
                                        <tr>
                                        <li>Coupon Discount (Code : {{Session::get('coupon_code')}}) <span>$ {{Session::get('discount_amount_price')}}</span></li>
                                        </tr>
                                        <tr>
                                        <li>Total <span>$ {{$total_price-Session::get('discount_amount_price')}}</span></li>
                                        </tr>
                                    @else --}}

                                        <tr>
                                            <th>Subtotal</th>
                                            <td>${{$subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <th>Text</th>
                                            <td>${{$text}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>${{$totalPrice}}</td>
                                        </tr>
                                        {{-- @endif --}}

                                    </tbody>
                                </table>
                                <a href="{{route('cart.create')}}" class="aa-cart-view-btn">Proced to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->


@endsection
