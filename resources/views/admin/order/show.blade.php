@extends('layouts/contentLayoutMaster') @section('title')
{{__('Order')}}
@endsection
@section('content')
<div class="row">
  <!-- User Card starts-->
  <div class="col-xl-12 col-lg-12 col-md-12">
    <div class="card user-card">
      <div class="card-body">
        <div class="row">
          <div class="col-xl-12 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
            <div class="d-flex flex-column ml-1">
              <div class="user-info mb-1">
                <h4 class="mb-0">{{__('Adden date')}} : {{ $item->created_at }}</h4>
                <h4 class="mb-0">{{__('Name')}} : {{ $item->name }}</h4>
                <h4 class="mb-0">{{__("Phone")}} : {{ $item->phone }}</h4>
                <h4 class="mb-0">{{__('Tour')}} : <a href="{{ route('tour.show', ['id' => $item->tour_id]) }}">{{ $item->tour->title }}</a></h4>
                <h4 class="mb-0">{{__('Count')}}: {{ $item->count }}</h4>
                <h4 class="mb-0">{{__('Total price')}}: {{ $item->total_price }}</h4>
                <h4 class="mb-0">{{__('Payment method')}} : {{ $item->payment_method }}</h4>
                <h4 class="mb-0">{{__('Status')}} : {{ $item->status }}</h4>
                <!-- <h4 class="mb-0">{{__('Message')}} : {{ $item->message }}</h4> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection