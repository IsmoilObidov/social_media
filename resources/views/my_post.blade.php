@extends('backend')
@section('main')
    
        
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($posts as $p)
                        <div class="col-md-4">
                            <h5 class="card-title fw-semibold mb-4">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset($p->get_user->photo) }}" alt="" width="35" height="35"
                                        class="rounded-circle">
                                        {{ $p->get_user->name }}
                                </a>
                            </h5>

                            <div class="card">
                                <img src="{{ asset($p->photo) }}" class="card-img-top" alt="..." height="200px">
                                <div class="card-body" style="overflow: auto">
                                    <h5 class="card-title">Card title</h5>
                                    <p style="height:150px;" class="card-text">{{ $p->text }}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('edit_post', $p->id) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" class="demo"
                                        viewBox="0 0 512 512">
                                        <style>
                                                .demo {
                                                    fill: #ffffff
                                                }
                                            </style>
                                            <path
                                                d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                            </svg>
                                    </a>
                                    <a href="{{ route('post', $p->id) }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.25em" class="demo"
                                            viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            
                                            <path
                                            d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4l0 0 0 0 0 0 0 0 .3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('delete_post', $p->id) }}" class="btn btn-danger float-right">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
