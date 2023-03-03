@extends('template.master')
@section('title')
    Edit Data Client
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Data User</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
            <li class="breadcrumb-item active">Edit Data User</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section">
        <div class="row">
          <div class="col-lg-110">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Data User</h5>

                <!-- General Form Elements -->
                <form action="{{ route('updateuser', $user) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row mb-1">
                    <label for="name" class="col-sm-10 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                    </div>
                  </div>
                  <div class="row mb-1">
                    <label for="username" class="col-sm-10 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
                    </div>
                  </div>
                  <div class="row mb-1">
                    <label for="email" class="col-sm-10 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                    </div>
                  </div>
                  <div class="row mb-1">
                    <label for="password" class="col-sm-10 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="password" name="password" value="">
                      <small>Kosongkan jika tidak ingin mengupdate password</small>
                    </div>
                  </div>
                  <div class="row mb-1 mt-2">
                    {{-- <label class="col-sm-10 col-form-label">Submit Button</label> --}}
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
