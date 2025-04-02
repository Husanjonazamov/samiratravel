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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('About us')</li>
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
                        <h2></h2>
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
                            <h3>@lang("Well planned")</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-item">
                        <div class="about-icon">
                            <i class="fa fa-paw" aria-hidden="true"></i>
                        </div>
                        <div class="about-content">
                            <h3>@lang("Security is high")</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="about-item">
                        <div class="about-icon">
                            <i class="fa fa-fire" aria-hidden="true"></i>
                        </div>
                        <div class="about-content">
                            <h3>@lang('Yuqori taassurot')</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="testimonials">
        <div class="section-title text-center">
            <h2>@lang('Best Rated Travel Agency')</h2>
            <div class="section-icon section-icon-white">
                <i class="flaticon-diamond"></i>
            </div>
        </div>

        <div id="testimonial_094"
             class="carousel slide testimonial_094_indicators thumb_scroll_x swipe_x ps_easeOutSine"
             data-ride="carousel" data-pause="hover" data-interval="3000" data-duration="1000">

            <ol class="carousel-indicators">
                <li data-target="#testimonial_094" data-slide-to="2">
                    <img src="storage/gallery/1.jpg" alt="testimonial_094_03">
                </li>
                <li data-target="#testimonial_094" data-slide-to="3">
                    <img src="storage/gallery/2.jpg" alt="testimonial_094_04">
                </li>
                <li data-target="#testimonial_094" data-slide-to="4">
                    <img src="storage/gallery/3.jpg" alt="testimonial_094_05">
                </li>
            </ol>

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active">

                    <div class="testimonial_094_slide">
                        <p>"Samira-travel bilan birinchi marta safar qildim va juda mamnunman. Ularning xizmati professional darajada bo'lib, har bir detaldan e'tibor berilgan. Tur vaqti davomida barcha rejalashtirilgan joylarga tashrif buyurdik va yo'lda hech qanday muammo bo'lmadi. Bundan tashqari, gidlar juda bilimli va samimiy edilar. AGN TOUR'ni hammaga tavsiya qilaman!"</p>
                        <div class="deal-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <h5><a href="">Jahongir Hakimjonov</a></h5>
                    </div>
                </div>


                <div class="carousel-item">

                    <div class="testimonial_094_slide">
                        <p>"Samira-travel orqali Italiyaga sayohat qildik va bu biz uchun unutilmas tajriba bo'ldi. Turistik joylar, mehmonxonalar va transport xizmatlari juda yuqori darajada edi. Ayniqsa, gidning tarixi va madaniyati haqida qiziqarli ma'lumotlari bizni o'ziga tortdi. Ular har bir mijozga alohida e'tibor qaratishadi, bu esa bizni yana qayta ularga murojaat qilishimizga sabab bo'ladi."
</p>
                        <div class="deal-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star-o"></span>
                        </div>
                        <h5><a href="#">Javlon Asadullayev</a></h5>
                    </div>
                </div>


                <div class="carousel-item">

                    <div class="testimonial_094_slide">
                        <p>"Samira-travel bilan Fransiyaga sayohat qildik va xizmatlaridan juda mamnun bo'ldik. Ular safar oldidan barcha kerakli ma'lumotlarni to'liq va aniq berishdi. Safar davomida bizni doimiy ravishda kuzatib borishdi va har qanday savolimizga tezda javob berishdi. Bunday xizmat ko'rsatganlari uchun katta rahmat, albatta, yana AGN TOUR bilan sayohat qilishni rejalashtiramiz."</p>
                        <div class="deal-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star-o"></span>
                        </div>
                        <h5><a href="#">Abdulhafiz Mominov</a></h5>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection