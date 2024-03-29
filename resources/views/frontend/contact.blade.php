@extends('frontend.layouts.main') @push('title') Contact @endpush
@push('contact-active') active @endpush @push('scripts')
<meta name="description" content="Contact info of {{ website()->site_name }}" />
<link rel="canonical" href="{{ route('contact') }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="Contact" />
<meta property="og:title" content="Contact - {{ website()->site_name }}" />
<meta property="og:description" content="Contact info of {{ website()->site_name }}" />
<meta property="og:url" content="{{ route('privacy_policy') }}" />
<meta property="og:site_name" content="{{ website()->site_name }}" />
<meta property="og:image" content="{{ url('/') . '/img/trex-01.png' }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Contact - {{ website()->site_name }}" />
<meta name="twitter:description" content="Contact info of {{ website()->site_name }}" />
<meta name="twitter:image" content="{{ url('/') . '/img/trex-01.png' }}" />
<meta name="description" content="Contact info of {{ website()->site_name }}" />
@endpush @section('content') @include('frontend.layouts.navbar')

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ website()->site_name }}">Home</a>
            </li>
            <li class="breadcrumb-item">Contact</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Start -->
<div class="contact bg_theme">
    <div class="container">
        @if (session('message'))
        <div class="alert alert-success px-3">
            {{ session("message") }}
        </div>
        @endif
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="form">
                    <form method="POST" action="{{ route('contact_create') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="6" cols="3" placeholder="Message"
                              style="height: 255px"></textarea>
                        </div>
                        <div>
                            <button class="btn-grad" type="submit">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="map">
                    <iframe
                      src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Chapainawabganj%20Polytechnic%20Institute,%20Baroghoriya,%206300+(Chapainawabganj%20Polytechnic%20Institute)&amp;t=k&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                      height="600" frameborder="0" tyle="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-widget">
                    <h3 class="title">Get in Touch</h3>
                    <div class="contact-info">
                        <h4>
                            <i class="fa fa-map-marker"></i>Baroghoria,
                            Chapainawabganj, Bangladesh
                        </h4>
                        <h4>
                            <i class="fa fa-envelope"></i><a href="mailto:chapaipoly@gmail.com" class="text-dark"
                              target="_blank">chapaipoly@gmail.com</a>
                        </h4>
                        <h4><i class="fa fa-phone"></i>+8801724-441634</h4>
                        <div class="social">
                            <a href="#"><i class="fab fa-twitter mt-1"></i></a>
                            <a href="#"><i class="fab fa-facebook mt-1"></i></a>
                            <a href="#"><i class="fab fa-linkedin mt-1"></i></a>
                            <a href="#"><i class="fab fa-instagram mt-1"></i></a>
                            <a href="#"><i class="fab fa-youtube mt-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@include('frontend.layouts.footer') @endsection