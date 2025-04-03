@extends('layout/front')

@section('title')
    @lang('Tours')
@endsection

@section('content')

    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ $item->title }}</h2>
                <h4 class="white">@lang('We are happy to serve you')</h4>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tour.index') }}">@lang('Tours')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $item->location }}
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>

    <section class="flight-destinations">
        <div class="container">
            <div class="row">
                <div id="content" class="col-lg-8">
                    <div class="detail-content content-wrapper">
                        <div class="detail-info">
                            <div class="detail-info-content clearfix">
                                <h2>{{ $item->title }}</h2>
                                <p class="detail-info-price">
                                    <span class="bold">{{ $item->price }} @lang('UZS')</span>
                                </p>
                                <div class="deal-rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>
                                    <span class="fa fa-star-o"></span>
                                </div>
                            </div>
                        </div>
                        <div class="gallery detail-box">
                            <div id="in_th_030" class="carousel slide in_th_brdr_img_030 thumb_scroll_x swipe_x ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="4000" data-duration="2000">
                                <ol class="carousel-indicators">
                                    <li data-target="#in_th_030" data-slide-to="0" class="active">
                                        <img src="{{ ($item->image->url ?? 'https://samiratravel.uz/storage/gallery/34/1715602179_1.jpg') }}"
                                             alt="in_th_030_01_sm"/>
                                    </li>
                                    @if (!$item->gallery->isEmpty())
                                        @foreach ($item->gallery as $image))
                                        <li data-target="#in_th_030"
                                            data-slide-to="{{$loop->iteration}}">
                                            <img src="{{ ($image->url ?? 'https://samiratravel.uz/storage/gallery/34/1715602179_1.jpg' ) }}"
                                                 alt="in_th_030_{{$loop->iteration}}"  width="100px" height="100px"/>
                                        </li>
                                        @endforeach
                                    @endif
                                </ol>

                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="{{ ($item->image->url ?? '/storage/gallery/34/1715602179_1.jpg') }}"
                                             alt="in_th_030_01_sm"/>
                                    </div>


                                    @if (!$item->gallery->isEmpty())
                                        @foreach ($item->gallery as $image)
                                        <div class="carousel-item">
                                            <img src="{{ ($image->url ?? 'https://samiratravel.uz/storage/gallery/34/1715602179_1.jpg') }}" alt="in_th_030_{{$loop->iteration}}"/>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="description detail-box">
                            <div class="detail-title">
                                <h3>@lang('More')</h3>
                            </div>
                            <div class="description-content">
                                <!-- <p>Pellentesque ac turpis egestas, varius justo et, condimentum augue. Praesent aliquam, nisl feugiat vehicula condimentum, justo tellus scelerisque metus. Pellentesque ac turpis egestas, varius justo et, condimentum augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
                                {!!  $item->description !!}

                                <div class="col-md-12">
                                    <div class="comment-btn">
                                        <a href="{{ route('buy.show', ['id'=>$item->id]) }}" class="btn-blue btn-red"
                                        >@lang('Book Now')</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!empty($recommended))
                    <div id="sidebar" class="col-lg-4">
                        <aside class="detail-sidebar sidebar-wrapper">
                            <div class="sidebar-item sidebar-helpline">
                                <div class="sidebar-helpline-content">
                                    <h3>@lang('Any Questions?')</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectet ur adipiscing elit,
                                        sedpr do eiusmod tempor incididunt ut.
                                    </p>
                                    <p><i class="flaticon-phone-call"></i>+998-95-681-11-00</p>
                                    <p>
                                        <i class="flaticon-mail"></i>
                                        <a
                                                href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection"
                                                class="__cf_email__"
                                                data-cfemail="e5918a90978b919784938089a59180969188848c89cb868a88"
                                        >[email&#160;protected]</a
                                        >
                                    </p>
                                </div>
                            </div>
                        </aside>
                    </div>
                @endif
            </div>
        </div>
    </section>


@endsection