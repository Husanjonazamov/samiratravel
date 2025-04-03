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
                        <li class="breadcrumb-item active" aria-current="page">{{ $item->title }}</li>
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
                    <div class="booking-form booking-outer">
                        <div class="payment-info detail">
                            <div class="row">
                                <div class="col-lg-5">
                                    <img src="{{$item->image->url ?? 'https://samiratravel.uz/storage/gallery/34/1715602179_1.jpg'}}" alt="Image">
                                </div>
                                <div class="col-lg-7">
                                    <h3>{{ $item->title }}</h3>
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="title">@lang('Payment amount')</td>
                                            <td class="b-id">{{ $item->price }}</td>
                                        </tr>
                                        <tr>
                                            <td class="title">@lang('Total amount')</td>
                                            <td class="b-id">{{ $item->price*($count ?? 1) }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('buy.store', ['id'=>$item->id]) }}">
                            @method("PUT")
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>@lang('Full name'):*</label>
                                    <input type="text" class="form-control required" id="Name" name="name"
                                           placeholder="Ismingizni kiriting">
                                </div>
                                <div class="form-group col-lg-12">
                                    @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>@lang('Phone'):*</label>
                                    <input type="text" class="form-control required" value="+998" id="phnumber"
                                           name="phone" placeholder="XXXX-XXXXXX">
                                </div>
                                <div class="form-group col-lg-6 col-left-padding">
                                    <label>@lang('Payment method'):</label>
                                    <select class="form-control">
                                        <option value="payme">Payme</option>
                                        <option value="mastercard">Mastercard</option>
                                        <option value="visa">VISA</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-left-padding">
                                    <label>@lang('No of Tickets'):</label>
                                    <input type="number" class="form-control" name="count" value="{{$count ?? 1}}">
                                </div>

                                <div class="textarea col-lg-12">
                                    <label>@lang('Message'):</label>
                                    <textarea placeholder="@lang('Enter a message')" name="text"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkbox-outer">
                                        <input type="checkbox" name="agree" > @lang('I agree to the') <a
                                                href="#">@lang('terms and conditions.')</a>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="comment-btn btn-blue btn-red">@lang('Book Now')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection