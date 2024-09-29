@extends('layouts.main')
@section('content')
    <section class="home-section home-parallax home-fade home-full-height" id="home">
        <div class="hero-slider">
            <ul class="slides">
                <li class="bg-dark-30 bg-dark" style="background-image: url(assets/images/DJI_0555-scaled.jpg)">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-30 titan-title-size-1">
                                Hello &amp; welcome
                            </div>
                            <div class="font-alt mb-40 titan-title-size-4">
                                We are Titan
                            </div>
                            <a class="section-scroll btn btn-border-w btn-round" href="{{ route('auth') }}">Sign
                                In</a>
                        </div>
                    </div>
                </li>
                <li class="bg-dark-30
                                bg-dark"
                    style="background-image: url(assets/images/DJI_0555-scaled-2.jpg)">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-30 titan-title-size-2">
                                Titan is creative multipurpose html template for<br />web
                                developers who change the world
                            </div>
                            <a class="btn btn-border-w btn-round" href="{{ route('auth') }}">Sign In</a>
                        </div>
                    </div>
                </li>
                <li class="bg-dark-30
                                            bg-dark"
                    style="background-image: url(assets/images/DJI_0555-scaled-3.jpg)">
                    <div class="titan-caption">
                        <div class="caption-content">
                            <div class="font-alt mb-30 titan-title-size-1">
                                We build brands that build business
                            </div>
                            <div class="font-alt mb-40 titan-title-size-3">
                                We are Amazing
                            </div>
                            <a class="section-scroll btn btn-border-w btn-round" href="{{ route('auth') }}">Sign
                                In</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection
