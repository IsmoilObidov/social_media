@extends('backend')
@section('main')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('chat.css?12') }}">


    <div class="row gutters">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card m-0">

                <div class="row no-gutters">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                        <div class="users-container">
                            <div class="chat-search-box">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-info">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <ul class="users">
                                {{-- chatter --}}
                                @foreach ($chatters as $ch)
                                    <div id="chat">
                                        <li class="person" data-chat="chat{{ $ch->id }}"
                                            onclick="on_chat({{ $ch->id }})">
                                            <div class="user">
                                                <img src="{{ asset($ch->get_user($ch->id)->photo) }}" alt="Retail Admin">

                                            </div>

                                            <p class="name-time">
                                                <span class="name">{{ $ch->get_user($ch->id)->name }}</span>
                                                <span
                                                    class="time">{{ \Carbon\Carbon::parse($ch->created_at)->format('d/m/Y') }}</span>
                                            </p>
                                        </li>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                        <div class="selected-user">
                            <span>To: <span class="name"></span></span>
                        </div>
                        <div class="chat-container">
                            <ul class="chat-box chatContainerScroll" id="chatbox">

                            </ul>
                            <div class="form-group mt-3 mb-0" id="textarea">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function on_chat(id) {
            var settings = {
                "url": "http://social.loc/chat/" + id,
                "method": "GET",
                "timeout": 0
            };

            $.ajax(settings).done(function(response) {
                $('#chatbox').html('');

                for (const i of response) {
                    if (i.position == 'right') {
                        $('#chatbox').append(`
                            <li class="chat-${i.position}" id="${i.id}">
                                <div class="chat-hour">${i.created_at}</div>
                                <div class="chat-text">${i.text}</div>
                                <div class="chat-avatar">
                                    <img src="${i.user_avatar}"
                                        alt="Retail Admin">
                                    <div class="chat-name">${i.user_name}</div>
                                </div>
                            </li>
                        `);

                    } else {
                        $('#chatbox').append(`
                            <li class="chat-${i.position}" id="${i.id}">
                                <div class="chat-avatar">
                                    <img src="${i.user_avatar}" alt="Retail Admin">
                                    <div class="chat-name">${i.user_name}</div>
                                </div>
                                <div class="chat-text">${i.text}
                                </div>
                                <div class="chat-hour">${i.created_at}</div>
                            </li>
                        `);
                    }

                }
                $('#textarea').html('');
                $('#textarea').html(`
                <input type="text" class="form-control" id='message'
                                    style="position: fixed;bottom: 40px; width: 100vh" onkeyup="send_message(${response[0] ? response[0].chat_id : null})">
                `);

            });


        }

        function send_message(id) {
            var form = new FormData();
            form.append("chat_id", id);
            form.append("receiver_id", id);
            form.append("message", $('#message').val());
            form.append("_token", '{{ csrf_token() }}');

            var settings = {
                "url": "http://social.loc//chat/" + id + "/send_message",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
            };

            $.ajax(settings).done(function(response) {



            });
        }
    </script>
     <button type="submit">OK</button>
@endsection
