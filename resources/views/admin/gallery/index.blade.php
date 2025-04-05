@extends('layouts/contentLayoutMaster')

@section('title')
  {{ __('Gallery') }}
@endsection

@section('content')
<!-- Gallery list start -->
<section class="app-user-list">
  <div class="card">
    <div class="row" id="table-contextual">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
              {{ __('Create gallery') }}
            </a>
          </div>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('Date') }}</th>
                  <th>{{ __('Name') }}</th>
                  <th>{{ __('Description') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($items as $item)
                  <tr class="table-default">
                    <td>
                      <div><b><span>{{ $item->created_at }}</span></b></div>
                    </td>
                    <td>
                      <div><span>{{ $item->create_at }}</span></div>
                    </td>

                    <td>
                      <div>
                        <span>
                          {{-- Descriptionni xavfsiz ko‘rsatish --}}
                          {{ is_string($item->description) ? $item->description : json_encode($item->description) }}
                        </span>
                      </div>
                    </td>
                    <td class="d-flex">
                      <a href="{{ route('admin.gallery.edit', ['id' => $item->id]) }}" class="badge badge-pill badge-light-primary mr-1">
                        <i data-feather="edit"></i>
                      </a>
                      <a href="{{ route('admin.gallery.delete', ['id' => $item->id]) }}" class="badge badge-pill badge-light-danger">
                        <i data-feather="trash"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <!-- Pagination -->
            <div class="m-2">
              {{ $items->links() }}
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Gallery list ends -->
@endsection
