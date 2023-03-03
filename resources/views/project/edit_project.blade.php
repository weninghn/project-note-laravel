@extends('template.master')
@section('title')
    Edit Data Project
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Project</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('project') }}">Project</a></li>
            <li class="breadcrumb-item active">Edit Data Project</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section">
        <div class="row">
          <div class="col-lg-110">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Data Project</h5>
                <form action="{{ route('update-project', $project) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-1">
                    <label for="name_project" class="col-sm-10 col-form-label">Nama Project</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_project" name="name_project" value="{{$project->name_project}}">
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="work" class="col-sm-10 col-form-label">Jenis Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" name="work" id="work" class="form-control" value="{{ $project->work }}">
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="status_note" class="col-sm-10 col-form-label">Status Nota</label>
                    <div class="col-sm-10">
                        <select name="status_note" id="status_note" class="form-control" value="{{ $project->status_note }}">
                            <option value="">--Pilih--</option>
                            <option value="0">PKP</option>
                            <option value="1">Tunggal</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="price" class="col-sm-10 col-form-label">Harga Project</label>
                    <div class="col-sm-10">
                        <input type="text" name="price" id="price" class="form-control" value="{{ $project->price }}">
                    </div>
                </div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
