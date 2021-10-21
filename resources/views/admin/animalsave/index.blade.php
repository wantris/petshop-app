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
                  <th>Nama Pengaju</th>
                  <th>Jenis Hewan</th>
                  <th>Status</th>
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
                        <td>{{$item->saveRef->type}}</td>
                        <td> 
                            @if ($item->saveRef->status == 0)
                                <a href="#" class="btn btn-danger d-inline" title="Belum Tervalidasi"><i class="fas fa-ban"></i></a>
                            @elseif($item->saveRef->status == 1)
                                <a href="#" class="btn btn-success d-inline" title="Sudah Tervalidasi"><i class="far fa-check-circle"></i></a>
                            @elseif($item->saveRef->status == 2)
                                <a href="#" class="btn btn-info d-inline" title="Sedang Diselamatkan"><i class="fas fa-life-ring"></i></a>
                            @elseif($item->saveRef->status == 3)
                                <a href="#" class="btn btn-success d-inline" title="Terselamatkan"><i class="fas fa-user-shield"></i></a>
                            @endif
                        </td>
                        <td>{{$item->created_at->isoFormat('d MMM YYYY')}}</td>
                        <td>
                            @if ($item->saveRef->status == 0)
                                <a href="#" class="btn btn-primary d-inline" onclick="changeStatus({{$item->saveRef->id}},1)" >Validasi</a>
                            @elseif($item->saveRef->status == 1)
                                <a href="#" class="btn btn-primary d-inline" onclick="changeStatus({{$item->saveRef->id}}, 2)">Selamatkan</a>
                            @endif
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

    const changeStatus = (id, status) => {
        event.preventDefault();
        let url = "/admin/animalsave/changestatus";
        let msg = "";
        if(status == 1){
            msg = "Apakah anda yakin ingin memvalidasi?";
        }else{
            msg = "Apakah anda yakin ingin menyalamatkan hewan?";
        }
        Notiflix.Confirm.Show( 
            'Penyelamatan Hewan',
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
                            "id": id ,
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