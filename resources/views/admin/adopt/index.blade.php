@extends('admin.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
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
                            @php
                                $item_json = json_encode($item);
                            @endphp
                            <a href="{{route('admin.adopt.submission.index',['adoptid' => $item->adoptRef->id])}}" class="btn btn-info d-inline">Daftar Pengajuan</a>
                            @if ($item->adoptRef->is_validated_admin)
                                <a href="#" onclick="validatePost({{$item->adoptRef->id}}, 0)" class="btn btn-success d-inline">Tervalidasi</a>
                            @else
                                <a href="#" onclick="validatePost({{$item->adoptRef->id}}, 1)" class="btn btn-primary d-inline">Validasi</a>
                            @endif
                            <a href="#" onclick="seeDetail({{$item_json}})" class="btn btn-info d-inline">Detail</a>
                            
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

    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Pengajuan Adopsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <img src="" id="image-adopt" class="img-fluid" alt="">
                    </div>
                    <div class="mb-2">
                        <p id="konten-text"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

    const seeDetail = (item) =>{
        event.preventDefault();
        let url_image = '/assets/photo-post/'+item.photo;
        $('#image-adopt').attr("src", url_image);
        $('#konten-text').text(item.content);
        $('#detailModal').appendTo("body").modal('show');
    }

    const validatePost = (adopt_id, status) => {
        event.preventDefault();
        let url = "/admin/adopt/submission/validate";
        let msg = "";
        if(status == 1){
            msg = "Apakah anda yakin ingin memvalidasi?";
        }else{
            msg = "Apakah anda yakin ingin membatalkan validasi?";
        }
        Notiflix.Confirm.Show( 
            'Adopsi',
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
                            "adopt_id": adopt_id ,
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