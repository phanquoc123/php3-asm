<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{ route('home') }}">
                            <img src="/themeclient/assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="current-list-item"><a href="#">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Static Home</a></li>
                                    <li><a href="index_2.html">Slider Home</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="sub-menu">

                                    <li><a href="about.html">About</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </li>
                            <li><a href="news.html">News</a>
                                <ul class="sub-menu">
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="single-news.html">Single News</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="{{ route('shop') }}">Shop</a>
                                <ul class="sub-menu">
                                    @foreach ($categories as $item)
                                        <li><a href="{{ route('shopByCategory', $item->id) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="cart.html">Cart</a></li> --}}
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">



                                    <a class="shopping-cart" href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i></a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i
                                            class="fas fa-search"></i></a>
                                    {{-- <form style="margin-bottom: auto" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="shopping-cart" type="submit"><i class="fas fa-user"></i></button>
                                        </form> --}}
                                    @if (Auth::check() )
                                   
                                    <form style="margin-bottom: auto" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button style="color: white" class="btn btn-logout" type="submit">
                                            <i class="fas fa-sign-out-alt"></i></i>

                                        </button>
                                    </form>
                                    {{-- <span style="color: white">Have a good day:{{ Auth::user()->name }}</span> --}}
                                    @else
                                        <a href="{{ route('login') }}"> <i class="fas fa-user"></i></a>
                                    @endif
                                   
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
