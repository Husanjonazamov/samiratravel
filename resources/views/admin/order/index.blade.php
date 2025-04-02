@extends('layouts/contentLayoutMaster')
@section('title')
{{__('Order')}}
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
                  <th>{{__('Name')}} </th>
                  <th>{{__('Phone')}}</th>
                  <th>{{__('Status')}}</th>
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
                    <a href="{{ route('admin.order.show', ['id' => $item->id]) }}">{{ $item->name }}</a>
                  </td>
                  <td>
                    <span>{{ $item->phone }}</span>
                  </td>
                  <td>
                    <span>{{ $item->status }}</span>
                  </td>
                  <td class="d-flex">
                    <a href="{{ route('admin.order.delete',['id'=>$item->id])}}" class="badge badge-pill badge-light-danger"><i data-feather="trash"></i></a>
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