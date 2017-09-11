﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CV - jQuery2DotNet (Bootstrap Resume Template)</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <!-- Bootstrap core CSS -->
    <!-- Font Awesome CSS -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles CSS -->
    <link href="{{ asset('assets/css/custom-style.css') }}" rel="stylesheet" />
    <!-- Animate css -->
    <link href="{{ asset('WOW/css/animate.css') }}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.min.js"></script>
      <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Start Wrapper -->
    <div id="wrapper">
        <!-- Start container -->
        <div class="container">
            <!-- Start About me section -->
            <div class="row">
                <div class="col-sm-3 col-md-2 text-center">
                    <!-- Avatar Image -->
                    <img src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-1/p160x160/20881905_1391647100888385_369367395173275653_n.jpg?oh=27b6911004180aa1601a1a49459d3190&oe=5A1715C9" alt="avatar" class="img-responsive img-profile thumbnail">
                    <!-- Download and Print button -->
                    <ul class="list-unstyled">
                        <li><a href="javascript:void(0)" class="btn btn-download btn-inverse btn-sm hidden-print" role="button"><i class="fa fa-download"></i>&nbsp;Download CV</a></li>
                        <li><a href="javascript:window.print()" class="btn btn-print btn-inverse btn-sm hidden-print" role="button"><i class="fa fa-print"></i>&nbsp;Print CV</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-md-7">
                    <div class="mini-desc">
                        <!-- Name and Profesion -->
                        <h1 class="title animated">{{ $iduser }}<small class="text-muted display-block-sm"> Front-end web developer</small></h1>
                        <!-- Profile -->
                        <p>Hi my name is Matthew Dunn, I love programming just for fun, or for creating something cool, or for making my life easier by using my knowledge to automate things (like sorting photos in a certain way) that for non-programmers mean tedious manual work.</p>
                        <blockquote>
                            <p><i class="fa fa-quote-left"></i>&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <!-- Start Contact -->
                    <div class="contact">
                        <h2 class="sub-title"><i class="fa fa-slack"></i>CONTACT</h2>
                        <ul class="list-unstyled contact-list">
                            <li><i class="fa fa-mobile"></i><span class="pull-right">{{ $infomation->phone }}</span></li>
                            <li><i class="fa fa-envelope"></i><span class="pull-right">{{ $infomation->mail }}</span></li>
                            <li><i class="fa fa-skype"></i><span class="pull-right">{{ $infomation->skype}}</span></li>
                            <li><i class="fa fa-globe"></i><span class="pull-right"><a href="javascript:void(0)">www.jquery2DotNet.com</a></span></li>
                        </ul>
                    </div>
                    <!-- End Contact -->
                </div>
            </div>
            <!-- End About me section -->
            <hr />
            <div class="row">
                <div class="col-md-6">
                    <!-- Start Work Experience -->
                    <h2 class="sub-title"><i class="fa fa-slack"></i>WORK EXPERIENCE</h2>
                    <ul class="timeline">
                        @if(count($experiences) > 0)
                            @foreach( $experiences as $experience)
                                <li>
                                    <div class="timeline-badge mid-night">{{ $experience->year }}</div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{ $experience->position }}</h4>
                                            <p><small class="text-muted">{{ $experience->company }}</small></p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{ $experience->content }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        
                        
                    </ul>
                    <!-- End Work Experience -->

                    <!-- Start Education -->
                    <h2 class="sub-title"><i class="fa fa-slack"></i>EDUCATION</h2>
                    <ul class="timeline">
                        @if(count($educations) > 0)
                            @foreach($educations as $education)
                                <li>
                                    <div class="timeline-badge mid-night">{{ $education->year }}</div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{ $education->major }}</h4>
                                            <p><small class="text-muted">{{ $education->school }}</small></p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{ $education->content }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        
                    </ul>
                    <!-- End Education -->
                </div>

                <div class="col-md-6">
                    <!-- Start Skills -->
                    <div class="row">
                        <div class="col-md-12">

                            <h2 class="sub-title"><i class="fa fa-bars"></i>SKILLS</h2>
                            <div>
                                @if(count($skills) > 0)
                                    @foreach($skills as $skill)
                                         <div class="progress">
                                            <div class="progress-bar progress-bar-green-sea" role="progressbar" aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100">
                                                <span> {{ $skill->name }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                               
                        </div>
                    </div>
                    <!-- End Skills -->

                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <!-- Start Languages -->
                            <h2 class="sub-title"><i class="fa fa-language"></i>LANGUAGES</h2>
                            <div class="languages">
                                <div>
                                    English
                            <div class="icons pull-right">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                                </div>
                                <div>
                                    French
                            <div class="icons pull-right">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                            </div>
                                </div>
                                <div>
                                    Spanish
                            <div class="icons pull-right">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                            </div>
                                </div>
                                <div>
                                    German
                            <div class="icons pull-right">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                            </div>
                                </div>
                            </div>
                            <!-- End Languages -->
                        </div>
                        <div class="col-sm-6 col-md-12">
                            <!-- Start Published -->
                            <h2 class="sub-title"><i class="fa fa-file"></i>PUBLISHED</h2>
                            <div class="published">
                                <div>
                                    Lorem Ipsum available, Magazine
                            <div class="icons pull-right">
                                15 Dec 2014
                            </div>
                                </div>
                                <div>
                                    Lorem Ipsum available, Magazine
                            <div class="icons pull-right">
                                14 Dec 2014
                            </div>
                                </div>
                                <div>
                                    Lorem Ipsum available, Magazine
                            <div class="icons pull-right">
                                13 Dec 2014
                            </div>
                                </div>
                            </div>
                            <!-- End Published -->
                        </div>
                    </div>

                    <!-- Start Personal Information -->
                    <h2 class="sub-title"><i class="fa fa-slack"></i>PERSONAL INFORMATION</h2>
                    <div>
                        <ul class="list-unstyled">
                            <li>Birthday<span class="pull-right">{{ $infomation->birthday }}</span></li>
                            <li>Address<span class="pull-right">{{ $infomation->address }}</span></li>
                        </ul>
                    </div>
                    <!-- End Personal Information -->

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <!-- Start Follow Me -->
                            <h2 class="sub-title"><i class="fa fa-angle-double-right"></i>SOCIAL PROFILES</h2>
                            <div class="follow">
                                <ul class="list-inline">
                                    <li><a href="javascript:void(0)"><i data-toggle="tooltip" title="Twitter" class="fa fa-twitter-square fa-2x"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-toggle="tooltip" title="Facebook" class="fa fa-facebook-square fa-2x"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-toggle="tooltip" title="Google plus" class="fa fa-google-plus-square fa-2x"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-toggle="tooltip" title="Linkedin" class="fa fa-linkedin-square fa-2x"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-toggle="tooltip" title="Pinterest" class="fa fa-pinterest-square fa-2x"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-toggle="tooltip" title="Instagram" class="fa fa-instagram fa-2x"></i></a></li>
                                </ul>
                            </div>
                            <!-- End Follow Me -->

                        </div>
                        <div class="col-sm-6 col-md-6">
                            <!-- Start Hobbies -->
                            <h2 class="sub-title"><i class="fa fa-slack"></i>HOBBIES</h2>
                            <div class="hobbies">
                                <span class="badge">Photography</span><span class="badge">Programming</span><span class="badge">Watching movie</span>
                            </div>
                            <!-- End Hobbies -->
                        </div>
                    </div>

                    <!-- Start Testimonial -->
                    <h2 class="sub-title"><i class="fa fa-slack"></i>Testimonial</h2>
                    <div class="testimonial">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#quote-carousel" data-slide-to="1"></li>
                                <li data-target="#quote-carousel" data-slide-to="2"></li>
                            </ol>
                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner">
                                <!-- Quote 1 -->
                                <div class="item active">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-3 text-center">
                                                <img class="img-circle" src="assets/images/1.jpg" alt="" />
                                            </div>
                                            <div class="col-sm-9">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                                <small>Someone famous</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 2 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-3 text-center">
                                                <img class="img-circle" src="assets/images/2.jpg" alt="" />
                                            </div>
                                            <div class="col-sm-9">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                                <small>Someone famous</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <!-- Quote 3 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-3 text-center">
                                                <img class="img-circle" src="assets/images/3.jpg" alt="" />
                                            </div>
                                            <div class="col-sm-9">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                                                <small>Someone famous</small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            </div>
                            <!-- Carousel Buttons Next/Prev -->
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control hidden-print"><i class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control hidden-print"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- End Testimonial -->

                    <!-- Start Awards -->
                    <h2 class="sub-title"><i class="fa fa-trophy"></i>AWARDS</h2>
                    <div class="awards">
                        <ul class="list-unstyled">
                            <li>AB Challenge <span class="pull-right">2013</span></li>
                            <li>Design Challenge<span class="pull-right">2014</span></li>
                        </ul>
                    </div>
                    <!-- End Awards -->

                </div>
            </div>

            <!-- Start Portfolio -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="sub-title"><i class="fa fa-slack"></i>Portfolio</h2>
                    <ul id="filters" class="clearfix">
                        <li><span class="filter active" data-filter="app card icon logo web">All</span></li>
                        <li><span class="filter" data-filter="app">App</span></li>
                        <li><span class="filter" data-filter="card">Card</span></li>
                        <li><span class="filter" data-filter="icon">Icon</span></li>
                        <li><span class="filter" data-filter="logo">Logo</span></li>
                        <li><span class="filter" data-filter="web">Web</span></li>
                    </ul>

                    <div id="portfoliolist">

                        <div class="portfolio logo" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/logo/5.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Bird Document</a>
                                        <span class="text-category">Logo</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio app" data-cat="app">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/app/1.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Visual Infography</a>
                                        <span class="text-category">APP</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio web" data-cat="web">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/web/4.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Sonor's Design</a>
                                        <span class="text-category">Web design</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio card" data-cat="card">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/card/1.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Typography Company</a>
                                        <span class="text-category">Business card</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio app" data-cat="app">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/app/3.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Weatherette</a>
                                        <span class="text-category">APP</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio card" data-cat="card">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/card/4.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">BMF</a>
                                        <span class="text-category">Business card</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio card" data-cat="card">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/card/5.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Techlion</a>
                                        <span class="text-category">Business card</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio logo" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/logo/1.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">KittyPic</a>
                                        <span class="text-category">Logo</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio app" data-cat="app">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/app/2.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Graph Plotting</a>
                                        <span class="text-category">APP</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio card" data-cat="card">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/card/2.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">QR Quick Response</a>
                                        <span class="text-category">Business card</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio logo" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/logo/6.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Mobi Sock</a>
                                        <span class="text-category">Logo</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio logo" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/logo/7.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Village Community Church</a>
                                        <span class="text-category">Logo</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio icon" data-cat="icon">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/icon/4.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Domino's Pizza</a>
                                        <span class="text-category">Icon</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio web" data-cat="web">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/web/3.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Backend Admin</a>
                                        <span class="text-category">Web design</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio icon" data-cat="icon">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/icon/1.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Instagram</a>
                                        <span class="text-category">Icon</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio web" data-cat="web">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/web/2.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Student Guide</a>
                                        <span class="text-category">Web design</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio icon" data-cat="icon">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/icon/2.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Scoccer</a>
                                        <span class="text-category">Icon</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio icon" data-cat="icon">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/icon/5.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">3D Map</a>
                                        <span class="text-category">Icon</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio web" data-cat="web">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/web/1.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Note</a>
                                        <span class="text-category">Web design</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio logo" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/logo/3.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Native Designers</a>
                                        <span class="text-category">Logo</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio logo" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/logo/4.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Bookworm</a>
                                        <span class="text-category">Logo</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio icon" data-cat="icon">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/icon/3.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Sandwich</a>
                                        <span class="text-category">Icon</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio card" data-cat="card">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/card/3.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Reality</a>
                                        <span class="text-category">Business card</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="portfolio logo" data-cat="logo">
                            <div class="portfolio-wrapper">
                                <img src="portfolio/img/portfolios/logo/2.jpg" alt="" />
                                <div class="label">
                                    <div class="label-text">
                                        <a class="text-title">Speciallisterne</a>
                                        <span class="text-category">Logo</span>
                                    </div>
                                    <div class="label-bg"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- End Portfolio -->

            <!-- Start Services -->
            <div class="row services">
                <div class="col-md-12 service-container">
                    <div class="col-md-12">
                        <h2 class="sub-title"><i class="fa fa-slack"></i>Services</h2>
                        <div class="col-sm-4 col-md-4 text-center">
                            <h3>Web Design</h3>
                            <div class="service-icon">
                                <i class="fa fa-file-photo-o"></i>
                            </div>
                            <div class="service-description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.</div>
                        </div>
                        <div class="col-sm-4 col-md-4 text-center">
                            <h3>Graphic Design</h3>
                            <div class="service-icon">
                                <i class="fa fa-paint-brush"></i>
                            </div>
                            <div class="service-description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.</div>
                        </div>
                        <div class="col-sm-4 col-md-4 text-center">
                            <h3>Internet Marketing</h3>
                            <div class="service-icon">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <div class="service-description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Services -->

            <!-- Start Quick Contact -->
            <div class="row quick-contacts">
                <div class="col-md-12">
                    <h2 class="sub-title"><i class="fa fa-slack"></i>Quick contact</h2>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="quick-contact"><i class="fa fa-envelope-o"></i>example@email.com</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="quick-contact"><i class="fa fa-mobile"></i>+1 (000) 900-00-00</div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="quick-contact"><i class="fa fa-skype"></i>skype.cv</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Quick Contact -->

            <!-- Start Footer -->
            <div class="row">
                <footer class="footer">
                    <p>Copyright 2015 The Develovers. All Rights Reserved.</p>
                </footer>
            </div>
            <!-- End Footer -->
        </div>

        <!-- End container -->
    </div>
    <!-- End Wrapper -->

    <!-- Javascript files -->
    
    <!-- WOW JS -->
    <script src="{{ asset('WOW/js/wow.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('assets/js/custom-script.js') }}"></script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-46102911-5', 'auto');
        ga('send', 'pageview');
</script>
</body>
</html>
