@extends('admin.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <a href="{{route('admin.post.create')}}" class="btn btn-primary mb-3">Tambah Feed</a>
          <div class="">
            <table class="table table-bordered table-md" id="table-admin">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pengguna</th>
                  <th>Konten</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if ($item->userRef)
                                {{$item->userRef->name}}
                            @else
                                {{$item->adminRef->name}}
                            @endif
                        </td>
                        <td>{{$item->content}}</td>
                        <td>{{$item->created_at->isoFormat('d MMM YYYY')}}</td>
                        <td>
                            @if ($item->is_validate)
                                <a href="#" onclick="validatePost({{$item->id}}, 0)" class="btn btn-success d-inline">Tervalidasi</a>
                            @else
                                <a href="#" onclick="validatePost({{$item->id}}, 1)" class="btn btn-primary d-inline">Validasi</a>
                            @endif
                            <a href="" class="btn btn-danger d-inline">Hapus</a>
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
    $(document).ready(function () {
        $('#table-admin').DataTable({
            responsive:true
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const validatePost = (id_post, status) => {
        event.preventDefault();
        let url = "/admin/post/validate";
        let msg = "";
        if(status == 1){
            msg = "Apakah anda yakin ingin memvalidasi?";
        }else{
            msg = "Apakah anda yakin ingin membatalkan validasi?";
        }
        Notiflix.Confirm.Show( 
            'post',
            msg,
            'Yes',
            'No',
             function(){ 
                $.ajax(
                    {
                        url: url,
                        type: 'post', 
                        dataType: "JSON",
                        data: {
                            "id_post": id_post ,
                            'status':status
                        },
                        success: function (response){
                            if(response.status == 1){
                                Notiflix.Notify.Success(response.message);
                                location.reload();
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