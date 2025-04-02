@extends('layouts/contentLayoutMaster')
@section('title')
{{__('Types')}}
@endsection

@section('content')

<div class="">
  <div class="">
    <!-- Register v1 -->
    <div class="card p-2">
      <div class="">
        <a href="" class="">
          <h2 class="brand-text text-primary">{{__('Edit type')}}</h2>
        </a>

        <form class="form-group" method="POST" action="{{ route('admin.tour.update', ['id' => $item->id]) }}" enctype="multipart/form-data">
        @method('PUT')  
        @csrf
        <div class="row">
            <div class="form-group col-lg">
                <label for="register-title[uz]" class="form-label"><b>{{__('Title')}} (uz)<b style="color: rgb(255, 0, 0)">*</b></b></label>
                <input value="{{ $item->title }}" type="text" class="form-control @error('title[uz]') is-invalid @enderror" id="register-title[uz]" name="title[uz]" placeholder="title[uz]" aria-describedby="register-title[uz]" tabindex="1" autofocus value="{{ old('title[uz]') }}" />
                @error('title[uz]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-title[ru]" class="form-label"><b>{{__('Title')}} (ru)<b style="color: rgb(255, 0, 0)">*</b></b></label>
                <input value="{{ $item->title }}" type="text" class="form-control @error('title[ru]') is-invalid @enderror" id="register-title[ru]" name="title[ru]" placeholder="title[ru]" aria-describedby="register-title[ru]" tabindex="1" autofocus value="{{ old('title[ru]') }}" />
                @error('title[ru]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-title[en]" class="form-label"><b>{{__('Title')}} (en)<b style="color: rgb(255, 0, 0)">*</b></b></label>
                <input value="{{ $item->title }}" type="text" class="form-control @error('title[en]') is-invalid @enderror" id="register-title[en]" name="title[en]" placeholder="title[en]" aria-describedby="register-title[en]" tabindex="1" autofocus value="{{ old('title[en]') }}" />
                @error('title[en]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-location" class="form-label"><b>{{__('Location')}}<b style="color: rgb(255, 0, 0)">*</b></b></label>
                <input value="{{ $item->location }}" type="text" class="form-control @error('location') is-invalid @enderror" id="register-location" name="location" placeholder="location" aria-describedby="register-location" tabindex="1" autofocus value="{{ old('location') }}" />
                @error('location')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg">
                <label for="register-time" class="form-label"><b>{{__('Time')}}</b> (faqat raqam bilan kunlarda)</label>
                <input value="{{ $item->time }}" type="text" class="form-control @error('time') is-invalid @enderror" id="register-time" name="time" placeholder="time" aria-describedby="register-time" tabindex="1" autofocus value="{{ old('time') }}" />
                @error('time')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-price" class="form-label"><b>{{__('Price')}}</b> (faqat raqam bilan)</label>
                <input value="{{ $item->price }}" type="text" class="form-control @error('price') is-invalid @enderror" id="register-price" name="price" placeholder="price" aria-describedby="register-price" tabindex="1" autofocus value="{{ old('price') }}" />
                @error('price')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg">
                <label for="register-description[uz]" class="form-label"><b>{{__('Description')}} (uz)</b></label>
                <input value="{{ $item->description }}" type="text" class="form-control @error('description[uz]') is-invalid @enderror" id="register-description[uz]" name="description[uz]" placeholder="description[uz]" aria-describedby="register-description[uz]" tabindex="1" autofocus value="{{ old('description[uz]') }}" />
                @error('description[uz]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-description[ru]" class="form-label"><b>{{__('Description')}} (ru)</b></label>
                <input value="{{ $item->description }}" type="text" class="form-control @error('description[ru]') is-invalid @enderror" id="register-description[ru]" name="description[ru]" placeholder="description[ru]" aria-describedby="register-description[ru]" tabindex="1" autofocus value="{{ old('description[ru]') }}" />
                @error('description[ru]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-description[en]" class="form-label"><b>{{__('Description')}} (en)</b></label>
                <input value="{{ $item->description }}" type="text" class="form-control @error('description[en]') is-invalid @enderror" id="register-description[en]" name="description[en]" placeholder="description[en]" aria-describedby="register-description[en]" tabindex="1" autofocus value="{{ old('description[en]') }}" />
                @error('description[en]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
          <div class="form-group col-lg">
            <label for="register-type" class="form-label"><b>{{__('Type')}}</b></label>
            <select type="text" class="form-control @error('type') is-invalid @enderror" id="register-type" name="type" placeholder="type" aria-describedby="register-type" tabindex="1" autofocus value="{{ old('type') }}">
              <option value="tour">@lang('Tour')</option>
              <option value="hotel">@lang('Hotel')</option>
              <option value="transfer">@lang('Transfer')</option>
            </select>
            @error('type')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-lg">
            <label for="register-status" class="form-label"><b>{{__('Status')}}</b></label>
            <select type="text" class="form-control @error('status') is-invalid @enderror" id="register-status" name="status" placeholder="status" aria-describedby="register-status" tabindex="1" autofocus value="{{ old('status') }}">
              <option value="1">@lang('Open')</option>
              <option value="0">@lang('Close')</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <!-- <div class="form-group col-lg">
            <label for="register-position" class="form-label"><b>{{__('Position')}}</b></label>
            <select position="text" class="form-control @error('position') is-invalid @enderror" id="register-position" name="position" placeholder="position" aria-describedby="register-position" tabindex="1" autofocus value="{{ old('position') }}">
              <option value="0">@lang('Default')</option>
              <option value="1">@lang('First')</option>
            </select>
            @error('position')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> -->
          <div class="form-group col-lg">
            <div class="row">
              <div class="col-lg">
              <p for="register-slider" class=""><b>{{__('Slider')}}</b></p>
              <input type="radio" class="form-radio @error('slider') is-invalid @enderror" id="register-slider" name="slider" placeholder="slider" aria-describedby="register-slider" tabindex="1" autofocus value="1"
              @if ($item->slider == 1)
                checked
                
              @endif />
            </div>
            <div class="col-lg">
              <p for="register-best" class=""><b>{{__('Best')}}</b></p>
              <input type="radio" class="form-radio @error('best') is-invalid @enderror" id="register-best" name="best" placeholder="best" aria-describedby="register-best" tabindex="1" autofocus value="1"
              @if ($item->best == 1)
              checked
              @endif />
            </div>
            <div class="col-lg">
              <p for="register-famous" class=""><b>{{__('Famous')}}</b></p>
              <input type="radio" class="form-radio @error('famous') is-invalid @enderror" id="register-famous" name="famous" placeholder="famous" aria-describedby="register-famous" tabindex="1" autofocus value="1"
              @if ($item->famous == 1)
              checked
              @endif />
            </div>
          </div>
        </div>
        </div>
        <div class="row">

        </div>
        <div class="row justify-content-center" style="margin-left: 0px; margin-right: 0px">
          <button type="submit" class="btn btn-primary btn-block col-12" tabindex="5"><b>{{__('Update')}}</b></button>
        </div>
        </form>
      </div>
    </div>
    <!-- /Register v1 -->
  </div>
</div>
@endsection