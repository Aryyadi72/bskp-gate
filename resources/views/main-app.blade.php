@extends('layouts.main')
@section('content')
    <div class="main">
        <section class="module bg-dark-60 gallery-page-header parallax-bg"
            data-background="{{ asset('assets/images/DJI_0555-scaled-3.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt">Gallery</h2>
                        <div class="module-subtitle font-serif">
                            A wonderful serenity has taken possession of my entire soul,
                            like these sweet mornings of spring which I enjoy with my
                            whole heart.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="module">
            <div class="container">
                <div class="row multi-columns-row">
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a class="gallery" href="{{ asset('assets/images/bridgestone.jpg') }}"
                                    title="Attendance Managenent"><img src="{{ asset('assets/images/bridgestone.jpg') }}"
                                        alt="Gallery Image 1" />
                                    <div class="gallery-caption">
                                        <div class="gallery-icon">
                                            <span class="icon-magnifying-glass"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a class="gallery" href="{{ asset('assets/images/bridgestone.jpg') }}"
                                    title="BSKP Salary"><img src="{{ asset('assets/images/bridgestone.jpg') }}"
                                        alt="Gallery Image 1" />
                                    <div class="gallery-caption">
                                        <div class="gallery-icon">
                                            <span class="icon-magnifying-glass"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a class="gallery" href="{{ asset('assets/images/bridgestone.jpg') }}" title="BSKP MCU"><img
                                        src="{{ asset('assets/images/bridgestone.jpg') }}" alt="Gallery Image 1" />
                                    <div class="gallery-caption">
                                        <div class="gallery-icon">
                                            <span class="icon-magnifying-glass"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a class="gallery" href="{{ asset('assets/images/bridgestone.jpg') }}" title="BSKP KPI"><img
                                        src="{{ asset('assets/images/bridgestone.jpg') }}" alt="Gallery Image 1" />
                                    <div class="gallery-caption">
                                        <div class="gallery-icon">
                                            <span class="icon-magnifying-glass"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a class="gallery" href="{{ asset('assets/images/bridgestone.jpg') }}" title="Title 1"><img
                                        src="{{ asset('assets/images/bridgestone.jpg') }}" alt="Gallery Image 1" />
                                    <div class="gallery-caption">
                                        <div class="gallery-icon">
                                            <span class="icon-magnifying-glass"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a class="gallery" href="{{ asset('assets/images/bridgestone.jpg') }}" title="Title 1"><img
                                        src="{{ asset('assets/images/bridgestone.jpg') }}" alt="Gallery Image 1" />
                                    <div class="gallery-caption">
                                        <div class="gallery-icon">
                                            <span class="icon-magnifying-glass"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a class="gallery" href="{{ asset('assets/images/bridgestone.jpg') }}" title="Title 1"><img
                                        src="{{ asset('assets/images/bridgestone.jpg') }}" alt="Gallery Image 1" />
                                    <div class="gallery-caption">
                                        <div class="gallery-icon">
                                            <span class="icon-magnifying-glass"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <a class="gallery" href="{{ asset('assets/images/bridgestone.jpg') }}" title="Title 1"><img
                                        src="{{ asset('assets/images/bridgestone.jpg') }}" alt="Gallery Image 1" />
                                    <div class="gallery-caption">
                                        <div class="gallery-icon">
                                            <span class="icon-magnifying-glass"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="module-small bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">About Titan</h5>
                            <p>
                                The languages only differ in their grammar, their
                                pronunciation and their most common words.
                            </p>
                            <p>Phone: +1 234 567 89 10</p>
                            Fax: +1 234 567 89 10
                            <p>Email:<a href="#">somecompany@example.com</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">Recent Comments</h5>
                            <ul class="icon-list">
                                <li>Maria on <a href="#">Designer Desk Essentials</a></li>
                                <li>
                                    John on <a href="#">Realistic Business Card Mockup</a>
                                </li>
                                <li>Andy on <a href="#">Eco bag Mockup</a></li>
                                <li>Jack on <a href="#">Bottle Mockup</a></li>
                                <li>Mark on <a href="#">Our trip to the Alps</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">Blog Categories</h5>
                            <ul class="icon-list">
                                <li><a href="#">Photography - 7</a></li>
                                <li><a href="#">Web Design - 3</a></li>
                                <li><a href="#">Illustration - 12</a></li>
                                <li><a href="#">Marketing - 1</a></li>
                                <li><a href="#">Wordpress - 16</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">Popular Posts</h5>
                            <ul class="widget-posts">
                                <li class="clearfix">
                                    <div class="widget-posts-image">
                                        <a href="#"><img src="{{ asset('assets/images/rp-1.jpg') }}"
                                                alt="Post Thumbnail" /></a>
                                    </div>
                                    <div class="widget-posts-body">
                                        <div class="widget-posts-title">
                                            <a href="#">Designer Desk Essentials</a>
                                        </div>
                                        <div class="widget-posts-meta">23 january</div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="widget-posts-image">
                                        <a href="#"><img src="{{ asset('assets/images/rp-2.jpg') }}"
                                                alt="Post Thumbnail" /></a>
                                    </div>
                                    <div class="widget-posts-body">
                                        <div class="widget-posts-title">
                                            <a href="#">Realistic Business Card Mockup</a>
                                        </div>
                                        <div class="widget-posts-meta">15 February</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="divider-d" />
        <footer class="footer bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="copyright font-alt">
                            &copy; 2017&nbsp;<a href="index.html">TitaN</a>, All Rights
                            Reserved
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <div class="footer-social-links">
                            <a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i
                                    class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a
                                href="#"><i class="fa fa-skype"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
