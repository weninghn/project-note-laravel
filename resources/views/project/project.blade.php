@extends('template.master')
@section('title')
    Data Project
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Project</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Project</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Project</h5>
            <a href="{{ route('tambah-project') }}" class="btn btn-success btn-sm">Tambah Data</a>
          <!-- Bordered Table -->
          <br><br>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Nama Project</th>
                <th scope="col">Nomer SPK</th>
                <th scope="col">Harga Project</th>
                <th>Status Pembayaran</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $project->client?->name_client }}</td>
                    <td>{{ $project->name_project }}</td>
                    <td>{{ $project->spk }}</td>
                    <td>{{ $project->price }}</td>
                    <td>{{ $project->status_payment_text }}</td>
                    <td>
                        <a href="{{ route('edit-project', $project) }}">Edit</a> |
                        <a href="delete-project/{{ $project->id }}" data-name="{{ $project->name }}">Delete</a> |
                        <a href="{{ route('detail-project', $project)}}">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <!-- End Bordered Table -->
@endsection
