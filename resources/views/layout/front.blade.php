<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{__('Chamadon Tour')}}</title>

    <!-- Open Graph tags -->
    <meta property="og:title" content="@yield('title') - {{__('CHAMADONTOUR')}}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:image" content="/assets/images/travel_logo.png" />
    <meta property="og:description" content="Chamadon Tour – sayohat dunyosiga sarguzashtingizni boshlash uchun ideal tanlov! Biz sizni eng go'zal va nafis joylarga olib boramiz. Agn Tour dunyoning turli burchaklariga, madaniyatlar bilan tanishish va yangi tajribalar orttirish imkoniyatini taqdim etadi. Bizning professional va mehribon jamoamiz har bir sayohatchiga shaxsiy yondashuvni ta'minlaydi va ularga unutilmas taassurotlar qoldirishni kafolatlaydi. Bizning sayohatlarimiz turli xil bo'lib, ular orasida ekskursiyalar, dam olish sayohatlari, ekoturizm, shahar turlari va boshqalar mavjud. Sayohatingizni Agn Tour bilan rejalashtiring va dunyoni yangicha ko'z bilan kashf eting!" />
    <meta property="og:site_name" content="AGN " />

    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/samiritravel/2.png">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/assets/font/flaticon.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/plugin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- 
<div id="preloader">
<div id="status"></div>
</div> -->

<header>
    <div class="upper-head clearfix" style="background-color: #ffd320;">
        <div class="container">
            <div class="contact-info">
                <p><i class="flaticon-phone-call"></i>@lang('Phone') +998-95-161-08-80</p>
                <p><i class="flaticon-mail"></i> @lang('Mail') <a href="mailto:samiratravel@mail.ru" style="color: white;"></a>samiratravel@mail.ru</p>
            </div>
            <div class="login-btn pull-right">
                <div class="row">
                    <a href="{{route('lang', ['locale'=>'uz'])}}" style="color: white;"><img class="" src="{{ asset('images/uz.png') }}" alt="" style="height:22px; width: 22px;"> Uz</a>
                    <a href="{{route('lang', ['locale'=>'ru'])}}" style="color: white;"><img class="" src="{{ asset('images/ru.png') }}" alt="" style="height:22px; width: 22px;"> Ru</a>
                    <a href="{{route('lang', ['locale'=>'en'])}}" style="color: white;"><img class="" src="{{ asset('images/eng.png') }}" alt="" style="height:22px; width: 22px;"> En</a>
                    <a href="{{route('login')}}" style="color: white;"><i class=""></i>@lang("Login")</a>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Header End -->

<!-- Navigation Start -->
<div class="navigation">
    <div class="container">
        <div class="navigation-content">
            <div class="header_menu">

                <nav class="navbar navbar-default navbar-sticky-function navbar-arrow">
                    <div class="logo pull-left">
                    <a href="/">
                <img alt="Image" src="/assets/images/samiritravel/1.png" height="60" style="object-fit: contain; width: 100%;"></a>
                    </div>
                    <div id="navbar" class="navbar-nav-wrapper">
    <ul class="nav navbar-nav" id="responsive-menu">
        <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
            <a href="{{ route('home') }}" 
               style="color: {{ Route::currentRouteName() == 'home' ? '#ffd320;' : '#000' }};"
               onmouseover="this.style.color='#ffd320'" 
               onmouseout="this.style.color='{{ Route::currentRouteName() == 'home' ? '#ffd320' : '#000' }}'">
               @lang('Home')
            </a>
        </li>
        <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
            <a href="{{ route('about') }}" 
               style="color: {{ Route::currentRouteName() == 'about' ? '#ffd320' : '#000' }};"
               onmouseover="this.style.color='#ffd320'" 
               onmouseout="this.style.color='{{ Route::currentRouteName() == 'about' ? '#ffd320' : '#000' }}'">
               @lang('About us')
            </a>
        </li>
        <li class="{{ Route::currentRouteName() == 'tours' ? 'active' : '' }}">
            <a href="{{ route('tour.index') }}" 
               style="color: {{ Route::currentRouteName() == 'tours' ? '#ffd320' : '#000' }};"
               onmouseover="this.style.color='#ffd320'" 
               onmouseout="this.style.color='{{ Route::currentRouteName() == 'tours' ? '#ffd320' : '#000' }}'">
               @lang('Tours')
            </a>
        </li>
        <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
            <a href="{{ route('contact') }}" 
               style="color: {{ Route::currentRouteName() == 'contact' ? '#ffd320' : '#000' }};"
               onmouseover="this.style.color='#ffd320'" 
               onmouseout="this.style.color='{{ Route::currentRouteName() == 'contact' ? '#ffd320' : '#000' }}'">
               @lang('Contact')
            </a>
        </li>
    </ul>
</div>

<div id="slicknav-mobile">
    <div class="slicknav_menu">
        <a href="#" id="mobileMenuShow" aria-haspopup="true" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: currentcolor none medium;">
        <span class="slicknav_menutxt"></span>
        <span class="slicknav_icon slicknav_no-text">
            <span class="slicknav_icon-bar"></span>
            <span class="slicknav_icon-bar"></span>
            <span class="slicknav_icon-bar"></span>
        </span>
                        </a>
        <a href="#" id="mobileMenuHide" aria-haspopup="true" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: currentcolor none medium; display:none">
        <span class="slicknav_menutxt"></span>
        <span class="slicknav_icon slicknav_no-text">
            <span class="slicknav_icon-bar"></span>
            <span class="slicknav_icon-bar"></span>
            <span class="slicknav_icon-bar"></span>
        </span>
                        </a>
                <ul class="slicknav_nav" id="mobileNavShow" style="display:none" aria-hidden="false" role="menu">
                        @if (Route::currentRouteName() == 'home') 
                            <li class="active"> 
                        @else 
                            <li> 
                        @endif
                            <a href="{{ route('home') }}">@lang('Home')</a>
                        </li>
                        @if (Route::currentRouteName() == 'about') 
                            <li class="active"> 
                        @else 
                            <li> 
                        @endif
                            <a href="{{ route('about') }}">@lang('About us')</a>
                        </li>
                        @if (Route::currentRouteName() == 'tours') 
                            <li class="active"> 
                        @else 
                            <li> 
                        @endif
                            <a href="{{ route('tour.index') }}">@lang('tours')</a>
                        </li>
                        @if (Route::currentRouteName() == 'contact') 
                            <li class="active"> 
                        @else 
                            <li> 
                        @endif
                            <a href="{{ route('contact') }}" style="color: #FB8B01">@lang('Contact')</a>
                        </li>
                    </ul>


                </div>
                    </div>
</nav>
                </div>
            </div>
                    </div>
                </div>
<!-- Navigation end -->
<!-- Contenr start -->
@yield('content')

<!-- Contenr end -->
<!-- Footer start -->
<footer>
    <div class="footer-upper">
        <div class="container">

            <div class="footer-links">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-about footer-margin">
                            <div class="about-logo">
                                <h5>CHAMADONTOUR</h5>
                            </div>
<p>@lang('We will organize tours for you throughout Uzbekistan') </p>
                            <div class="about-location">
                                <ul>
<li><i class="flaticon-maps-and-flags" aria-hidden="true"></i> @lang('Location')</li>
                                    <li><i class="flaticon-phone-call"></i> +998-95-161-08-80</li>
                                    <li><i class="flaticon-mail"></i> <a href="mailto:samiratravel@mail.ru">samiratravel@mail.ru</a></li>
                                </ul>
                            </div>
                            <div class="footer-social-links">
                                <ul>
                                    <li class="social-icon"><a href="https://t.me/agntour"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
                                    <li class="social-icon"><a href="https://instagram.com/agntour.uz"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <!-- <li class="social-icon"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> -->
                                    <!-- <li class="social-icon"><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li> -->
                                    <!-- <li class="social-icon"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-links-list footer-margin">
<h3>@lang('More')...</h3>
                            <ul>
<li><a href="{{ route('home') }}">@lang('Home')<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
<li><a href="{{ route('about') }}">@lang('About us')<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
<li><a href="{{ route('tour.index') }}">@lang('Tours')<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
<li><a href="{{ route('contact') }}">@lang('Contact')<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="footer-links-list">
                            <div class="footer-instagram">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright-content">
                        <p>2024 <i class="fa fa-copyright" style="color: #bfc012" aria-hidden="true"></i>  <a href="http://www.felix-its.uz/"  style="color: #bfc012" target="_blank">Felix-IT solution tomonidan ishlab chiqilgan</a></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment-content">
                        <ul>
<li>@lang('We accept payments'):</li>
                            <li>
                                <img src="/assets/images/payme1.png" alt="Image">
                            </li>
							<li>
                                <img src="/assets/images/mastercard.png" alt="Image">
                            </li>
							<li>
                                <img src="/assets/images/visa2.png" alt="Image">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<div id="back-to-top">
    <a href="#"></a>
</div>


<script src="/assets/js/jquery-3.2.1.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/plugin.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/main-1.js"></script>
<script src="/assets/js/preloader.js"></script>
<script src="/assets/js/custom-swiper2.js"></script>
<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d08a8e31d0fcdd7',m:'K7J8FgFN3Wq7RWxAaSTY6xcjV4YKQo5SdJBqvFR387I-1642685450-0-AVI13+Qc67PzqpFpM2OL0lmPqeWJ7faNfg3UgPkt62V+72DtyLms0+CwPKgVcwInfR4XhF8Ap4vzT0szsPvQPi9/qz9jXO0Dy85n4IrjqWapLOTbL0rpGxee9K1FkS9r720eQi9Aq+6dEBkcg6wnnR8HtD0A2BhuWuas7RkyRmT1',s:[0xef2323481e,0x333c7f8af7],u:'/cdn-cgi/challenge-platform/h/b'}})();</script></body>
<script>

    var mobileNavShow = document.getElementById('mobileNavShow');
    var mobileMenuShow = document.getElementById('mobileMenuShow');
    var mobileMenuHide = document.getElementById('mobileMenuHide');

    mobileMenuShow.addEventListener('click', function(){
        mobileNavShow.style.display = 'block';
        mobileMenuShow.style.display = 'none';
        mobileMenuHide.style.display = 'block';
    });

    mobileMenuHide.addEventListener('click', function(){
        mobileNavShow.style.display = 'none';
        mobileMenuHide.style.display = 'none';
        mobileMenuShow.style.display = 'block';
    });

</script>
</html>