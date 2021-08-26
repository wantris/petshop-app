
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Animal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('landing._partials.css')
    
   
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    {{-- Navbar --}}
    @include('landing._partials.navbar')

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider slider_bg_1 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="slider_text">
                            <h3>We Care <br> <span>Your Pets</span></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit, sed do eiusmod.</p>
                            <a href="contact.html" class="boxed-btn4">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dog_thumb d-none d-lg-block">
                <img src="{{asset('asset-landing/img/banner/dog.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- service_area_start  -->
    <div class="service_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-7 col-md-10">
                    <div class="section_title text-center mb-95">
                        <h3>Services for every dog</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_service">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="{{asset('asset-landing/img/service/service_icon_1.png')}}" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Pet Boarding</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                         </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service active">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="{{asset('asset-landing/img/service/service_icon_2.png')}}" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Healthy Meals</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                         </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service">
                         <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                             <div class="service_icon">
                                 <img src="{{asset('asset-landing/img/service/service_icon_3.png')}}" alt="">
                             </div>
                         </div>
                         <div class="service_content text-center">
                            <h3>Pet Spa</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_area_end -->

    <!-- pet_care_area_start  -->
    <div class="pet_care_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="pet_thumb">
                        <img src="{{asset('asset-landing/img/about/pet_care.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-6">
                    <div class="pet_info">
                        <div class="section_title">
                            <h3><span>We care your pet </span> <br>
                                As you care</h3>
                            <p>Lorem ipsum dolor sit , consectetur adipiscing elit, sed do <br> iusmod tempor incididunt ut labore et dolore magna aliqua. <br> Quis ipsum suspendisse ultrices gravida. Risus commodo <br>
                                viverra maecenas accumsan.</p>
                            <a href="about.html" class="boxed-btn3">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pet_care_area_end  -->

    <!-- adapt_area_start  -->
    <div class="adapt_area">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="adapt_help">
                        <div class="section_title">
                            <h3><span>We need your</span>
                                help Adopt Us</h3>
                            <p>Lorem ipsum dolor sit , consectetur adipiscing elit, sed do iusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.</p>
                            <a href="contact.html" class="boxed-btn3">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="adapt_about">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="{{asset('asset-landing/img/adapt_icon/1.png')}}" alt="">
                                    <div class="adapt_content">
                                        <h3 class="counter">452</h3>
                                        <p>Pets Available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single_adapt text-center">
                                    <img src="{{asset('asset-landing/img/adapt_icon/3.png')}}" alt="">
                                    <div class="adapt_content">
                                        <h3><span class="counter">52</span>+</h3>
                                        <p>Pets Available</p>
                                    </div>
                                </div>
                                <div class="single_adapt text-center">
                                    <img src="{{asset('asset-landing/img/adapt_icon/2.png')}}" alt="">
                                    <div class="adapt_content">
                                        <h3><span class="counter">52</span>+</h3>
                                        <p>Pets Available</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- adapt_area_end  -->

    <!-- testmonial_area_start  -->
    <div class="testmonial_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="textmonial_active owl-carousel">
                        <div class="testmonial_wrap">
                            <div class="single_testmonial d-flex align-items-center">
                                <div class="test_thumb">
                                    <img src="{{asset('asset-landing/img/testmonial/1.png')}}" alt="">
                                </div>
                                <div class="test_content">
                                    <h4>Jhon Walker</h4>
                                    <span>Head of web design</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci.</p>
                                </div>
                            </div>
                        </div>
                        <div class="testmonial_wrap">
                            <div class="single_testmonial d-flex align-items-center">
                                <div class="test_thumb">
                                    <img src="{{asset('asset-landing/img/testmonial/1.png')}}" alt="">
                                </div>
                                <div class="test_content">
                                    <h4>Jhon Walker</h4>
                                    <span>Head of web design</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci.</p>
                                </div>
                            </div>
                        </div>
                        <div class="testmonial_wrap">
                            <div class="single_testmonial d-flex align-items-center">
                                <div class="test_thumb">
                                    <img src="{{asset('asset-landing/img/testmonial/1.png')}}" alt="">
                                </div>
                                <div class="test_content">
                                    <h4>Jhon Walker</h4>
                                    <span>Head of web design</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerci.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- testmonial_area_end  -->

    <!-- team_area_start  -->
    <div class="team_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-6 col-md-10">
                    <div class="section_title text-center mb-95">
                        <h3>Our Team</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_team">
                        <div class="thumb">
                            <img src="{{asset('asset-landing/img/team/1.png')}}" alt="">
                        </div>
                        <div class="member_name text-center">
                            <div class="mamber_inner">
                                <h4>Rala Emaia</h4>
                                <p>Senior Director</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_team">
                        <div class="thumb">
                            <img src="{{asset('asset-landing/img/team/2.png')}}" alt="">
                        </div>
                        <div class="member_name text-center">
                            <div class="mamber_inner">
                                <h4>jhon Smith</h4>
                                <p>Senior Director</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_team">
                        <div class="thumb">
                            <img src="{{asset('asset-landing/img/team/3.png')}}" alt="">
                        </div>
                        <div class="member_name text-center">
                            <div class="mamber_inner">
                                <h4>Rala Emaia</h4>
                                <p>Senior Director</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team_area_start  -->

    <div class="contact_anipat anipat_bg_1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact_text text-center">
                        <div class="section_title text-center">
                            <h3>Why go with Anipat?</h3>
                            <p>Because we know that even the best technology is only as good as the people behind it. 24/7 tech support.</p>
                        </div>
                        <div class="contact_btn d-flex align-items-center justify-content-center">
                            <a href="contact.html" class="boxed-btn4">Contact Us</a>
                            <p>Or  <a href="#"> +880 4664 216</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer_start  -->
        @include('landing._partials.footer')
    <!-- footer_end  -->

    {{-- Chat --}}
    <div class="floating-chat">
        <i class="fa fa-comments" aria-hidden="true"></i>
        <div class="chat">
            <div class="header">
                <span class="title">
                    what's on your mind?
                </span>
                <button>
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
                             
            </div>
            <ul class="messages">
                <li class="other">asdasdasasdasdasasdasdasasdasdasasdasdasasdasdasasdasdas</li>
                <li class="other">Are we dogs??? 🐶</li>
                <li class="self">no... we're human</li>
                <li class="other">are you sure???</li>
                <li class="self">yes.... -___-</li>
                <li class="other">if we're not dogs.... we might be monkeys 🐵</li>
                <li class="self">i hate you</li>
                <li class="other">don't be so negative! here's a banana 🍌</li>
                <li class="self">......... -___-</li>
            </ul>
            <div class="footer">
                <div class="text-box" contenteditable="true" disabled="true"></div>
                <button id="sendMessage">send</button>
            </div>
        </div>
    </div>


    @include('landing._partials.js')

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
      
      Echo.private('events')
        .listen('RealTimeMessage', (e) => console.log('Private RealTimeMessage: ' + e.message));

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

    function sendNewMessage() {
        var userInput = $('.text-box');
        var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');
        console.log(newMessage);
        sendMessageToDatabase(newMessage);

        if (!newMessage) return;

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

    function onMetaAndEnter(event) {
        if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
            sendNewMessage();
        }
    }

    </script>
</body>

</html>