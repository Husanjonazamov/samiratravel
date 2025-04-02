@extends('layouts/contentLayoutMaster')
@section('title')
{{__('Gallery')}}
@endsection

@section('content')

<div class="">
  <div class="">
    <!-- Register v1 -->
    <div class="card p-2">
      <div class="">
        <a href="" class="">
          <h2 class="brand-text text-primary">{{__('Add gallery')}}</h2>
        </a>

        <form class="form-group" method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
        @method('PUT')  
        @csrf
        <div class="row">
            <div class="form-group col-lg">
                <label for="register-image" class="form-label"><b>{{__('Image')}}<b style="color: rgb(255, 0, 0)">*</b></b></label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="register-image" name="image" placeholder="image" aria-describedby="register-image" tabindex="1" autofocus value="{{ old('image') }}" />
                @error('image')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-lg">
                <label for="register-name[uz]" class="form-label"><b>{{__('Name')}} (uz)</b></label>
                <input type="text" class="form-control @error('name[uz]') is-invalid @enderror" id="register-name[uz]" name="name[uz]" placeholder="name[uz]" aria-describedby="register-name[uz]" tabindex="1" autofocus value="{{ old('name[uz]') }}" />
                @error('name[uz]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-name[ru]" class="form-label"><b>{{__('Name')}} (ru)</b></label>
                <input type="text" class="form-control @error('name[ru]') is-invalid @enderror" id="register-name[ru]" name="name[ru]" placeholder="name[ru]" aria-describedby="register-name[ru]" tabindex="1" autofocus value="{{ old('name[ru]') }}" />
                @error('name[ru]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-name[en]" class="form-label"><b>{{__('Name')}} (en)</b></label>
                <input type="text" class="form-control @error('name[en]') is-invalid @enderror" id="register-name[en]" name="name[en]" placeholder="name[en]" aria-describedby="register-name[en]" tabindex="1" autofocus value="{{ old('name[en]') }}" />
                @error('name[en]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg">
                <label for="register-description[uz]" class="form-label"><b>{{__('Description')}} (uz)</b></label>
                <input type="text" class="form-control @error('description[uz]') is-invalid @enderror" id="register-description[uz]" name="description[uz]" placeholder="description[uz]" aria-describedby="register-description[uz]" tabindex="1" autofocus value="{{ old('description[uz]') }}" />
                @error('description[uz]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-description[ru]" class="form-label"><b>{{__('Description')}} (ru)</b></label>
                <input type="text" class="form-control @error('description[ru]') is-invalid @enderror" id="register-description[ru]" name="description[ru]" placeholder="description[ru]" aria-describedby="register-description[ru]" tabindex="1" autofocus value="{{ old('description[ru]') }}" />
                @error('description[ru]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-lg">
                <label for="register-description[en]" class="form-label"><b>{{__('Description')}} (en)</b></label>
                <input type="text" class="form-control @error('description[en]') is-invalid @enderror" id="register-description[en]" name="description[en]" placeholder="description[en]" aria-describedby="register-description[en]" tabindex="1" autofocus value="{{ old('description[en]') }}" />
                @error('description[en]')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row justify-content-center" style="margin-left: 0px; margin-right: 0px">
          <button type="submit" class="btn btn-primary btn-block col-12" tabindex="5"><b>{{__('Add')}}</b></button>
        </div>
        </form>
      </div>
    </div>
    <!-- /Register v1 -->
  </div>
</div>
@endsection