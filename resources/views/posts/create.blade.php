@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto" style="max-width: 750px;">
                <h5 class="card-header">Create Post</h5>
                <div class="card-body">
                    <form class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Cover</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Post Content</label>
                            <textarea id="editor" class="form-control" rows="10"></textarea>
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