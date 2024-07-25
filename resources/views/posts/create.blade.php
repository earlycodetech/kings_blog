@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto" style="max-width: 750px;">
                <h5 class="card-header">Create Post</h5>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('post.store') }}" class="row">
                        @csrf

                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control">
                            @error('title')
                                <p class="small fw-bold text-danger m-0">
                                    <i class="fa-solid fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Cover</label>
                            <input type="file" name="cover_image" class="form-control">
                            @error('cover_image')
                                <p class="small fw-bold text-danger m-0">
                                    <i class="fa-solid fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Post Content</label>
                            @error('content')
                                <p class="small fw-bold text-danger m-0">
                                    <i class="fa-solid fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <textarea id="editor" name="content" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="col-12 my-2 text-center">
                            <button class="btn btn-primary">
                                Create Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
