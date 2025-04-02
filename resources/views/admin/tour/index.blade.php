@extends('layouts/contentLayoutMaster')
@section('title')
{{__('Tour')}}
@endsection


@section('content')

<!-- users list start -->
<section class="app-user-list">
  <!-- users filter start -->
  <!-- users filter end -->
  <!-- list section start -->
  <div class="card">
    <div class="row" id="table-contextual">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('admin.tour.create') }}" class="btn btn-primary">{{__('Create tour')}}</a>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{__('Date')}}</th>
                  <th>{{__('Title')}}</th>
                  <th>{{__('Price')}}</th>
                  <th>{{__('Action')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                <tr class="table-default">
                  <td>
                    <div><b><span>{{ $item->created_at }}</span></b></div>
                  </td>
                  <td>
                    <a href="{{ route('admin.tour.show', ['id'=>$item->id]) }}">{{ $item->title }}</a>
                  </td>
                  <td>
                    <span>{{ $item->price }}</span>
                  </td>
                  <td class="d-flex">
                    <a href="{{ route('admin.tour.edit',['id'=>$item->id])}}" class="badge badge-pill badge-light-primary mr-1"><i data-feather='edit'></i></a>
                    <a href="{{ route('admin.tour.delete',['id'=>$item->id])}}" class="badge badge-pill badge-light-danger"><i data-feather="trash"></i></a>
                  </td>
                </tr>
              @endforeach
              </tbody>
              {{ $items->links() }}
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal to add new user Ends-->
  </div>
  <!-- list section end -->
</section>
<!-- users list ends -->
@endsection