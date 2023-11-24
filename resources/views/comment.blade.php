@extends('backend')
@section('main')

    <link rel="stylesheet" href="{{ asset('info.css') }}">
    <style>
        a {
            text-decoration: none;
            color: white;
        }
    </style>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="card-title fw-semibold mb-4">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset($post->get_user->photo) }}" alt="" width="35" height="35"
                                    class="rounded-circle">
                                {{ $post->get_user->name }}
                            </a>
                        </h5>
                        <div class="card">
                            <img src="{{ asset($post->photo) }}" class="card-img-top" alt="..." height="200px">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p style="height:150px;" class="card-text">{{ $post->text }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Existing Card -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body" style="height: 54vh; overflow:auto">
                                        @foreach ($comments as $c)
                                            <div>
                                                <div class="page-content page-container" id="page-content">
                                                    <div class="padding">
                                                        <div class="media media-chat">
                                                            <img class="avatar" src="{{ asset($c->get_user->photo) }}"
                                                                alt="...">
                                                            <div class="media-body">
                                                                <p>
                                                                    <small
                                                                        style="font-size: 13px; font-weight:bold">{{ $c->get_user->name }}</small>
                                                                    @if ($c->get_user->id == Auth::id())
                                                                        <a href="/delete_comment/{{ $c->id }}"><svg
                                                                                class="demo"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                height="1em" viewBox="0 0 448 512">
                                                                                <style>
                                                                                    .demo {
                                                                                        fill: #ff0000
                                                                                    }
                                                                                </style>
                                                                                <path
                                                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                                            </svg></a>
                                                                    @endif
                                                                    <br>
                                                                    {{ $c->text }}
                                                                </p>
                                                                <p class="meta">
                                                                    <time>{{ \Carbon\Carbon::parse($c->created_at)->tz('Asia/Tashkent')->format('H:i') }}</time>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <form action="{{ route('save_comment', $post->id) }}" method="POST">
                                    @csrf
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Comment</label>
                                        <!-- Replace the textarea with the new input -->
                                        <div class="input-group">
                                            @if ($post->is_commentable == 0)
                                                <input type="text" id="comment" name="comment" class="form-control"
                                                    disabled>
                                            @else
                                                <input type="text" id="comment" name="comment" class="form-control">
                                            @endif
                                            <button type="submit" class="btn btn-outline-secondary"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Info"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-send" width="24" height="17"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 14l11 -11" />
                                                    <path
                                                        d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                                </svg></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
