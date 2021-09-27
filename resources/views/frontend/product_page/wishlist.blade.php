@extends('frontend.app.app')

@section('content')
    <!-- Cart view section -->
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table aa-wishlist-table">
                            <form action="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Stock Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($cart as $value)
                                                <tr>

                                                    <form action="{{ route('cart.destroy', $value->rowId) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <td>

                                                            <button type="submit" class="fa fa-close">


                                                            </button>
                                                        </td>
                                                    </form>

                                                    <td>

                                                        <a href="#"><img
                                                                src="{{ asset('images/products/' . $value->image) }}"
                                                                alt="{{ $value->name }}"></a>
                                                    </td>

                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->price }}</td>

                                                    @if ($cart->where('rowId', $value->id)->count())
                                                        <td>In Stock</td>
                                                    @else


                                                    <form method="post" action="{{ route('index.store') }}">
                                                        @csrf


                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product->id }}">
                                                    <button type="submit"
                                                        class="btn btn-fefault cart aa-add-card-btn"
                                                        id="buttonAddToCart" name="quantity">
                                                        {{-- <a class="aa-add-card-btn" href=""> --}}
                                                        <span class="fa fa-shopping-cart "></span>Add To
                                                        Cart</a>
                                                    </button>
                                                            </form>
                                                </tr>
                                                 @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->
@endsection
