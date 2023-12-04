@extends('backend')
@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($posts as $p)
                        <div class="col-md-4">
                            <h5 class="card-title fw-semibold mb-4">
                                <a class="nav-link nav-icon-hover" href="/review/{{ $p->get_user->email }}" id="drop2">
                                    <img src="{{ asset($p->get_user->photo) }}" alt="" width="35" height="35"
                                        class="rounded-circle">
                                    {{ $p->get_user->name }}
                                </a>  
                            </h5>
                            <div class="card">
                                <img src="{{ asset($p->photo) }}" class="card-img-top" alt="..." height="200px">
                                <div class="card-body" style="overflow: auto">
                                    <h5 class="card-title">
                                        <hr>

                                    </h5>
                                    <p style="height:150px;" class="card-text">{{ $p->text }}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('post', $p->id) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.25em"
                                            viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>
                                                svg {
                                                    fill: #ffffff
                                                }
                                            </style>
                                            <path
                                                d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4l0 0 0 0 0 0 0 0 .3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z" />
                                        </svg>
                                        Comment
                                    </a>
                                    <button class="btn float-right" id="likebtn" onclick="doLike({{ $p->id }})">
                                        @if ($p->get_like(Auth::id(), $p->id))
                                            <script>
                                                $(document).ready(function() {
                                                    $('#svg{{ $p->id }}').css({
                                                        'fill': 'red'
                                                    });
                                                });
                                            </script>
                                        @endif
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart"
                                            id="svg{{ $p->id }}" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                        </svg>
                                    </button>
<a href="follow">Follow</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <script>
            function doLike(id) {

                var form = new FormData();
                form.append("post_id", id);
                form.append("_token", '{{ csrf_token() }}');

                var settings = {
                    "url": "http://social.loc/like-post",
                    "method": "POST",
                    "timeout": 0,
                    "processData": false,
                    "mimeType": "multipart/form-data",
                    "contentType": false,
                    "data": form
                };

                $.ajax(settings).done(function(response) {
                    switch (response) {
                        case 'removed_like':
                            $('#svg' + id).css({
                                'fill': 'white'
                            });

                            break;

                        default:
                            $('#svg' + id).css({
                                'fill': 'red'
                            });

                            break;
                    }


                });

            }
        </script>
    </div>
@endsection
