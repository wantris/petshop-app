@extends('admin.template')

@section('content')
<div class="row">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Dapatkan notifikasi terbaru</h4>
            </div>
            <div class="card-body" style="height: 70vh;overflow-y: auto;">
                <ul class="list-unstyled list-unstyled-border">
                    @foreach ($rooms as $room)
                        @php
                            $json_room = json_encode($room);
                        @endphp
                        <li class="media">
                            <img alt="image" class="mr-3 rounded-circle" width="50" src="{{url('assets/img/avatar/avatar-1.png')}}">
                            <div class="media-body">
                                <div class="mt-0 mb-1 font-weight-bold"><a href="#" onclick="showChat({{$room->id}}, {{$json_room}})">{{$room->userRef->name}}</a></div>
                                <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        @foreach ($rooms as $key => $room)
            <div class="col-chat col-12 @if ($key != 0) d-none @endif" id="col-chat-{{$room->id}}">
                <div class="card chat-box card-success" style="height: 70vh;" id="mychatbox-{{$room->id}}">
                    <div class="card-header">
                        <h4 id="room-user-name-{{$room->id}}">{{$room->userRef->name}}</h4>
                    </div>
                    <div class="card-body chat-content">
                    </div>
                    <div class="card-footer chat-form">
                        <form id="chat-form-{{$room->id}}" data-id-room="{{$room->id}}" class="form-chat">
                            <input type="text" class="form-control" placeholder="Type a message">
                            <button class="btn btn-primary">
                                <i class="far fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>
@endsection

@push('script')
<script src="{{ asset('js/app.js') }}"></script>
<script>
  
  Echo.channel('events')
    .listen('RealTimeMessage', (e) =>{
        let fixMessage = JSON.parse(e.message);
        
        if(fixMessage.user_id && !fixMessage.admin_id){
            console.log(e.message);
            let position = 'left';
            $.chatCtrl('#mychatbox-'+fixMessage.room_id, {
                text: fixMessage.message,
                picture: (position == 'left' ? '{{url("/assets/img/avatar/avatar-5.png")}}' : '{{url("/assets/img/avatar/avatar-2.png")}}'),
                position: 'chat-'+position,
            });
        }
    });

    $(document).ready(function () {
        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const fetchByRoom = (room_id) => {
        let url = '/admin/message/fetch/'+room_id;
        $.ajax(
            {
                url: url,
                type: 'get', 
                dataType: "JSON",
                success: function (response){
                    renderListOtherMessage(response.data, room_id);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
        });
    }

    const renderListOtherMessage = (messages, room_id) => {
        var arrMessage = [];
        messages.forEach(message => {
            if(message.admin_id){
                var data = [
                    {
                        text: message.message,
                        position: 'right'
                    },
                ]
            }else{
                var data = [
                    {
                        text: message.message,
                        position: 'left'
                    },
                ]
            }
            
            arrMessage.push(data);
            
        });
        $('.chat-content').html('');
        for(var i = 0; i < arrMessage.length; i++) {
            var type = 'text';
            if(arrMessage[i].typing != undefined) type = 'typing';
                $.chatCtrl('#mychatbox-'+room_id, {
                    text: (arrMessage[i][0].text != undefined ? arrMessage[i][0].text : ''),
                    picture: (arrMessage[i][0].position == 'left' ? '{{url("/assets/img/avatar/avatar-5.png")}}' : '{{url("/assets/img/avatar/avatar-2.png")}}'),
                    position: 'chat-'+arrMessage[i][0].position,
                    type: type
                });
        }
    }

    const showChat = (room_id, roomJson) => {
        event.preventDefault();
        $('.col-chat').each(function() {
            let id_attr = $(this).attr('id');
            if(!$(this).hasClass('d-none')){
                $(this).addClass('d-none');
            }
        });
        $('#col-chat-'+room_id).removeClass('d-none');

        fetchByRoom(room_id);
    }

    function sendMessageToDatabase(message,room_id){
        let url = '/admin/message/save';
        $.ajax(
            {
                url: url,
                type: 'post', 
                dataType: "JSON",
                data: {
                    "message": message,
                    "room_id":room_id
                },
                success: function (response){
                    
                },
                error: function(xhr) {
                    console.log(xhr);
                }
        });
    }

    $('.form-chat').each(function(){
        $(this).submit(function() {
            var me = $(this);
            var room_id = $(this).data('id-room');

            if(me.find('input').val().trim().length > 0) {      
                let message = me.find('input').val();
                $.chatCtrl('#mychatbox-'+room_id, {
                    text: message,
                    picture: '{{url("/assets/img/avatar/avatar-2.png")}}',
                });
                sendMessageToDatabase(message, room_id);
                me.find('input').val('');
            } 
            return false;
        });
    })

    

   

</script>
@endpush