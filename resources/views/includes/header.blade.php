<!--Preloader area start here-->
<div id="loading" class="loading">
    <div class="rs-loader">
        <div class="rs-shadow"></div>
        <div class="rs-gravity">
            <div class="rs-ball"></div>
        </div>
    </div>
</div>
<!--Preloader area End here-->

<!--Full width header Start-->
<div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header homestyle">
        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container-fluid">
                <div class="row rs-vertical-middle">
                    <div class="col-lg-2">
                        <div class="logo-area text-white">
                            Mile end training session
                        </div>
                    </div>
                    <div class="col-lg-10 mobile-menu-area">
                        <div class="rs-menu-area display-flex-center">
                            <div class="main-menu">
                                <a class="rs-menu-toggle">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <nav class="rs-menu">
                                    <div class="expand-btn">
                                        <!-- <span class="search-parent">
                                                    <a class="hidden-xs rs-search" href="#">
                                                      <i class="flaticon-search"></i>
                                                    </a>
                                                   <div class="sticky_form">
                                                       <form role="search" class="bs-search search-form" method="get">
                                                           <div class="search-wrap">
                                                                <input class="search-input" type="text" name="fname" placeholder="Search...">
                                                                <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </span> -->

                                        <span>
                                            <a id="nav-expander" class="nav-expander">
                                                <ul class="offcanvas-icon">
                                                    <li>
                                                        <span class="hamburger1"></span>
                                                        <span class="hamburger2"></span>
                                                        <span class="hamburger3"></span>
                                                    </li>
                                                </ul>
                                            </a>
                                        </span>
                                    </div>
                                    <ul class="nav-menu text-right">
                                        <!-- Home -->
                                        <li class="current-menu-item current_page_item menu-item-has-children"> <a href="{{route('home-main')}}" class="home">Home</a>

                                        </li>
                                        <!-- End Home -->

                                        <!-- Club Directory Menu Start -->
                                        <li class="rs-mega-menu"> <a href="{{route('login')}}">Login</a>

                                        </li>
                                        <!--Club Directory Menu End -->


                                        <!-- Pages Menu Start -->
                                        @auth
                                        <li class="last-item"><a href="{{route('contact-us')}}">Contact</a></li>
                                        <li class=""><a href="{{route('my-account')}}">My account</a> </li>
                                        
                                        @else
                                        <li class=""><a href="{{route('register')}}">Register</a> </li>
                                        <li class="last-item"><a href="{{route('contact-us')}}">Contact</a></li>
                                        @endauth
                                        <!-- Pages Menu End -->


                                        <!--Contact Menu Start-->
                                        
                                        <!--Contact Menu End-->
                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Canvas Menu start -->
        <nav class="right_menu_togle hidden-md">
            <div class="close-btn"><span id="nav-close" class="text-center"><i class="flaticon-cross"></i></span></div>
            <div class="canvas-logo">
                <a href="{{route('home-main')}}">

                    Mile end training session
                </a>
            </div>
            <div class="sidebarnav_menu">
                <ul>
                    <li class="active"><a href="{{route('home-main')}}">Home</a></li>
                    <li><a href="#">Club Directory</a></li>
                    <li><a href="{{route('contact-us')}}">Contact</a></li>
                </ul>
            </div>
            <div class="canvas-contact">
                <h5 class="canvas-contact-title">Contact Info</h5>
                <ul class="contact">
                    <li><i class="fa fa-globe"></i>London</li>
                    <li><i class="fa fa-phone"></i><a href="tel:+125427263512">+1254272635123</a></li>
                    <li><i class="fa fa-envelope"></i><a href="mailto:support@demo.com">mileend@gmail.com</a></li>
                </ul>
                <!-- <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul> -->
            </div>
        </nav>
        <!-- Canvas Menu end -->
    </header>
    <!--Header End-->
</div>
<!--Full width header End-->