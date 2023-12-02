@extends('backend')
@section('main')
    <style>
        .card {
            width: 450px;
            border: none;
            border-radius: 10px;

            background-color: #fff;
        }

        .stats {

            background: #f2f5f8 !important;

            color: #000 !important;
        }

        .articles {
            font-size: 10px;
            color: #a1aab9;
        }

        .number1 {
            font-weight: 500;
        }

        .followers {
            font-size: 10px;
            color: #a1aab9;

        }

        .number2 {
            font-weight: 500;
        }

        .rating {
            font-size: 10px;
            color: #a1aab9;
        }

        .number3 {
            font-weight: 500;
        }
    </style>


    <div class="container mt-5 d-flex justify-content-center">

        <div class="card p-3">

            <div class="d-flex align-items-center">

                <div class="image">
                    <img src="{{ asset($user->photo) }}" class="rounded" width="155">
                </div>

                <div class="ml-3 w-100">

                    <h4 class="mb-0 mt-0">{{ $user->name }}</h4>
                    <span>{{ $user->email }}</span>

                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">

                        <div class="d-flex flex-column">

                            <span class="articles">Posts </span>
                            <span class="number1">{{ $user->posts->count()}}</span>

                        </div>

                        <div class="d-flex flex-column">

                            <span class="followers">Followers</span>
                            <span id="followers_count">{{ $user->followers->count() }}</span>

                        </div>


                        <div class="d-flex flex-column">

                            <span class="rating">Rating</span>
                            <span class="number3">8.9</span>

                        </div>

                    </div>


                    <div class="button mt-2 d-flex flex-row align-items-center">
                        <button class="btn btn-sm btn-outline-primary w-100">Chat</button>
                        <div id="follow_button">
                            @if (\App\Models\Follower::where('user_id', $user->id)->where('follower_id', Auth::id())->first())
                                <button class="btn btn-sm btn-danger w-100 ml-2" type="button"
                                    onclick="follow({{ $user->id }})">Unfollow</button>
                            @else
                                <button class="btn btn-sm btn-primary w-100 ml-2" type="button"
                                    onclick="follow({{ $user->id }})">Follow</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function follow(id) {
            var form = new FormData();
            form.append("id", id);
            form.append("_token", '{{ csrf_token() }}');

            var settings = {
                "url": "http://social.loc/follow_user",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "contentType": false,
                "data": form
            };

            $.ajax(settings).done(function(response) {

                $('#follow_button').html('');
                switch (response) {
                    case 'unfollowed':
                        $('#follow_button').html(`
                                <button class="btn btn-sm btn-primary w-100 ml-2" type="button"
                                onclick="follow(${id})">Follow</button>`);
                        $('#followers_count').html(parseInt($('#followers_count').html()) - 1);
                        break;

                    case 'followed':
                        $('#follow_button').html(`
                                <button class="btn btn-sm btn-danger w-100 ml-2" type="button"
                                onclick="follow(${id})">Unfollow</button>`);
                        $('#followers_count').html(parseInt($('#followers_count').html()) + 1);

                        break;
                }

            });
        }
    </script>
@endsection
