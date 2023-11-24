@extends('backend')
@section('main')
    <style>
        .card {
            width: 400px;
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

                            <span class="articles">Articles</span>
                            <span class="number1">{{ $user->posts->count() }}</span>

                        </div>

                        <div class="d-flex flex-column">

                            <span class="followers">Followers</span>
                            <span class="number2">980</span>

                        </div>


                        <div class="d-flex flex-column">

                            <span class="rating">Rating</span>
                            <span class="number3">8.9</span>

                        </div>

                    </div>


                    <div class="button mt-2 d-flex flex-row align-items-center">

                        <button class="btn btn-sm btn-outline-primary w-100">Chat</button>
                        <button class="btn btn-sm btn-primary w-100 ml-2">Follow</button>


                    </div>


                </div>


            </div>

        </div>

    </div>
@endsection
