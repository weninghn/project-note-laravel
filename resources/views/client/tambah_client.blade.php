@extends('template.master')
@section('title')
    Tambah Client
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Data Client</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('client') }}">Client</a></li>
            <li class="breadcrumb-item active">Tambah Data Client</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-110">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Client</h5>

              <!-- General Form Elements -->
              <form action="{{ route('insert-client') }}" method="POST">
                @csrf
                <div class="row mb-1">
                  <label for="name_client" class="col-sm-10 col-form-label">Nama Client</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name_client" id="name_client">
                  </div>
                </div>
                <div class="row mb-1">
                  <label for="email" class="col-sm-10 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email">
                  </div>
                </div>
                <div class="row mb-1">
                    <label for="phone" class="col-sm-10 col-form-label">Nomor HP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                  </div>
                  <div class="row mb-1">
                    <label for="address" class="col-sm-10 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address">
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
