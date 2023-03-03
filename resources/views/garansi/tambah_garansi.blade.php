@extends('template.master')
@section('title')
    Tambah Garansi
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Data Garansi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('garansi') }}">Garansi</a></li>
            <li class="breadcrumb-item active">Tambah Data Garansi</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Garansi</h5>

              <!-- General Form Elements -->
              <form action="{{ route('insert-garansi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-1">
                  <label for="nama_project" class="col-sm-10 col-form-label">Nama Project</label>
                  <div class="col-sm-10">
                    <select name="project_id" id="project_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        @foreach ($project as $projects)
                            <option value="{{ $projects->id }}">{{ $projects->name_project }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control"> --}}
                  </div>
                </div>
                {{-- <div class="col-md-6">
                    <label for="start_project" class="form-label">Tanggal Mulai Pengerjaan Project</label>
                    <input type="date" class="form-control" id="start_project" name="start_project">
                  </div>
                  <div class="col-md-6">
                    <label for="end_project" class="form-label">Tanggal Selesai Pengerjaan Project</label>
                    <input type="date" class="form-control" id="end_project" name="end_project">
                  </div> --}}
                <div class="row mb-1">
                  <label for="start_project" class="col-sm-10 col-form-label">Tanggal Mulai Pengerjaan Project</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="start_project" id="start_project">
                  </div>
                </div>
                <div class="row mb-1">
                    <label for="end_project" class="col-sm-10 col-form-label">Tanggal Selesai Pengerjaan Project</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="end_project" id="end_project">
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="start_garansi" class="col-sm-10 col-form-label">Masa Awal Garansi</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="start_garansi" id="start_garansi">
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="end_garansi" class="col-sm-10 col-form-label">Masa Akhir Garansi</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="end_garansi" id="end_garansi">
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="file" class="col-sm-10 col-form-label">Upload File*</label>
                    <div class="col-sm-10">
                        <input type="file" name="file[]" id="file[]" class="form-control" multiple>
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
