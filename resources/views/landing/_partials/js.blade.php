    <!-- JS here -->
    <script src="{{asset('asset-landing/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/popper.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/ajax-form.js')}}"></script>
    <script src="{{asset('asset-landing/js/waypoints.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/scrollIt.js')}}"></script>
    <script src="{{asset('asset-landing/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/wow.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/nice-select.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/plugins.js')}}"></script>
    <script src="{{asset('asset-landing/js/gijgo.min.js')}}"></script>

    <!--contact js-->
    <script src="{{asset('asset-landing/js/contact.js')}}"></script>
    <script src="{{asset('asset-landing/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/jquery.form.js')}}"></script>
    <script src="{{asset('asset-landing/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('asset-landing/js/mail-script.js')}}"></script>

    <script src="{{asset('asset-landing/js/main.js')}}"></script>
    <script src="{{url('assets/notiflix/dist/notiflix-2.7.0.min.js')}}"></script>
    <script src="{{url('assets/notiflix/dist/notiflix-aio-2.7.0.min.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

       <script>
        const user_id = "{{Session::get('id_pengguna')}}";
        $(document).ready(function (){
            fetchAllMessages();
        });
      
        Echo.channel('events')
        .listen('RealTimeMessage', (e) =>{
            let fixMessage = JSON.parse(e.message);
            if(fixMessage.user_id && fixMessage.admin_id){
                if(user_id == fixMessage.user_id){
                    var userInput = $('.text-box');
                    renderListOtherMessage(fixMessage.message, userInput);
                }
            }
        });

        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            disableDaysOfWeek: [0, 0],
        //     icons: {
        //      rightIcon: '<span class="fa fa-caret-down"></span>'
        //  }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
        var timepicker = $('#timepicker').timepicker({
         format: 'HH.MM'
     });


    var element = $('.floating-chat');
    var myStorage = localStorage;

    if (!myStorage.getItem('chatID')) {
        myStorage.setItem('chatID', createUUID());
    }

    setTimeout(function() {
        element.addClass('enter');
    }, 1000);

    element.click(openElement);

    function openElement() {
        var messages = element.find('.messages');
        var textInput = element.find('.text-box');
        element.find('>i').hide();
        element.addClass('expand');
        element.find('.chat').addClass('enter');
        var strLength = textInput.val().length * 2;
        textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
        element.off('click', openElement);
        element.find('.header button').click(closeElement);
        element.find('#sendMessage').click(sendNewMessage);
        messages.scrollTop(messages.prop("scrollHeight"));
    }

    function closeElement() {
        element.find('.chat').removeClass('enter').hide();
        element.find('>i').show();
        element.removeClass('expand');
        element.find('.header button').off('click', closeElement);
        element.find('#sendMessage').off('click', sendNewMessage);
        element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
        setTimeout(function() {
            element.find('.chat').removeClass('enter').show()
            element.click(openElement);
        }, 500);
    }

    function createUUID() {
        // http://www.ietf.org/rfc/rfc4122.txt
        var s = [];
        var hexDigits = "0123456789abcdef";
        for (var i = 0; i < 36; i++) {
            s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
        }
        s[14] = "4"; // bits 12-15 of the time_hi_and_version field to 0010
        s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1); // bits 6-7 of the clock_seq_hi_and_reserved to 01
        s[8] = s[13] = s[18] = s[23] = "-";

        var uuid = s.join("");
        return uuid;
    }

    function sendMessageToDatabase(message){
        let url = '/account/message/save';
        $.ajax(
            {
                url: url,
                type: 'post', 
                dataType: "JSON",
                data: {
                    "message": message,
                },
                success: function (response){
                    
                },
                error: function(xhr) {
                    console.log(xhr);
                }
        });
    }

    function fetchAllMessages(){
        let url = '/account/message/fetchall';
        $.ajax(
            {
                url: url,
                type: 'get', 
                dataType: "JSON",
                success: function (response){
                    let messages = response.data;
                    var userInput = $('.text-box');
                    messages.forEach(message => {
                        renderListSelfMessage(message.message, userInput);
                    });
                },
                error: function(xhr) {
                    console.log(xhr);
                }
        });
    }

    function sendNewMessage() {
        var userInput = $('.text-box');
        var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');

        sendMessageToDatabase(newMessage);

        if (!newMessage) return;
        renderListSelfMessage(newMessage, userInput);
    }

    function onMetaAndEnter(event) {
        if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
            sendNewMessage();
        }
    }

    function renderListSelfMessage(newMessage, userInput){
        var messagesContainer = $('.messages');

        messagesContainer.append([
            '<li class="other">',
            newMessage,
            '</li>'
        ].join(''));

        // clean out old message
        userInput.html('');
        // focus on input
        userInput.focus();

        messagesContainer.finish().animate({
            scrollTop: messagesContainer.prop("scrollHeight")
        }, 250);
    }

    function renderListOtherMessage(newMessage, userInput){
        var messagesContainer = $('.messages');

        messagesContainer.append([
            '<li class="self">',
            newMessage,
            '</li>'
        ].join(''));

        // clean out old message
        userInput.html('');
        // focus on input
        userInput.focus();

        messagesContainer.finish().animate({
            scrollTop: messagesContainer.prop("scrollHeight")
        }, 250);
    }

    </script>

    @if (session()->has('failed'))
        <script>
        Notiflix.Notify.Failure("{{ Session::get('failed') }}");
        </script>
    @endif

    @if (session()->has('success'))
        <script>
        Notiflix.Notify.Success("{{ Session::get('success') }}");
        </script>
    @endif