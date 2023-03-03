@extends('template.header')
@extends('template.content')
@section('title')
    Register
@endsection
@section('content')
    <div class="container mt-5">
        <h1>Register</h1>
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                @endif
                <form action="{{ route('register.action') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="username">Username<span class="text-danger">*</span></label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                        {{-- <a href="" class="btn btn-danger">Back</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
