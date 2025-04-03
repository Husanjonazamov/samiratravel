@extends("layout/front")

@section('title')
    @lang('Home') @lang('page')
@endsection

@section('content')
    <section class="swiper-banner">
        <div class="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($sliders ?? [] as $slider)
                        <div class="swiper-slide" style="background-image:url({{  $slider->image->url  ?? 'https://samiratravel.uz/storage/gallery/37/1715602217_4.jpg'}})">
                            <div class="swiper-content" data-animation="animated fadeInDown">
                                <h2>{{ $slider->title }}</h2>
                                <h1>{{ $slider->title }}</h1>
                                <a href="{{ route('tour.show',['id'=>$slider->id]) }}" 
                                    class="btn-blue" 
                                    style="background-color: #ffd320; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; border: none;">
                                    @lang('Order')
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next" style="background-color: #ffd320;"></div>
            <div class="swiper-button-prev" style="background-color: #ffd320;"></div>
            <div class="overlay"></div>
        </div>
    </section>
    <section id="mt_services">
        <div class="container">
            <div class="services-main">
                <div class="row">
                    <div class="col-lg-4 mar-bottom-30">
                        <div class="services-box">
                            <a href="#">
                                <div class="box text-center">
                                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                    <h3>@lang('Travel to 4+ countries')</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mar-bottom-30">
                        <div class="services-box">
                            <a href="#" class="box-a">
                                <div class="box text-center">
                                    <div class="icon backround-icon"><i class="fa fa-building" aria-hidden="true"></i></div>
                                    <h3>@lang('Comfortable hotels')</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                    <div class="col-lg-4 col-md-6 mar-bottom-30">
                        <div class="services-box">
                            <a href="#">
                                <div class="box text-center">
                                    <div class="icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                                    <h3>@lang('Convenient services')</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <style>
        .services-box .box:hover .backround-icon{
                background-color: #bfc012; 
        }
    </style> -->

    <section class="popular-packages">
        <div class="container">
            <div class="section-title text-center">
                <h2>@lang('The most popular species')</h2>
                <div class="section-icon">
                    <i class="flaticon-diamond"></i>
                </div>
            </div>
            <div class="row package-slider slider-button">
                @foreach ($famouses as $item)
                    <div class="col-lg-{{$famouses->count()<4 ? 9 : 4}}">
                        <div class="package-item">
                            <div class="package-image">
                                <img src="{{ $item->image->url ?? 'https://samiratravel.uz/storage/gallery/36/1715602205_3.jpg' }}" alt="Image">
                                <div class="package-price">
                                    <div class="deal-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star-o"></span>
                                        <span class="fa fa-star-o"></span>
                                    </div>
                                    <p><span>{{ $item->price_formatted }}</span> / {{__("per person")}} </p>
                                </div>
                            </div>
                            <div class="package-content">
                                <h3>{{$item->title}}</h3>
                                <p class="package-days"><i class="flaticon-time"></i> {{ $item->time }} @lang("day")</p>
                                <p>{{ Str::limit($item->description,100) }}</p>
                                <div class="package-info">
                                    <a href="{{ route('buy.show', ['id'=>$item->id]) }}" 
                                    class="btn-blue" 
                                    style="background-color: #ffd320; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; border: none;">
                                        {{ __('Order') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="deals">
        <div class="container">
            <div class="section-title section-title-white text-center">
                <h2>{{ __("The best tours") }}</h2>
                <div class="section-icon">
                    <i class="flaticon-diamond"></i>
                </div>
            </div>
            <div class="deals-outer">
                <div class="row deals-slider slider-button">
                    @foreach ($bests as $item)
                        <div class="col-md-{{$bests->count()<3 ? 12 : 3}}">
                            <div class="deals-item">
                                <div class="deals-item-outer">
                                    <div class="deals-image">
                                        <img src="{{ $item->image->url ?? 'https://samiratravel.uz/storage/gallery/35/1715602192_2.jpg' }}" alt="Image">
                                        <span class="deal-price">{{ $item->price_small  }}</span>
                                    </div>
                                    <div class="deal-content">
                                        <div class="deal-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                        <h3>{{ $item->title }}</h3>
                                        <a href="{{ route('buy.show', ['id'=>$item->id]) }}"
                                           class="btn-blue btn-red"
                                           style="background-color: #ffd320; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; border: none;">
                                           {{ __('Order') }}</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach                </div>
            </div>
            <div class="section-overlay"></div>
        </div>
    </section>
    <!-- <section class="blog pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>{{ __('Gallery') }}</h2>
                        <div class="section-icon">
                            <i class="flaticon-diamond"></i>
                        </div>
                    </div>
                </div> @foreach ($galaries as $galary)
                    <div class="col-lg-4 col-md-12 mar-bottom-30">
                        <div class="blog-item">
                            <div class="blog-image">
                                <img src="{{ $galary->image->url ?? 'https://samiratravel.uz/storage/gallery/34/1715602179_1.jpg' }}" alt="Image" height="256px">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> -->
@endsection
