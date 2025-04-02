@extends('layouts/contentLayoutMaster') @section('title')
{{__('Tour')}}
@endsection
@section('page-style')
    <link  href="{{ asset('viewer/dist/viewer.css') }}" rel="stylesheet">
    <style>
      .alert{
        color:red;
        font-size:20px;
        white-space: nowrap;
        font-weight: bold;
      }
    </style>
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
                <h4 class="mb-0">{{__('Title')}} : {{ $item->title }}</h4>
                <h4 class="mb-0">{{__("Description")}} : {{ $item->description }}</h4>
                <h4 class="mb-0">{{__('Location')}} : {{ $item->lacation }}</h4>
                <h4 class="mb-0">{{__('Time')}}: {{ $item->time }}</h4>
                <h4 class="mb-0">{{__('Slider')}}: @if ($item->slider == 1)
                  {{__('Yes')}} @else @lang('No') @endif</h4>
                <h4 class="mb-0">{{__('Best')}}: @if ($item->best == 1)
                  {{__('Yes')}} @else @lang('No') @endif</h4>
                <h4 class="mb-0">{{__('Famous')}}: @if ($item->famous == 1)
                  {{__('Yes')}} @else @lang('No') @endif</h4>
                <h4 class="mb-0">{{__('Type')}} : {{ $item->type }}</h4>
                <h4 class="mb-0">{{__('Price')}} : {{ $item->price }}</h4>
                <h4 class="mb-0">{{__('Images')}} :
                    <div class="row justify-content-end">
                    <div class="d-flex flex-wrap">
                      <a href="{{ route('admin.tour.edit', ['id' => $item->id]) }}" class="btn btn-primary mr-1 mb-1">{{__('Edit')}}</a>
                      <a href="{{ route('admin.media.create', ['id' => $item->id]) }}" class="btn btn-primary mr-1 mb-1">{{__('Add media')}}</a>
                      <a href="{{ route('admin.tour.delete', ['id' => $item->id]) }}" class="btn btn-outline-danger mr-1 mb-1">{{__("Delete")}}</a>
                    </div>
                    </div>
                    <div class="row justify-content-center" id="galley">
                      
                            <div class="col-lg-3">
                                @if($item->image != null)
                                <img data-original="" src="{{ $item->image->url }}" alt="image" width="100%">

                                <div class="d-flex flex-wrap mt-1">
                                    <a href="{{ route('admin.media.edit', ['id' => $item->image->id ?? 1]) }}" class="btn btn-primary mr-1 mb-1">{{__('Edit')}}</a>
                                    <a href="{{ route('admin.media.delete', ['id' => $item->image->id ?? 1]) }}" class="btn btn-outline-danger mr-1 mb-1">{{__("Delete")}}</a>
                                </div>
                                @else()
                                  <h1 class="alert">Rasm mavjud emas avval rams yuklang</h1>
                                @endif()
                            </div>
                    </div>
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script
      src="https://unpkg.com/jquery@3/dist/jquery.slim.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://unpkg.com/bootstrap@4/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('viewer/dist/viewer.js')}}"></script>
    <script>
      window.addEventListener("DOMContentLoaded", function () {
        var galley = document.getElementById("galley");
        var maxOffsetPercentage = 0.9;
        var viewer = new Viewer(galley, {
          url: "data-original",
          backdrop: "static",
          move: function (event) {
            var viewerData = viewer.viewerData;
            var imageData = viewer.imageData;
            var maxOffsetHorizontal = viewerData.width * maxOffsetPercentage;
            var maxOffsetVertical = viewerData.height * maxOffsetPercentage;
            var detail = event.detail;
            var left = detail.x;
            var top = detail.y;
            var right = viewerData.width - (left + imageData.width);
            var bottom = viewerData.height - (top + imageData.height);

            if (
              // Move left
              (detail.x < detail.oldX &&
                right > 0 &&
                right > maxOffsetHorizontal) ||
              // Move right
              (detail.x > detail.oldX &&
                left > 0 &&
                left > maxOffsetHorizontal) ||
              // Move up
              (detail.y < detail.oldY &&
                bottom > 0 &&
                bottom > maxOffsetVertical) ||
              // Move down
              (detail.y > detail.oldY && top > 0 && top > maxOffsetVertical)
            ) {
              event.preventDefault();
            }
          },
          zoomed: function (event) {
            var detail = event.detail;

            // Zoom out
            if (detail.ratio < detail.oldRatio) {
              var viewerData = viewer.viewerData;
              var imageData = viewer.imageData;
              var maxOffsetHorizontal = viewerData.width * maxOffsetPercentage;
              var maxOffsetVertical = viewerData.height * maxOffsetPercentage;
              var left = imageData.x;
              var top = imageData.y;
              var right = viewerData.width - (left + imageData.width);
              var bottom = viewerData.height - (top + imageData.height);
              var x = 0;
              var y = 0;

              if (right > 0 && right > maxOffsetHorizontal) {
                x = maxOffsetHorizontal - right;
              }

              if (left > 0 && left > maxOffsetHorizontal) {
                x = maxOffsetHorizontal - left;
              }

              if (bottom > 0 && bottom > maxOffsetVertical) {
                y = bottom - maxOffsetVertical;
              }

              if (top > 0 && top > maxOffsetVertical) {
                y = top - maxOffsetVertical;
              }

              // Move the image into view if it is invisible
              if (x !== 0 || y !== 0) {
                viewer.move(x, y);
              }
            }
          },
        });
      });
    </script>

@endsection