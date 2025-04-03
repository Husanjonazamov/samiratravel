@extends('layout/front')

@section('title')
    @lang('Tours')
@endsection

@section('content')

    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>@lang('All tours for you')</h2>
                @php
                    $count = $items->count();
                @endphp
                <h4 class="white">@lang("Found $count rounds for you")</h4>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('Tours')</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>


    <section class="flight-destinations">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="flight-head">
                        <div class="flight-sort pull-left">
                            <div class="form-group">
                            </div>
                        </div>
                    </div>
                    <div class="flight-grid">
                        <div class="row">

                            @foreach ($items as $item)

                                <div class="col-lg-6 col-md-6">
                                    <div class="destination-item box-item">
                                        <div class="destination-image text-center">
                                            <a href="{{ route('tour.show', ['id'=>$item->id]) }}"><img
                                                        src="{{ $item->image->url ?? 'https://samiratravel.uz/storage/gallery/34/1715602179_1.jpg' }}"
                                                        alt="Image" ></a>
                                        </div>
                                        <div class="destination-content">
                                            <a href="{{ route('tour.show', ['id'=>$item->id]) }}"><h5><strong
                                                            class="color-red-3">{{ $item->price }}</strong>
                                                    / @lang('per person') </h5>
                                                <h6>{{ $item->title }}</h6></a>
                                            <div class="deal-rating">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star-o"></span>
                                                <span class="fa fa-star-o"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection