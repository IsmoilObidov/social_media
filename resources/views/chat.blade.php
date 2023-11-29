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
                                    <li class="person" data-chat="chat{{ $ch->id }}"
                                        onclick="on_chat({{ $ch->id }})">
                                        <div class="user">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png"
                                                alt="Retail Admin">
                                            <span class="status busy"></span>
                                        </div>
                                        <p class="name-time">
                                            <span class="name">{{ $ch->get_user($ch->id)->name }}</span>
                                            <span
                                                class="time">{{ \Carbon\Carbon::parse($ch->created_at)->format('d/m/Y') }}</span>
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                        {{-- <div class="selected-user">
                                <span>To: <span class="name">Emily Russell</span></span>
                            </div>
                            <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                                    <li class="chat-left">
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png"
                                                alt="Retail Admin">
                                            <div class="chat-name">Russell</div>
                                        </div>
                                        <div class="chat-text">Hello, I'm Russell.
                                            <br>How can I help you today?
                                        </div>
                                        <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                                    </li>
                                    <li class="chat-right">
                                        <div class="chat-hour">08:56 <span class="fa fa-check-circle"></span></div>
                                        <div class="chat-text">Hi, Russell
                                            <br> I need more information about Developer Plan.
                                        </div>
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png"
                                                alt="Retail Admin">
                                            <div class="chat-name">Sam</div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <input type="text" class="form-control" style="position: fixed;bottom: 40px; width: 100vh">
                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function on_chat(id) {

        }
    </script>
@endsection
