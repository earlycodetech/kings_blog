@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card mx-auto shadow" style="max-width: 600px;">
                <div class="card-header">
                    <h1 class="text-center">Contact Us</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name')
                                <p class="fw-bold text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                            @error('email')
                                <p class="fw-bold text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message">Message</label>
                            @error('message')
                                <p class="fw-bold text-danger">{{ $message }}</p>
                            @enderror
                            <textarea rows="5" name="message" class="form-control" id="message"></textarea>
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-success">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
