@extends('layouts/contentLayoutMaster')
@section('title')
{{__('Contact')}}
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
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{__('Date')}}</th>
                  <th>{{__('Name')}} && {{__('Email')}} && {{__('Phone')}}</th>
                  <th>{{__('Message')}}</th>
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
                    <div>{{ $item->name }}</div>
                    <div>{{ $item->email }}</div>
                    <div>{{ $item->phone }}</div>
                  </td>
                  <td>
                    <span>{{ $item->massage }}</span>
                  </td>
                  <td class="d-flex">
                    <a href="{{ route('admin.contact.delete',['id'=>$item->id])}}" class="badge badge-pill badge-light-danger"><i data-feather="trash"></i></a>
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