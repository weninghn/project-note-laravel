@extends('template.master')
@section('title')
    Edit Data Garansi
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Data Garansi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('garansi') }}">Garansi</a></li>
            <li class="breadcrumb-item active">Edit Data Garansi</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section">
        <div class="row">
          <div class="col-lg-110">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Data Project</h5>
                <form action="{{ route('update-garansi', $garansi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-1">
                    <label for="start_project" class="col-sm-10 col-form-label">Tanggal Mulai Pengerjaan Project</label>
                    <div class="col-sm-5">
                      <input type="date" class="form-control" id="start_project" name="start_project" value="{{$garansi->start_project}}">
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="end_project" class="col-sm-10 col-form-label">Tanggal Selesai Pengerjaan Project</label>
                    <div class="col-sm-5">
                        <input type="date" name="end_project" id="end_project" class="form-control" value="{{ $garansi->end_project }}">
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="start_garansi" class="col-sm-10 col-form-label">Masa Awal Garansi</label>
                    <div class="col-sm-5">
                        <input type="date" name="start_garansi" id="start_garansi" class="form-control" value="{{ $garansi->start_garansi }}">
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="end_garansi" class="col-sm-10 col-form-label">Masa Berakhir Garansi</label>
                    <div class="col-sm-5">
                        <input type="date" name="end_garansi" id="end_garansi" class="form-control" value="{{ $garansi->end_garansi }}">
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="file" class="col-sm-10 col-form-label">Upload File*</label>
                    <div class="col-sm-5">
                        <input type="file" name="file" id="file" class="form-control" value="{{ $garansi->file }}">
                    </div>
                </div>
                <div class="col-sm-10">
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
