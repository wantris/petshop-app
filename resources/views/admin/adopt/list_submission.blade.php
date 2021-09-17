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
                    <th>No.</th>
                    <th>Calon Pengadopsi</th>
                    <th>Nomor Telepon</th>
                    <th>Nomor Whatsapp</th>
                    <th>Terpilih</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($adopt->formRef as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->userRef->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->whatsapp_number}}</td>
                    <td>@if ($item->checked == 1)
                            <i class="fas fa-check-circle"></i>
                        @else
                            <i class="fas fa-ban"></i>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            @php
                                $json_item = json_encode($item);
                            @endphp
                            <button type="button" onclick="seeDetail({{$json_item}})" class="btn btn-info mr-2 mb-2" data-toggle="modal" data-target="#detailModal">
                                Detail
                            </button>
                            @if ($item->checked)
                                @if ($item->adoptRef->is_validated_admin)
                                    <a href="#" onclick="validatePost({{$item->adoptRef->id}}, 0)" class="btn btn-success d-inline mb-2">Tervalidasi</a>
                                @else
                                    <a href="#" onclick="validatePost({{$item->adoptRef->id}}, 1)" class="btn btn-primary d-inline mb-2">Validasi</a>
                                @endif
                            @endif
                        </div>
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
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" disabled id="name-text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Umur</label>
                        <input type="text" disabled id="age-text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Telepon</label>
                        <input type="text" disabled id="phone-text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor WhatsApp</label>
                        <input type="text" disabled id="wa-text" class="form-control">
                        <small class="text-primary font-weight-bold"><a href="#" target="_blank" id="link-wa-text"></a></small>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" disabled id="email-text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <div class="mt-2" id="alamat-text">

                        </div>
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
        let link = `https://wa.me/${item.whatsapp_number}?text=Apakah anda yakin ingi mengadopsi hewan peliharaan saya?`;

        $('#name-text').val(item.user_ref.name);
        $('#age-text').val(item.age+" Tahun");
        $('#phone-text').val(item.phone);
        $('#wa-text').val(item.whatsapp_number);
        $('#link-wa-text').text("Chat langsung");
        $("#link-wa-text").attr("href", link)
        $('#email-text').val(item.email);
        $('#alamat-text').text(item.address);

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