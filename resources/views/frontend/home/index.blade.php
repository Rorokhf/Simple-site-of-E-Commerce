@extends('frontend.app.app')


@section('content')

    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">
                                    <li class="active"><a href="#men" data-toggle="tab">Men</a></li>
                                    <li><a href="#women" data-toggle="tab">Women</a></li>
                                    <li><a href="#sports" data-toggle="tab">Sports</a></li>
                                    <li><a href="#electronics" data-toggle="tab">Electronics</a></li>
                                </ul>
                                @if (session('message'))
                                    <div> {{ session('message') }}</div>
                                @endif
                                <!-- Tab panes -->

                                    <div class="tab-content">
                                        <!-- Start men product category -->
                                        <div class="tab-pane fade in active" id="men">
                                            <ul class="aa-product-catg">
                                                <!-- start single product item -->
                                                @foreach ($products as $product)
                                                    @if ($product->status == 1)
                                                        <li>

                                                            <figure>
                                                                <form method="post" action="{{ route('index.store') }}">
                                                                    @csrf
                                                                <a class="aa-product-img"
                                                                    href="{{ route('product-details', $product->id) }}">
                                                                    <img class="img-thumbnail"
                                                                        src="{{ asset('images/products/' . $product->image) }}"
                                                                        alt="{{ $product->name }}"></a>

                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">
                                                                <button type="submit"
                                                                    class="btn btn-fefault cart aa-add-card-btn"
                                                                    id="buttonAddToCart" name="quantity">
                                                                    {{-- <a class="aa-add-card-btn" href=""> --}}
                                                                    <span class="fa fa-shopping-cart "></span>Add To
                                                                    Cart</a>
                                                                </button>
                                                                <br>
                                                                {{-- <button type="submit" name="wishlist" class="btn btn-fefault cart aa-add-card-btn m-5" > <a href="#" data-toggle="tooltip" data-placement="top"
                                                                    title="Add to Wishlist"><span
                                                                        class="fa fa-heart-o"></span> {{Cart::instance('wishlist')->content();}}</a></button>
                                                                        </form>
                                                                <figcaption> --}}
                                                                    <h4 class="aa-product-title"><a
                                                                            href="#">{{ $product->name }}</a></h4>
                                                                    <span class="aa-product-price">$
                                                                        {{ $product->price }}</span><span
                                                                        class="aa-product-price"><del>$65.50</del></span>
                                                                </figcaption>
                                                            </figure>

                                                            <!-- product badge -->
                                                            <span class="aa-badge aa-sale" href="#">SALE!</span>

                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <a class="aa-browse-btn" href="#">Browse all Product <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                        </div>


                                        <!-- quick view modal -->
                                        @include('frontend.product_page.quick_view')

                                        {{-- @yield('quickView') --}}
                                        <!-- / quick view modal -->
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


@endsection
