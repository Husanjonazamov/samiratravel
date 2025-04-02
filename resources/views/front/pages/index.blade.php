@extends('layout/front')

@section('title')
@lang('About us')
@endsection

@section('content')

<section class="breadcrumb-outer text-center">
<div class="container">
<div class="breadcrumb-content">
<h2>About Us</h2>
<nav aria-label="breadcrumb">
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="#">Asosiy</a></li>
<li class="breadcrumb-item active" aria-current="page">Biz haqimizda</li>
</ul>
</nav>
</div>
</div>
<div class="section-overlay"></div>
</section>


<section class="aboutus">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title text-center">
<h2>Nima uchun bizni tanlash kerak?</h2>
<div class="section-icon section-icon-white">
<i class="flaticon-diamond"></i>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 col-md-6">
<div class="about-item">
<div class="about-icon">
<i class="fa fa-superpowers" aria-hidden="true"></i>
</div>
<div class="about-content">
<h3>Yaxshi rejalashtirilgan</h3>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="about-item">
<div class="about-icon">
<i class="fa fa-paw" aria-hidden="true"></i>
</div>
<div class="about-content">
<h3>Xavfsizlik yuqori darajada</h3>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="about-item">
<div class="about-icon">
<i class="fa fa-fire" aria-hidden="true"></i>
</div>
<div class="about-content">
<h3>Yuqori taassurot</h3>
</div>
</div>
</div>
</div>
</div>
</section>



<section class="testimonials">
<div class="section-title text-center">
<h2>Best Rated Travel Agency</h2>
<div class="section-icon section-icon-white">
<i class="flaticon-diamond"></i>
</div>
</div>

<div id="testimonial_094" class="carousel slide testimonial_094_indicators thumb_scroll_x swipe_x ps_easeOutSine" data-ride="carousel" data-pause="hover" data-interval="3000" data-duration="1000">

<ol class="carousel-indicators">
<li data-target="#testimonial_094" data-slide-to="2">
<img src="images/testemonial3.jpg" alt="testimonial_094_03">
</li>
<li data-target="#testimonial_094" data-slide-to="3">
<img src="images/testemonial4.jpg" alt="testimonial_094_04">
</li>
<li data-target="#testimonial_094" data-slide-to="4">
<img src="images/testemonial5.jpg" alt="testimonial_094_05">
</li>
</ol>

<div class="carousel-inner" role="listbox">

<div class="carousel-item active">

<div class="testimonial_094_slide">
<p>Lorem ipsum dolor sit amet consectetuer adipiscing elit am nibh unc varius facilisis eros ed erat in in velit quis arcu ornare laoreet urabitur adipiscing luctus massa nteger ut purus ac augue commodo commodo unc nec mi eu justo tempor consectetuer tiam.</p>
<div class="deal-rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
</div>
<h5><a href="#">Susan Doe, Houston</a></h5>
</div>
</div>


<div class="carousel-item">

<div class="testimonial_094_slide">
<p>Lorem ipsum dolor sit amet consectetuer adipiscing elit am nibh unc varius facilisis eros ed erat in in velit quis arcu ornare laoreet urabitur adipiscing luctus massa nteger ut purus ac augue commodo commodo unc nec mi eu justo tempor consectetuer tiam.</p>
<div class="deal-rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
</div>
<h5><a href="#">Susan Doe, Houston</a></h5>
</div>
</div>


<div class="carousel-item">

<div class="testimonial_094_slide">
<p>Lorem ipsum dolor sit amet consectetuer adipiscing elit am nibh unc varius facilisis eros ed erat in in velit quis arcu ornare laoreet urabitur adipiscing luctus massa nteger ut purus ac augue commodo commodo unc nec mi eu justo tempor consectetuer tiam.</p>
<div class="deal-rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
 <span class="fa fa-star-o"></span>
<span class="fa fa-star-o"></span>
</div>
<h5><a href="#">Susan Doe, Houston</a></h5>
</div>
</div>

</div>
</div>
</section>
@endsection