@extends('layouts/contentLayoutMaster')
@section('title')
{{__('Media')}}
@endsection

@section('content')

<div class="">
  <div class="">
    <!-- Register v1 -->
    <div class="card p-2">
      <div class="">
        <a href="" class="">
          <h2 class="brand-text text-primary">{{__('Add image')}}</h2>
        </a>

        <form class="form-group" method="POST" action="{{ route('admin.media.store',['id' => $item->id]) }}" enctype="multipart/form-data">
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