@extends('template.master')
@section('title')
    Tambah User
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Data User</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
            <li class="breadcrumb-item active">Tambah Data User</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-110">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data User</h5>

              <!-- General Form Elements -->
              <form action="{{ route('insert-user')}}" method="POST">
                @csrf
                <div class="row mb-1">
                  <label for="name" class="col-sm-10 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                </div>
                <div class="row mb-1">
                    <label for="username" class="col-sm-10 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username">
                    </div>
                  </div>
                <div class="row mb-1">
                  <label for="email" class="col-sm-10 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                </div>
                <div class="row mb-1">
                  <label for="password" class="col-sm-10 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                </div>

                <div class="row mb-1">
                  {{-- <label class="col-sm-10 col-form-label">Submit Button</label> --}}
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
    </section>

  </main><!-- End #main -->
@endsection
