@extends('backend')
@section('main')

    <link rel="stylesheet" href="{{ asset('info.css') }}">

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
                                                                        style="font-size: 13px; line-height: 3px; font-weight:bold">{{ $c->get_user->name }}</small><br>
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
                                            <input type="text" id="comment" name="comment" class="form-control">
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
