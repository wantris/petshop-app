@extends('admin.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <a href="{{route('admin.information.create')}}" class="btn btn-primary mb-3">Tambah Pet Informasi</a>
          <div class="">
            <table class="table table-bordered table-md" id="table-admin">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Admin</th>
                  <th>Judul</th>
                  <th>Konten</th>
                  <th>Lokasi</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($informations as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->adminRef->name}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->content}}</td>
                        <td>{{$item->location}}</td>
                        <td>{{$item->created_at->isoFormat('d MMM YYYY')}}</td>
                        <td></td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
<script>
  $(document).ready(function () {
      $('#table-admin').DataTable();
    });
</script>
@endpush