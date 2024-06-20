@extends('layouts.app')

@section('content')
<!-- Slider Section Start -->
<div id="rs-slider" class="rs-slider home-slider slider-navigation">
    <div class="slider-carousel owl-carousel">
        <div class="single-slider">
            <div class="container">
                <div class="text-part">
                    <h2 class="sub-title wow fadeInLeft" data-wow-delay="1s">Welcome to Mile end</h2>
                    <h1 class="title wow fadeInRight" data-wow-delay="1s"><span class="primary-color"> </span> training session</h1>
                    <div class="desc wow fadeInLeft" data-wow-delay="1s">Book your training session today and improve your football skills. <br> It's easy just sign up and your ready to book your session today! </div>
                    <div class="slider-btn wow fadeInRight" data-wow-delay="1s">
                        <a class="readon" href="{{route('user-book-session')}}">Book a session</a>
                    </div>
                </div>
                <div class="fly-layer">
                    <div class="layer-image">
                        <div class="parallax-ball">
                            <img class="animate3" src="{{asset('assets')}}/images/slider/ball1.png" alt="img">
                        </div>
                        <div class="animate4">
                            <img src="{{asset('assets')}}/images/slider/h1-layer1.png" alt="Slider Layer Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slide2">
            <div class="container">
                <div class="image-part common">
                    <div class="image-wrap">
                        <img class="player animate5" src="{{asset('assets')}}/images/slider/h1-layer2.png" alt="">
                        <img class="ball animate6" src="{{asset('assets')}}/images/slider/ball2.png" alt="">
                    </div>
                </div>
                <div class="text-part common">
                    <h2 class="sub-title">Welcome to </h2>
                    <h1 class="title"><span class="primary-color">Mile </span> end training session</h1>
                    <div class="desc">Sign up and book your training session!</div>
                    <div class="slider-btn">
                        <a class="readon" href="{{route('user-book-session')}}">Book a session !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Section End -->


<!-- Latest News Section Start -->
<div class="rs-lates-news sec-bg pt-91 pb-100 md-pt-70 md-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 md-mb-72">
                <div class="title-style mb-50 md-mb-30">
                    <h2 class="margin-0 uppercase">Latest News</h2>
                    <span class="line-bg left-line y-b pt-10"></span>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-30">
                        <div class="latest-news-grid">
                            <div class="news-img">
                                <a href="#"><img src="{{asset('assets')}}/images/latest-news/1.jpg" alt="News Image"></a>
                            </div>
                            <div class="news-info">
                                <div class="news-date">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <span>March 25, 2024</span>
                                </div>
                                <h3 class="news-title">
                                    <a href="#">Latest Point Table For The Premier League</a>
                                </h3>
                                <div class="news-desc mt-10">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 md-mb-30">
                        <div class="latest-news-grid small-grid">
                            <div class="news-img">
                                <a href="#"><img src="{{asset('assets')}}/images/latest-news/2.jpg" alt="News Image"></a>
                            </div>
                            <div class="news-info">
                                <div class="news-date">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <span>March 13, 2024</span>
                                </div>
                                <h3 class="news-title">
                                    <a href="#">Everything In Soccer Starts Premier League</a>
                                </h3>
                                <div class="news-desc mt-10">The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip...
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 md-mb-30">
                        <div class="latest-news-grid small-grid">
                            <div class="news-img">
                                <a href="#"><img src="{{asset('assets')}}/images/latest-news/3.jpg" alt="News Image"></a>
                            </div>
                            <div class="news-info">
                                <div class="news-date">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <span>March 14, 2024</span>
                                </div>
                                <h3 class="news-title">
                                    <a href="#">City Tops Chelsea in Community Shield Here</a>
                                </h3>
                                <div class="news-desc mt-10">The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip...
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="latest-news-grid small-grid">
                            <div class="news-img">
                                <a href="#"><img src="{{asset('assets')}}/images/latest-news/4.jpg" alt="News Image"></a>
                            </div>
                            <div class="news-info">
                                <div class="news-date">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <span>March 14, 2024</span>
                                </div>
                                <h3 class="news-title">
                                    <a href="#">Ground Round Meatball Starts Right Here</a>
                                </h3>
                                <div class="news-desc mt-10">The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="title-style mb-50 md-mb-30">
                    <h2 class="margin-0 uppercase">Coaches Rate</h2>
                    <span class="line-bg left-line y-b pt-10"></span>
                </div>
                <div class="rs-pointtable no-overflow gaps bg3 bdru-4 mb-48 md-mb-72">
                    <table>
                        <tbody>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Rate</th>

                            </tr>

                            @foreach ($trainers as $key => $trainer)

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$trainer->name}}</td>
                                <td>{{$trainer->average_rating}}</td>
                            </tr>
                                
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Latest News Section End -->

<!-- About Us Section Start -->
<div class="rs-about bg4 pt-92 pb-78 md-pt-72 md-pb-58">
    <div class="container">
        <div class="row rs-vertical-middle">
            <div class="col-lg-5 md-mb-30">
                <div class="contant-part">
                    <div class="title-style mb-50 md-mb-30">
                        <h2 class="margin-0 uppercase white-color">A little bit about us</h2>
                        <span class="line-bg left-line y-w pt-10"></span>
                    </div>
                    <div class="description dark-gray-color">
                        <p class="mb-3">At Mile End Training Sessions, we're passionate about football and dedicated to helping players of all levels unlock their full potential. Our platform is the ultimate destination for anyone looking to elevate their game, offering a seamless and user-friendly experience for booking and participating in top-tier football training sessions.</p>
                        <p class="margin-0">Learn from the best! Our coaches are seasoned professionals with years of experience both on and off the field. They're not just trainers; they're mentors who are committed to nurturing your talent and helping you achieve your football aspirations.</p>
                    </div>
                    <div class="read-btn mt-39">
                        <a class="readon" href="#">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 margin-0 pl-40 col-padding-md">
                <div class="image-part">
                    <img src="{{asset('assets')}}/images/about/about-home.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us Section End -->

<!-- Team Pyaler Section Start -->
<div class="rs-team style1 nav-style pt-92 pb-100 md-pt-72 md-pb-80">
    <div class="container">
        <div class="title-style text-center mb-50 md-mb-30">
            <h2 class="margin-0 uppercase">Success Stories</h2>
            <span class="line-bg y-b pt-10"></span>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-autoplay-timeout="8000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true" data-md-device-dots="false">
            <div class="player-item">
                <div class="player-img">
                    <img src="{{asset('assets')}}/images/team/1.jpg" alt="">
                </div>
                <div class="detail-wrap">
                    <div class="person-details">
                        <h3 class="player-title"><span class="squad-numbers">18</span>
                            <a href="team-single.html">Semus Jemkro</a>
                            <span class="player-position">Forward</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="player-item">
                <div class="player-img">
                    <img src="{{asset('assets')}}/images/team/2.jpg" alt="">
                </div>
                <div class="detail-wrap">
                    <div class="person-details">
                        <h3 class="player-title"><span class="squad-numbers">03</span>
                            <a href="team-single.html">Venose Ferdon</a>
                            <span class="player-position">Midfielder</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="player-item">
                <div class="player-img">
                    <img src="{{asset('assets')}}/images/team/3.jpg" alt="">
                </div>
                <div class="detail-wrap">
                    <div class="person-details">
                        <h3 class="player-title"><span class="squad-numbers">11</span>
                            <a href="team-single.html">Debasti Nikor</a>
                            <span class="player-position">Defender</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="player-item">
                <div class="player-img">
                    <img src="{{asset('assets')}}/images/team/4.jpg" alt="">
                </div>
                <div class="detail-wrap">
                    <div class="person-details">
                        <h3 class="player-title"><span class="squad-numbers">10</span>
                            <a href="team-single.html">Sebasti Nikola</a>
                            <span class="player-position">striker</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="player-item">
                <div class="player-img">
                    <img src="{{asset('assets')}}/images/team/5.jpg" alt="">
                </div>
                <div class="detail-wrap">
                    <div class="person-details">
                        <h3 class="player-title"><span class="squad-numbers">06</span>
                            <a href="team-single.html">Ores Luperto</a>
                            <span class="player-position">Forward</span>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="player-item">
                <div class="player-img">
                    <img src="{{asset('assets')}}/images/team/6.jpg" alt="">
                </div>
                <div class="detail-wrap">
                    <div class="person-details">
                        <h3 class="player-title"><span class="squad-numbers">15</span>
                            <a href="team-single.html">Jores Leperto</a>
                            <span class="player-position">Defender</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team Pyaler Section End -->

<!-- Counter Section Start -->
<div class="rs-counter bg5 style1 pt-103 pb-92 md-pt-80 md-pb-70 sm-pt-73">
    <div class="container">
        <div class="rs-count">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 md-mb-30">
                    <div class="rs-counter-list text-center">
                        <h2 class="counter-number primary-color">350</h2>
                        <h3 class="counter-text uppercase white-color">Total matches</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-6 md-mb-30">
                    <div class="rs-counter-list text-center">
                        <h2 class="counter-number primary-color">25</h2>
                        <h3 class="counter-text uppercase white-color">Total trainers</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="rs-counter-list text-center">
                        <h2 class="counter-number primary-color">95</h2>
                        <h3 class="counter-text uppercase white-color">Total players</h3>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="rs-counter-list text-center">
                        <h2 class="counter-number primary-color">26</h2>
                        <h3 class="counter-text uppercase white-color">Total awards</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Section End -->

<!-- Match Gallery Start -->
<div class="rs-gallery style1 pt-92 pb-100 md-pt-72 md-pb-80">
    <div class="container">
        <div class="title-style text-center mb-50 md-mb-30">
            <h2 class="margin-0 uppercase"> Gallery</h2>
            <span class="line-bg y-b pt-10"></span>
        </div>
        <div class="row pl-15 pr-15">
            <div class="col-lg-4 col-md-6 padding-0 sm-mb-30">
                <div class="gallery-grid">
                    <img src="{{asset('assets')}}/images/gallery/1.jpg" alt="Gallery Image">
                    <a class="image-popup view-btn" href="{{asset('assets')}}/images/gallery/1.jpg">
                        <i class="flaticon-add-circular-button"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 padding-0 sm-mb-30">
                <div class="gallery-grid">
                    <img src="{{asset('assets')}}/images/gallery/2.jpg" alt="Gallery Image">
                    <a class="image-popup view-btn" href="{{asset('assets')}}/images/gallery/2.jpg">
                        <i class="flaticon-add-circular-button"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 padding-0 sm-mb-30">
                <div class="gallery-grid">
                    <img src="{{asset('assets')}}/images/gallery/3.jpg" alt="Gallery Image">
                    <a class="image-popup view-btn" href="{{asset('assets')}}/images/gallery/3.jpg">
                        <i class="flaticon-add-circular-button"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 padding-0 sm-mb-30">
                <div class="gallery-grid">
                    <img src="{{asset('assets')}}/images/gallery/4.jpg" alt="Gallery Image">
                    <a class="image-popup view-btn" href="{{asset('assets')}}/images/gallery/4.jpg">
                        <i class="flaticon-add-circular-button"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 padding-0 sm-mb-30">
                <div class="gallery-grid">
                    <img src="{{asset('assets')}}/images/gallery/5.jpg" alt="Gallery Image">
                    <a class="image-popup view-btn" href="{{asset('assets')}}/images/gallery/5.jpg">
                        <i class="flaticon-add-circular-button"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 padding-0">
                <div class="gallery-grid">
                    <img src="{{asset('assets')}}/images/gallery/6.jpg" alt="Gallery Image">
                    <a class="image-popup view-btn" href="{{asset('assets')}}/images/gallery/6.jpg">
                        <i class="flaticon-add-circular-button"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Match Gallery End -->

<!-- Champion Awards Start -->
<div class="rs-awards bg6 pt-92 pb-100 md-pt-72 md-pb-80">
    <div class="container">
        <div class="title-style text-center mb-50 md-mb-30">
            <h2 class="margin-0 uppercase white-color">Champion Awards</h2>
            <span class="line-bg y-w pt-10"></span>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="8000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="4" data-md-device-nav="false" data-md-device-dots="false">
            <div class="item">
                <div class="award-wrap">
                    <div class="champion-logo">
                        <img src="{{asset('assets')}}/images/award/1.png" alt="">
                    </div>
                    <div class="champion-details">
                        <div class="year-details">
                            <h3>UEFA Champions League</h3>
                        </div>
                        <div class="champion-no">05</div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="award-wrap">
                    <div class="champion-logo">
                        <img src="{{asset('assets')}}/images/award/2.png" alt="">
                    </div>
                    <div class="champion-details">
                        <div class="year-details">
                            <h3>UEFA Europa League</h3>
                        </div>
                        <div class="champion-no">07</div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="award-wrap">
                    <div class="champion-logo">
                        <img src="{{asset('assets')}}/images/award/3.png" alt="">
                    </div>
                    <div class="champion-details">
                        <div class="year-details">
                            <h3>UEFA Super Cup</h3>
                        </div>
                        <div class="champion-no">06</div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="award-wrap">
                    <div class="champion-logo">
                        <img src="{{asset('assets')}}/images/award/4.png" alt="">
                    </div>
                    <div class="champion-details">
                        <div class="year-details">
                            <h3>FIFA Club World Cup</h3>
                        </div>
                        <div class="champion-no">03</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Champion Awards End -->

<!-- Top Products Start -->
<div class="rs-products nav-style pt-92 md-pt-72">
    <div class="container">

        <!-- Subscribe Section Start -->
        <!-- <div class="rs-subscribe bg7">
            <form class="subscribe-form">
                <div class="row rs-vertical-middle">
                    <div class="col-lg-6 col-md-12 md-mb-30">
                        <div class="title-part">
                            <h2 class="title white-color"> Subscribe Our Newsletter</h2>
                            <p class="desc margin-0 white-color"> Subscribe to our newsletter for getting regular updates.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="subscribe-form-fields">
                            <input type="submit" class="news-submit" value="Subscribe">
                            <input type="email" class="news-email" name="EMAIL" placeholder="EMAIL ADDRESS" required="">
                        </div>
                    </div>
                </div>
            </form>
        </div> -->
        <!-- Subscribe Section End -->
    </div>
</div>
<!-- Top Products End -->
@endsection