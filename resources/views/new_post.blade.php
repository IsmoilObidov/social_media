@extends('backend')
@section('main')


    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Create Post</h5>
            <div class="card">
                <div class="card-body">
                    <form action="/create_post" method="POST" enctype="multipart/form-data">
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
                                aria-describedby="photo">
                            <div id="photo" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Text</label>
                            <textarea id="" cols="30" rows="10" name="text" class="form-control"></textarea>
                            <div id="name" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="comment" class="form-check-input" id="exampleCheck1" checked>
                            <label class="form-check-label" for="exampleCheck1">Allow Comments</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
