<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>IliIli</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>

<body>
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{asset('/')}}">ПОЧЕТНА</a></li>
                                <li><a href="{{asset('/shop')}}">ИЗДАВАЧКА КУЌА</a></li>
                                <li><a href="about.html">ЗА НАС</a></li>
                                <li><a href="contact.html">КОНТАКТ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch">
                                    <span class="flaticon-search"></span>
                                </div>
                            </li>
                            @if(Auth::check())
                                <li> <a href="{{asset('my-account')}}"><span class="flaticon-user"></span></a></li>
                                <li> <a href="{{asset('logout')}}"><span class="flaticon-user"></span></a></li>
                            @else
                                <li> <a href="{{asset('login-page')}}"><span class="flaticon-user"></span></a></li>
                            @endif
                            <li><a href="cart.html"><span class="flaticon-shopping-cart"></span></a> </li>
                        </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>





<section class="cart_area section_padding">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Продукт</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Количина</th>
                        <th scope="col">Вкупно</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(\App\Http\Helpers::getAllProductFromCart())
                        @foreach(\App\Http\Helpers::getAllProductFromCart() as $key=>$cart)
                    <tr>
                            @php
                                $photo=explode(',',$cart->book['photo']);
                            @endphp
                        <td>
                            <div class="media">
                                <div class="d-flex">
                                    <p class="product-name"><a href="{{route('product-detail',$cart->book['slug'])}}" target="_blank">{{$cart->book['title']}}</a></p>
                                    <img src="assets/img/gallery/card2.png" alt="" />
                                </div>
                                <div class="media-body">
                                </div>
                            </div>
                        </td>
                        <td class="price" data-title="Price"><span>${{number_format($cart['price'],2)}}</span></td>
                        <td>
                            <div class="product_count">
                                <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                <input class="input-number" type="text" name="qty_id[{{$key}}]" min="1" max="10" value="{{$cart->quantity}}">
                                <span class="input-number-increment"> <i class="ti-plus"></i></span>
                            </div>
                        </td>

{{--                        <div class="product_count">--}}
{{--                            <div class="button minus">--}}
{{--                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$key}}]">--}}
{{--                                    <i class="ti-minus"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <input type="text" name="quant[{{$key}}]" class="input-number"  data-min="1" data-max="100" value="{{$cart->quantity}}">--}}
{{--                            <input type="hidden" name="qty_id[]" value="{{$cart->id}}">--}}
{{--                            <div class="button plus">--}}
{{--                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$key}}]">--}}
{{--                                    <i class="ti-plus"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <td class="total-amount cart_single_price" data-title="Total"><span class="money">${{$cart['amount']}}</span></td>
                    </tr>
                        @endforeach
                    @endif
                    <tr class="bottom_button">
                        <td>
                            <a class="btn_1" href="#">Update Cart</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="cupon_text float-right">
                                <a class="btn_1" href="#">Close Coupon</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <h5>Subtotal</h5>
                        </td>
                        <td>
                            <h5>$2160.00</h5>
                        </td>
                    </tr>
                    <tr class="shipping_area">
                        <td></td>
                        <td></td>
                        <td>
                            <h5>Shipping</h5>
                        </td>
                        <td>
                            <div class="shipping_box">
                                <ul class="list">
                                    <li>
                                        Flat Rate: $5.00
                                        <input type="radio" aria-label="Radio button for following text input">
                                    </li>
                                    <li>
                                        Free Shipping
                                        <input type="radio" aria-label="Radio button for following text input">
                                    </li>
                                    <li>
                                        Flat Rate: $10.00
                                        <input type="radio" aria-label="Radio button for following text input">
                                    </li>
                                    <li class="active">
                                        Local Delivery: $2.00
                                        <input type="radio" aria-label="Radio button for following text input">
                                    </li>
                                </ul>
                                <h6>
                                    Calculate Shipping
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </h6>
                                <select class="shipping_select">
                                    <option value="1">Bangladesh</option>
                                    <option value="2">India</option>
                                    <option value="4">Pakistan</option>
                                </select>
                                <select class="shipping_select section_bg">
                                    <option value="1">Select a State</option>
                                    <option value="2">Select a State</option>
                                    <option value="4">Select a State</option>
                                </select>
                                <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                                <a class="btn_1" href="#">Update Details</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="#">Continue Shopping</a>
                    <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                </div>
            </div>
        </div>
</section>



<section class="cart_area section_padding">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <!-- Shopping Summery -->
                <table class="table">
                    <thead>
                    <tr class="">
                        <th>Продукт</th>
                        <th>NAME</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Количина</th>
                        <th class="text-center">Вкупно</th>
                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                    </tr>
                    </thead>
                    <tbody id="cart_item_list">
                    <form action="{{route('cart-update')}}" method="POST">
                        @csrf
                        @if(\App\Http\Helpers::getAllProductFromCart())
                            @foreach(\App\Http\Helpers::getAllProductFromCart() as $key=>$cart)
                                <tr>
                                    @php
                                        $photo=explode(',',$cart->book['photo']);
                                    @endphp
                                    <td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
                                    <td style="text-align: center;"><img src="{{url('images/',$cart->book['photo'])}}"  class="img-fluid zoomIn" alt="" width="50"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="{{route('product-detail',$cart->book['slug'])}}" target="_blank">{{$cart->book['title']}}</a></p>
                                        <p class="product-des">{!!($cart['summary']) !!}</p>
                                    </td>
                                    <td class="price" data-title="Price"><span>${{number_format($cart['price'],2)}}</span></td>
                                    <td class="qty" data-title="Qty"><!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$key}}]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[{{$key}}]" class="input-number"  data-min="1" data-max="100" value="{{$cart->quantity}}">
                                            <input type="hidden" name="qty_id[]" value="{{$cart->id}}">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$key}}]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount cart_single_price" data-title="Total"><span class="money">${{$cart['amount']}}</span></td>

                                    <td class="action" data-title="Remove"><a href="{{route('cart-delete',$cart->id)}}"><i class="ti-trash remove-icon"></i></a></td>
                                </tr>
                            @endforeach
                            <track>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="float-right">
                                <button class="btn float-right" type="submit">Update</button>
                            </td>
                            </track>
                        @else
                            <tr>
{{--                                <td class="text-center">--}}
{{--                                    There are no any carts available. <a href="{{route('product-grids')}}" style="color:blue;">Continue shopping</a>--}}

{{--                                </td>--}}
                            </tr>
                        @endif

                    </form>
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="{{route('save-coupon')}}" method="POST">
                                        @csrf
                                        <input name="code" placeholder="Enter Your Coupon">
                                        <button class="btn">Apply</button>
                                    </form>
                                </div>
                                 <div class="checkbox">`
                                    @php
                                        $shipping=DB::table('delivery')->where('type')->get();
                                    @endphp
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox" onchange="showMe('shipping');"> Shipping</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li class="order_subtotal" data-price="{{\App\Http\Helpers::totalCartPrice()}}">Cart Subtotal<span>${{number_format(\App\Http\Helpers::totalCartPrice(),2)}}</span></li>
                                     <div id="shipping" style="display:none;">
                                        <li class="shipping">
                                            Shipping {{session('shipping_price')}}
                                            @if(count(\App\Http\Helpers::shipping())>0 && \App\Http\Helpers::cartCount()>0)
                                                <div class="form-select">
                                                    <select name="shipping" class="nice-select">
                                                        <option value="">Select</option>
                                                        @foreach(\App\Http\Helpers::shipping() as $shipping)
                                                        <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ${{$shipping->price}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @else
                                                <div class="form-select">
                                                    <span>Free</span>
                                                </div>
                                            @endif
                                        </li>
                                    </div>

{{--                                     {{dd(Session::get('coupon')['value'])}}--}}
                                    @if(session()->has('coupon'))
                                        <li class="coupon_price" data-price="{{Session::get('coupon')['value']}}">You Save<span>${{number_format(Session::get('coupon')['value'],2)}}</span></li>
                                    @endif
                                    @php
                                        $total_amount=\App\Http\Helpers::totalCartPrice();
                                        if(session()->has('coupon')){
                                            $total_amount=$total_amount-Session::get('coupon')['value'];
                                        }
                                    @endphp
                                    @if(session()->has('coupon'))
                                        <li class="last" id="order_total_price">You Pay<span>${{number_format($total_amount,2)}}</span></li>
                                    @else
                                        <li class="last" id="order_total_price">You Pay<span>${{number_format($total_amount,2)}}</span></li>
                                    @endif
                                </ul>
                                <div class="button5">
                                    <a href="{{route('checkout')}}" class="btn">Checkout</a>
{{--                                    <a href="{{route('product-grids')}}" class="btn">Continue shopping</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</section>

<!--/ End Shopping Cart -->

<!-- Start Shop Services Area  -->

<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Asorem ipsum adipolor sdit amet, consectetur adipisicing elitcf sed do eiusmod tem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#"> Offers & Discounts</a></li>
                                <li><a href="#"> Get Coupon</a></li>
                                <li><a href="#">  Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>New Products</h4>
                            <ul>
                                <li><a href="#">Woman Cloth</a></li>
                                <li><a href="#">Fashion Accessories</a></li>
                                <li><a href="#"> Man Accessories</a></li>
                                <li><a href="#"> Rubber made Toys</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Support</h4>
                            <ul>
                                <li><a href="#">Frequently Asked Questions</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Report a Payment Issue</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-8 col-md-7">
                    <div class="footer-copy-right">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-5">
                    <div class="footer-copy-right f-right">
                        <!-- social -->
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- JS here -->

<script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('frontend/js/jquery.slicknav.min.js')}}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/animated.headline.js')}}"></script>
<script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.sticky.js')}}"></script>

<!-- contact js -->
<script src="{{asset('frontend/js/contact.js')}}"></script>
<script src="{{asset('frontend/js/jquery.form.js')}}"></script>
<script src="{{asset('frontend/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('frontend/js/mail-script.js')}}"></script>
<script src="{{asset('frontend/js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>

</body>
</html>
