<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>BABA CASHIER</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('arsip/admin/images/welogo.png')}}" type="image/png">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{asset('arsip/landingPage/css/animate.css')}}">
        
    <!--====== lineicons CSS ======-->
    <link rel="stylesheet" href="{{asset('arsip/landingPage/css/lineicons.css')}}">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('arsip/landingPage/css/bootstrap.min.css')}}">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('arsip/landingPage/css/default.css')}}">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('arsip/landingPage/css/style.css')}}">
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
    
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="d-flex navbar-brand" href="index.html">
                                <img src="{{asset('arsip/admin/images/welogo.png')}}"alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#tentang">Tentang</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#footer">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll war-btn" data-wow-duration="1.3s" data-wow-delay="0.8s" href="{{route('login')}}">Login</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover d-lg-flex align-items-center">
            
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
            <div class="shape shape-5"></div>
            <div class="shape shape-6"></div>
            
            <div class="container">
                <div class="row align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-lg-6 col-md-10">
                        <div class="header-hero-content">
                            <h3 class="header-title wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.2s"><span>Selamat Datang di</span><br> BaBa Kasir</h3>
                            <p class="text wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.6s">Dimana segalanya lebih mudah, lebih cepat, dan lebih efisien!</p>
                            <ul class="d-flex">
                                <li><a href="https://rebrand.ly/appland-ud" rel="nofollow" class="main-btn wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.8s">Mulai Sekarang</a></li>
                            </ul>
                        </div> <!-- header hero content -->
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6 col-10">
                        <div class="header-image">
                            <img src="{{asset('arsip/landingPage/images/kasir.png')}}" alt="app" class="image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                            <div class="image-shape wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                                <img src="{{asset('arsip/landingPage/images/image-shape.svg')}}" alt="shape">
                            </div>
                        </div> <!-- header image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape-1"></div> <!-- header shape -->
            <div class="header-shape-2">
                <img src="{{asset('arsip/landingPage/images/header-shape-2.svg')}}" alt="shape">
            </div> <!-- header shape -->
        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->
    
    <!--====== SERVICES PART START ======-->
    
    <section id="tentang" class="services-area pt-110 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Apa itu Kasir BABA ?</h3>
                        <p class="text">Website Kasir BABA adalah solusi inovatif yang dirancang untuk membantu pengelola bisnis, terutama usaha kecil dan menengah, dalam mengelola transaksi dan inventaris mereka dengan lebih efisien.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row" id="features">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-1 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Clean Design</a></h4>
                            <p class="text">Desain yang jelas membantu pengguna untuk dengan mudah melihat dan mengakses informasi yang diperlukan tanpa kebingungan.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-2 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.4s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layout"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Easy to Use</a></h4>
                            <p class="text"> Antarmuka pengguna yang intuitif membuat pengguna dapat dengan cepat mengeksploitasi fitur-fitur aplikasi.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-3 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.6s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-bolt"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">Fast Loading</a></h4>
                            <p class="text">Halaman dan data akan dimuat dengan cepat, sehingga pengguna tidak perlu menunggu lama saat mengakses informasi atau menjalankan fungsi-fungsi penting.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-4 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="#">All Elements</a></h4>
                            <p class="text"> Ini mencakup manajemen inventaris, pencatatan penjualan, analisis keuangan, serta manajemen data pelanggan dalam satu paket terintegrasi.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== SERVICES PART ENDS ======-->
    <!--====== PART START ======-->
    
    <footer id="footer" class="footer-area">
        
        <div class="footer-shape shape-1"></div>
        <div class="footer-shape shape-2"></div>
        <div class="footer-shape shape-3"></div>
        <div class="footer-shape shape-4"></div>
        <div class="footer-shape shape-5"></div>
        <div class="footer-shape shape-6"></div>
        <div class="footer-shape shape-7"></div>
        <div class="footer-shape shape-8">
            <img class="svg" src="{{asset('arsip/landingPage/images/footer-shape.svg')}}" alt="Shape">
        </div>
        
        <div class="footer-widget pt-30 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.2s">
                            <a class="logo" href="#" >
                                <img src="{{asset('arsip/admin/images/welogo.png')}}" alt="Logo">
                            </a>
                            <p class="text">Jangan ragu untuk menghubungi kami! Kami siap menjawab pertanyaan Anda, menerima masukan, atau memberikan bantuan apa pun yang Anda butuhkan. Kami ramah dan selalu siap membantu!</p>
                            <ul class="social">
                                <li><a href="#"><i class="lni lni-facebook"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter"></i></a></li>
                                <li><a href="#"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div> 
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link d-flex flex-wrap">
                            <div class="footer-link-wrapper mt-45 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Quick Links</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#home">Home</a></li>
                                    <li><a href="#tentang">Tentang</a></li>
                                    <li><a href="#features">Features</a></li>
                                    <li><a href="#footer">Contact</a></li>
                                    <li><a href="/login">Login</a></li>
                                </ul>
                            </div> <!-- footer link wrapper -->
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact mt-45 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Quick Link</h4>
                            </div>
                            <ul class="contact-list">
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><i class="lni lni-phone"></i> +6285604664184</p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><a href="#"><i class="lni lni-envelope"></i> seeyou6411@gmail.com</a></p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><a href="#"><i class="lni lni-world"></i> http://siswa.smkn6jember.net/RPL2_28</a></p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><i class="lni lni-map"></i> JL. PB. SUDIRMAN NO. 114 TANGGUL-JEMBER, Tanggul Kulon, Kec. Tanggul, Kab. Jember Prov. Jawa Timur Indonesia.</p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                            </ul> <!-- contact list -->
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-text text-center">
                                <p class="text">© 2023 HEWABUS. All rights reserved.
</p>
                            </div> <!-- copyright text -->
                            
                            <div class="copyright-privacy text-center">
                                <a href="#"></a>
                            </div> <!-- copyright privacy -->
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>
    
    <!--====== PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->
    
    <!--====== PART START ======-->
    
<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div> 
            </div>
        </div>
    </section>
-->
    
    <!--====== PART ENDS ======-->
    




    <!--====== Jquery js ======-->
    <script src="{{asset('arsip/landingPage/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('arsip/landingPage/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="{{asset('arsip/landingPage/js/popper.min.js')}}"></script>
    <script src="{{asset('arsip/landingPage/js/bootstrap.min.js')}}"></script>
    
    
    <!--====== WOW js ======-->
    <script src="{{asset('arsip/landingPage/js/wow.min.js')}}"></script>
    
    
    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('arsip/landingPage/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('arsip/landingPage/js/scrolling-nav.js')}}"></script>
    
    <!--====== Main js ======-->
    <script src="{{asset('arsip/landingPage/js/main.js')}}"></script>
    
</body>

</html>
