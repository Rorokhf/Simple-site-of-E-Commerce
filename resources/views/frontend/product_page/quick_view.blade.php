

{{-- <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row">
                    <!-- Modal view slider -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-slider">
                            <div class="simpleLens-gallery-container" id="demo-1">
                                <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image"
                                            data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                            <img src="img/view-slider/medium/polo-shirt-1.png"
                                                class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                                <div class="simpleLens-thumbnails-container">
                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                        data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                        data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                        <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                    </a>
                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                        data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                        data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                        <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                    </a>

                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                        data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                        data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                        <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal view content -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-content">
                            <h3>{{ $product->name }}</h3>
                            <div class="aa-price-block">
                                <span class="aa-product-view-price">${{ $product->price }}</span>
                                <p><b>Availability:</b>
                                    {{-- @if($totalStock > 0)
                                        <span id="availableStock">In Stock</span>
                                    @else
                                        <span id="availableStock">Out of Stock</span>
                                    @endif --}}
                                {{-- </p>
                                <p><b>Condition:</b> New</p>
                            </div>
                            <p>{{ $product->description }}</p>
                            <h4>{{ $product->price }}</h4>
                            <span>
                                <select name="size" id="idSize" class="form-control">
                                    <option value="">Select Size</option>
                                    @foreach ($product->attributes as $attrs)
                                        <option value="{{ $product->id }}-{{ $attrs->size }}">{{ $attrs->size }}
                                        </option>
                                    @endforeach
                                </select>
                            </span>
                            <div class="aa-prod-quantity">
                                <form action="">
                                    <span>
                                        <h2 id="dynamic_price">US ${{ $product->price }}</h2> --}}
                                        {{-- <label>Quantity:</label>
                                        <input type="text" name="quantity" value="{{ $totalStock }}"
                                            id="inputStock" />
                                        @if ($totalStock > 0)
                                            <button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                        @endif --}}
                                    {{-- </span>
                                </form>
                                <p class="aa-prod-category">
                                    Category: <a href="#">{{ $product->Category_id }}</a>
                                </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                                <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To
                                    Cart</a>
                                <a href="{{ route('product-details', $product->id) }}"
                                    class="aa-add-to-cart-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        {{-- </div> --}}
        <!-- /.modal-content -->
    {{-- </div> --}}
    <!-- /.modal-dialog -->
{{-- </div> --}}
