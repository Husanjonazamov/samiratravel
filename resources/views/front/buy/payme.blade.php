@extends('layout/front')

@section('title')
    @lang('Tours')
@endsection

@section('content')


    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="text-uppercase">@lang('Ordering')</h2>
                <h4 class="white">@lang('Tours for you')</h4>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tour.index') }}">@lang('Tours')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $order->tour->title }}</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>


    <section class="booking">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="booking-confirmed booking-outer">
                        <div class="confirmation-title">
                            <div class="form-title form-title-1">
                                <h2> @lang('Order completed successfully')</h2>
                            </div>
                            <div class="payment-info detail">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="confirmation-details detail">
                                            <h3>@lang('Your order')</h3>
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <td class="title">@lang('Order ID'):</td>
                                                    <td class="b-id">{{$order->id}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="title">@lang('Full name')</td>
                                                    <td>{{$order->name}}</td>
                                                </tr>

                                                <tr>
                                                    <td class="title">@lang('Phone')</td>
                                                    <td>{{$order->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="title">@lang('No of Tickets')</td>
                                                    <td>{{$order->count}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="title">@lang('Payment method'):</td>
                                                    <td>PAYME</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="make-payment">
                            <div class="form-title form-title-1">
                                <h2>@lang('Payment')</h2>
                            </div>
                            <p>@lang('Your booking is confirmed but payment is due. Make your payment and make your 100% reservation.')</p>
                            <!-- <a href="{{$payme_url}}" class="btn-blue btn-red">@lang('Make Payment')</a> -->
                        </div>
                    </div>
                </div>
                <div id="sidebar-sticky" class="col-lg-4">
                    <aside class="detail-sidebar sidebar-wrapper">
                        <div class="sidebar-item">
                        @foreach ($bests ?? [] as $item)
                        <div class="col-lg-{{$bests->count()<4 ? 9 : 4}}">
                            <div class="detail-title">
                                <h3>@lang("The most popular species")</h3>
                            </div>
                            <div class="sidebar-content sidebar-slider">
                                <div class="sidebar-package">
                                    <div class="sidebar-package-image">
                                        <img src="{{ $item->image->url ?? 'https://agntour.uz/storage/gallery/35/1715602192_2.jpg' }}" alt="image">
                                    </div>
                                    <div class="destination-content sidebar-package-content">
                                        <h4><a href="tour-detail.html">{{ $item->title }}</a></h4>
                                        <div class="deal-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                        <p><i class="flaticon-time"></i>{{ $item->time }} @lang("day")<span class="bold">{{ $item->price_small  }}</span> </p>
                                        <a href="#" class="btn-blue btn-red">@lang("Order")</a>
                                    </div>
                                    </div>
                                    @endforeach
                                </div>

                        <div class="sidebar-item sidebar-helpline">
                            <div class="sidebar-helpline-content">
                                <h3>Savollaringizni bormi?</h3>
                                <p>Savollaringizni va boshqa murojaatlarni quyidagi raqam yoki elektron pocta orqali qoldirishingiz mumkin.</p>
                                <p><i class="flaticon-phone-call"></i>+998-95-681-11-00</p>
                                <p><i class="flaticon-mail"></i> <a href="mailto:chamadontuour@mail.ru">chama@mail.ru</a></p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>


@endsection