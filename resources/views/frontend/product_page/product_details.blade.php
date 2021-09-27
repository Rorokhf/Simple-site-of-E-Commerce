@extends('frontend.app.app')

@section('content')

<!-- product category -->
<section id="aa-product-details">


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="aa-product-view-slider">
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container">
                            <a data-lens-image="{{ asset('images/products/' . $detail_product->image) }}" class="simpleLens-lens-image">
                            <img src="{{ asset('images/products/' . $detail_product->image) }}" class="simpleLens-big-image"></a></div>
                      </div>
                      {{-- <div class="simpleLens-thumbnails-container">
                          <a data-big-image="img/view-slider/medium/polo-shirt-1.png" data-lens-image="img/view-slider/large/polo-shirt-1.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                          </a>
                          <a data-big-image="img/view-slider/medium/polo-shirt-3.png" data-lens-image="img/view-slider/large/polo-shirt-3.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                          </a>
                          <a data-big-image="img/view-slider/medium/polo-shirt-4.png" data-lens-image="img/view-slider/large/polo-shirt-4.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                          </a>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                {{-- <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>T-Shirt</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">$34.99</span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                      <a href="#">S</a>
                      <a href="#">M</a>
                      <a href="#">L</a>
                      <a href="#">XL</a>
                    </div>
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                      <a href="#" class="aa-color-green"></a>
                      <a href="#" class="aa-color-yellow"></a>
                      <a href="#" class="aa-color-pink"></a>
                      <a href="#" class="aa-color-black"></a>
                      <a href="#" class="aa-color-white"></a>
                    </div>
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">Polo T-Shirt</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div>
                  </div>
                </div> --}}

                <div class="col-sm-7">
                    <form action="{{route('index.store')}}" method="post" role="form">

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                        <input type="hidden" name="product_name" value="{{$detail_product->name}}">
                        <input type="hidden" name="product_code" value="{{$detail_product->code}}">
                        <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                        <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                        <div class="product-information"><!--/product-information-->
                            <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                            <h2>{{$detail_product->name}}</h2>
                            <p>Code ID: {{$detail_product->code}}</p>
                            <span>
                                <select name="size" id="idSize" class="form-control">
                                <option value="">Select Size</option>
                                @foreach($detail_product->attributes as $attrs)
                                    <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
                                @endforeach
                            </select>
                            </span><br>
                            <span>
                                <h2 id="dynamic_price">US ${{$detail_product->price}}</h2>
                                <label>Quantity:</label>
                                <input type="text" name="quantity" value="{{$totalStock}}" id="inputStock"/>
                                @if($totalStock>0)
                                <br>
                                <div>
                                    <input type="hidden" name="product_id" value="{{$detail_product->id}}">
                                <button type="submit" class="btn btn-fefault cart aa-cart-view-btn" id="buttonAddToCart">
                                    <i class="fa fa-shopping-cart"></i></a>
                                    Add to cart
                                </button>
                                view cart
                                <a class="" href="{{route('cart.index')}}">  <i class="fa fa-shopping-cart"></i></a>


                                </div>
                                @endif
                            </span>
                            <p><b>Availability:</b>
                                @if($totalStock>0)
                                    <span id="availableStock">In Stock</span>
                                @else
                                    <span id="availableStock">Out of Stock</span>
                                @endif
                            </p>
                            <p><b>Condition:</b> New</p>
                            <a href=""><img src="{{asset('frontEnd/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </form>

                </div>
              </div>
            </div>


            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>{{$detail_product->description}} </p>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4>
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>
              </div>
            </div>
            <!-- Related product -->
             {{-- <div class="aa-product-related-item">
              {{-- <h3>Related Products</h3> --}}

              <!-- quick view modal -->
@include('frontend.product_page.quick_view')
              <!-- / quick view modal -->


            <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">recommended items</h2>

                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php $countChunk=0;?>
                        @foreach($relateProducts->chunk(3) as $chunk)
                            <?php $countChunk++; ?>
                            <div class="item<?php if($countChunk==1){ echo' active';} ?>">
                                @foreach($chunk as $item)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ asset('images/products/' . $detail_product->image) }}"
                                                    alt="{{ $detail_product->name }}" style="width: 150px;"/>
                                                    <h2>{{$item->price}}</h2>
                                                    <p>{{$item->name}}</p>

                                                    <button type="submit" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>Add to cart</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div><!--/recommended_items-->

          </div>
        </div>
      </div>

  </section>
  <!-- / product category -->


@endsection
