@extends('admin.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <a href="{{route('admin.information.create')}}" class="btn btn-primary mb-3">Tambah Artikel</a>
          <div class="table-responsive">
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
                    <tr id="tr_{{$item->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->adminRef->name}}</td>
                        <td>{{$item->title}}</td>
                        <td>{!!$item->content!!}</td>
                        <td>{{$item->location}}</td>
                        <td>{{$item->created_at->isoFormat('d MMM YYYY')}}</td>
                        <td>
                          <a href="{{route('admin.information.edit', $item->id)}}" class="btn btn-primary d-inline mr-2">Edit</a>
                          <a href="#" onclick="deleteInfo({{$item->id}})" class="btn btn-danger d-inline">Hapus</a>
                        </td>
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
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  $(document).ready(function () {
      $('#table-admin').DataTable({
        responsive:true
      });
    });

    const deleteInfo = (id_info) => {
        event.preventDefault();
        let url = "/admin/petinformation/delete";
        Notiflix.Confirm.Show( 
            'Artikel',
            'Apakah anda yakin ingin menghapusnya?',
            'Yes',
            'No',
             function(){ 
                $.ajax(
                    {
                        url: url,
                        type: 'delete', 
                        dataType: "JSON",
                        data: {
                            "id_info": id_info ,
                        },
                        success: function (response){
                            console.log(response.status); 
                            if(response.status == 1){
                                Notiflix.Notify.Success(response.message);
                                $('#tr_' + id_info).remove();
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr);
                            Notiflix.Notify.Failure('Ooopss');
                        }
                });
            }, function(){
                 // No button callback alert('If you say so...'); 
            } ); 
    }
</script>
@endpush