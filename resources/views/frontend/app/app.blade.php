<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Shop | Home</title>

    <!-- Font awesome -->
    <link href="{{ asset('website/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('website/css/bootstrap.css') }}" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{ asset('website/css/jquery.smartmenus.bootstrap.css') }}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/jquery.simpleLens.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/nouislider.css') }}">
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('website/css/theme-color/default-theme.css') }}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{ asset('website/css/sequence-theme.modern-slide-in.css') }}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
    <!-- wpf loader Two -->
    <div id="wpf-loader-two">
        <div class="wpf-loader-two-inner">
            <span>Loading</span>
        </div>
    </div>
    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 row">
                        <div class="aa-header-bottom-area col-4 ">
                            <!-- logo  -->
                            <div class="aa-logo">
                                <!-- Text based logo -->
                                <a href="{{ route('index.index') }}">
                                    <span class="fa fa-shopping-cart"></span>
                                    <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                                </a>
                                <!-- img based logo -->
                                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                            </div>
                        </div>
                        <!-- / search box -->
                        <div class=" aa-cartbox nav nav-tabs aa-products-tab  col-6">
                            <ul class="aa-product-inner">
                                <li class="hidden-xs">
                                    <div class="row">
                                        <div class="update ml-auto mr-auto">
                                            <a href="{{ route('profile') }}"> Profile </a>
                                        </div>

                                    </div>
                                </li>
                                <li class="hidden-xs"><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                <li class="hidden-xs"><a href="{{ route('cart.index') }}">My Cart</a></li>

                            <li>
                                <div class="  col-2">
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Authentication Links -->
                                        @guest
                                            @if (Route::has('login'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('loginUser') }}">{{ __('Login') }}</a>
                                                </li>
                                            @endif

                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('RegisterUser') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                   <span> Welcom </span><i
                                                    class="fa fa-heart" aria-hidden="true"></i>   {{ Auth::user()->name }}<i class="fa fa-chevron-down" aria-hidden="true"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>


                    {{-- cart shopping --}}
                    <div class="aa-cartbox col-2">
                        <a class="aa-cart-link" href="#">
                            <span class="fa fa-shopping-basket"></span>
                            <span class="aa-cart-title">SHOPPING CART</span>
                            <span
                                class="aa-cart-notify">{{ Gloudemans\Shoppingcart\Facades\Cart::content()->count() }}</span>
                        </a>
                        {{-- <div class="aa-cartbox-summary">
                                    <ul>
                                        <li>
                                            <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg"
                                                    alt="img"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">Product Name</a></h4>
                                                <p>1 x $250</p>
                                            </div>
                                            <a class="aa-remove-product" href="#"><span
                                                    class="fa fa-times"></span></a>
                                        </li>
                                        <li>
                                            <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg"
                                                    alt="img"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#">Product Name</a></h4>
                                                <p>1 x $250</p>
                                            </div>
                                            <a class="aa-remove-product" href="#"><span
                                                    class="fa fa-times"></span></a>
                                        </li>
                                        <li>
                                            <span class="aa-cartbox-total-title">
                                                Total
                                            </span>
                                            <span class="aa-cartbox-total-price">
                                                $500
                                            </span>
                                        </li>
                                    </ul>
                                    <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                                </div> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- end cart shopping --}}



        <!-- / header bottom  -->
</header>
<!-- / header section -->
<!-- menu -->
<section id="menu">
    <div class="container">
        <div class="menu-area">
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('index.index') }}">Home</a></li>
                        @foreach ($category as $key => $cat)




                            <li><a href="#">{{ $cat->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">

                                    @foreach ($cat->subcategory as $subcat)
                                        <li><a href="#">{{ $subcat->name }}</a></li>
                                    @endforeach



                                </ul>
                            </li>
                        @endforeach




                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
</section>
<!-- / menu -->
@livewireStyles
@yield('content')

<!-- Support section -->
<section id="aa-support">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-support-area">
                    <!-- single support -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-truck"></span>
                            <h4>FREE SHIPPING</h4>
                            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                        </div>
                    </div>
                    <!-- single support -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-clock-o"></span>
                            <h4>30 DAYS MONEY BACK</h4>
                            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                        </div>
                    </div>
                    <!-- single support -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-phone"></span>
                            <h4>SUPPORT 24/7</h4>
                            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Support section -->
<!-- Testimonial -->
<section id="aa-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-testimonial-area">
                    <ul class="aa-testimonial-slider">
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img" src="img/testimonial-img-2.jpg"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui.</p>
                                <div class="aa-testimonial-info">
                                    <p>Allison</p>
                                    <span>Designer</span>
                                    <a href="#">Dribble.com</a>
                                </div>
                            </div>
                        </li>
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img" src="img/testimonial-img-1.jpg"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui.</p>
                                <div class="aa-testimonial-info">
                                    <p>KEVIN MEYER</p>
                                    <span>CEO</span>
                                    <a href="#">Alphabet</a>
                                </div>
                            </div>
                        </li>
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img" src="img/testimonial-img-3.jpg"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui.</p>
                                <div class="aa-testimonial-info">
                                    <p>Luner</p>
                                    <span>COO</span>
                                    <a href="#">Kinatic Solution</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Testimonial -->

<!-- Latest Blog -->
<section id="aa-latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-latest-blog-area">
                    <h2>LATEST BLOG</h2>
                    <div class="row">
                        <!-- single latest blog -->
                        <div class="col-md-4 col-sm-4">
                            <div class="aa-latest-blog-single">
                                <figure class="aa-blog-img">
                                    <a href="#"><img src="{{ asset('website/img/promo-banner-1.jpg') }}"
                                            alt="img"></a>
                                    <figcaption class="aa-blog-img-caption">
                                        <span href="#"><i class="fa fa-eye"></i>5K</span>
                                        <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                                        <a href="#"><i class="fa fa-comment-o"></i>20</a>
                                        <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                                    </figcaption>
                                </figure>
                                <div class="aa-blog-info">
                                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad?
                                        Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim
                                        repellendus animi. Expedita quas reprehenderit incidunt, voluptates
                                        corporis.</p>
                                    <a href="#" class="aa-read-mor-btn">Read more <span
                                            class="fa fa-long-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- single latest blog -->
                        <div class="col-md-4 col-sm-4">
                            <div class="aa-latest-blog-single">
                                <figure class="aa-blog-img">
                                    <a href="#"><img src="{{ asset('website/img/promo-banner-3.jpg') }}"
                                            alt="img"></a>
                                    <figcaption class="aa-blog-img-caption">
                                        <span href="#"><i class="fa fa-eye"></i>5K</span>
                                        <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                                        <a href="#"><i class="fa fa-comment-o"></i>20</a>
                                        <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                                    </figcaption>
                                </figure>
                                <div class="aa-blog-info">
                                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad?
                                        Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim
                                        repellendus animi. Expedita quas reprehenderit incidunt, voluptates
                                        corporis.</p>
                                    <a href="#" class="aa-read-mor-btn">Read more <span
                                            class="fa fa-long-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- single latest blog -->
                        <div class="col-md-4 col-sm-4">
                            <div class="aa-latest-blog-single">
                                <figure class="aa-blog-img">
                                    <a href="#"><img src="{{ asset('website/img/promo-banner-1.jpg') }}"
                                            alt="img"></a>
                                    <figcaption class="aa-blog-img-caption">
                                        <span href="#"><i class="fa fa-eye"></i>5K</span>
                                        <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                                        <a href="#"><i class="fa fa-comment-o"></i>20</a>
                                        <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                                    </figcaption>
                                </figure>
                                <div class="aa-blog-info">
                                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad?
                                        Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim
                                        repellendus animi. Expedita quas reprehenderit incidunt, voluptates
                                        corporis.</p>
                                    <a href="#" class="aa-read-mor-btn">Read more <span
                                            class="fa fa-long-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Latest Blog -->

<!-- Client Brand -->
<section id="aa-client-brand">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-client-brand-area">
                    <ul class="aa-client-brand-slider">
                        @foreach ($brands as $brand)

                            <li><a href="#"><img class="" width=" 60%" height="30%"
                                        src="{{ asset('images/brands/' . $brand->image) }}"
                                        alt="{{ $brand->name }}"></a></li>

                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Client Brand -->

<!-- Subscribe section -->
<section id="aa-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-subscribe-area">
                    <h3>Subscribe our newsletter </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
                    <form action="" class="aa-subscribe-form">
                        <input type="email" name="" id="" placeholder="Enter your Email">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Subscribe section -->

<!-- footer -->
<footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-footer-top-area">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <h3>Main Menu</h3>
                                    <ul class="aa-footer-nav">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Our Services</a></li>
                                        <li><a href="#">Our Products</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>Knowledge Base</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="#">Delivery</a></li>
                                            <li><a href="#">Returns</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Discount</a></li>
                                            <li><a href="#">Special Offer</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>Useful Links</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="#">Site Map</a></li>
                                            <li><a href="#">Search</a></li>
                                            <li><a href="#">Advanced Search</a></li>
                                            <li><a href="#">Suppliers</a></li>
                                            <li><a href="#">FAQ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>Contact Us</h3>
                                        <address>
                                            <p> 25 Astor Pl, NY 10003, USA</p>
                                            <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                                            <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                                        </address>
                                        <div class="aa-footer-social">
                                            <a href="#"><span class="fa fa-facebook"></span></a>
                                            <a href="#"><span class="fa fa-twitter"></span></a>
                                            <a href="#"><span class="fa fa-google-plus"></span></a>
                                            <a href="#"><span class="fa fa-youtube"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-footer-bottom-area">
                        <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
                        <div class="aa-footer-payment">
                            <span class="fa fa-cc-mastercard"></span>
                            <span class="fa fa-cc-visa"></span>
                            <span class="fa fa-paypal"></span>
                            <span class="fa fa-cc-discover"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- / footer -->



<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('website/js/bootstrap.js') }}"></script>
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="{{ asset('website/js/jquery.smartmenus.js') }}"></script>
<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="{{ asset('website/js/jquery.smartmenus.bootstrap.js') }}"></script>
<!-- To Slider JS -->
<script src="{{ asset('website/js/sequence.js') }}"></script>
<script src="{{ asset('website/js/sequence-theme.modern-slide-in.js') }}"></script>
<!-- Product view slider -->
<script type="text/javascript" src="{{ asset('website/js/jquery.simpleGallery.js') }}"></script>
<script type="text/javascript" src="{{ asset('website/js/jquery.simpleLens.js') }}"></script>
<!-- slick slider -->
<script type="text/javascript" src="{{ asset('website/js/slick.js') }}"></script>
<!-- Price picker slider -->
<script type="text/javascript" src="{{ asset('website/js/nouislider.js') }}"></script>
<!-- Custom js -->
<script src="{{ asset('website/js/custom.js') }}"></script>
@livewireScripts
</body>

</html>
