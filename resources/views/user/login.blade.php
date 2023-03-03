@extends('template.header')
@extends('template.content')
@section('title')
    Login
@endsection
@section('content')
    <div class="container mt-5">
        <h1>Login</h1>
        <div class="row">
            <div class="col-md-6">
               @if (Session::has('status'))
                   <div class="alert alert-danger" role="alert">{{Session::get('message')}}</div>
               @endif
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username">Username<span class="text-danger">*</span></label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                        {{-- <a href="" class="btn btn-danger">Back</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
