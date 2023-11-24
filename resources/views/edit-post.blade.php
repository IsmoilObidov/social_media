@extends('backend')
@section('main')

    <link rel="stylesheet" href="{{ asset('info.css') }}">
    <style>
        a {
            text-decoration: none;
            color: white;
        }
    </style>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Edit Post</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('save_edit_post', $post->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo"
                                value="{{ asset($post->photo) }}" aria-describedby="photo">
                            <br>
                            <img style="width:300px; height:200px;" src="{{ asset($post->photo) }}" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Text</label>
                            <textarea id="" cols="30" rows="10" name="text" class="form-control" value="">{{ $post->text }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
