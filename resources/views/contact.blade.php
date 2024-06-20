@extends('layouts.app')

@section('content')

<!-- Breadcrumbs Section Start -->
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-wrap">
        <img src="{{asset('assets')}}/images/breadcrumbs/inner4.jpg" alt="Breadcrumbs Image">
        <div class="breadcrumbs-inner">
            <div class="container">
                <div class="breadcrumbs-text">
                    <h1 class="breadcrumbs-title mb-17">Contact</h1>
                    <div class="categories">
                        <ul>
                            <li><a href="{{route('home-main')}}">Home</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Section End -->

<!-- Contact Section Start -->
<div class="rs-contact">
    <!-- Contact Icon Start -->
    <div class="rs-contact-icon pt-100 pb-100 md-pb-80 md-pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 md-mb-30">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-phone"></i>
                        </div>
                        <div class="icon-text">
                            <h3 class="icon-title">Call Us</h3>
                            <a class="icon-info" href="tel:+123456789">123456789</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 md-mb-30">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-email"></i>
                        </div>
                        <div class="icon-text">
                            <h3 class="icon-title">Mail Us</h3>
                            <a class="icon-info" href="mailto:support@rstheme.com">support@rstheme.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 xs-mb-30">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-send"></i>
                        </div>
                        <div class="icon-text">
                            <h3 class="icon-title">Fax</h3>
                            <span>+3301-341-0476</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="single-icon text-center">
                        <div class="icon-part">
                            <i class="flaticon-location"></i>
                        </div>
                        <div class="icon-text after-none">
                            <h3 class="icon-title">Address</h3>
                            <span>Mile end,London, UK</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Icon End -->

    <!-- Contact Form And Map Start -->
    <div class="contact-part sec-bg pt-100 pb-100 md-pt-80 md-pb-80">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 pl-50 md-pl-15">
                    <div class="contact-area">
                        <div class="title-style mb-50">
                            <h2 class="margin-0 uppercase">Get in Touch</h2>
                            <span class="line-bg left-line pt-10 y-b"></span>
                        </div>
                        <div id="form-messages"></div>
                        <form id="contact-form" class="contact-form" method="post" action="https://rstheme.com/products/html/khelo/mailer.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="name" type="text" placeholder="Name" id="name" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="email" type="email" placeholder="E-Mail" id="email" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="number" type="text" placeholder="Phone Number" id="phone_number" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="subject" type="text" placeholder="Subject" id="subject" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="from-control">
                                <textarea name="message" placeholder="Your Message Here" id="message" required="required"></textarea>
                            </div>
                            <div class="submit-btn">
                                <button class="readon" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form And Map End -->



@endsection