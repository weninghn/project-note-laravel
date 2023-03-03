@extends('template.master')
@section('title')
    Garansi
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Garansi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Garansi</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Garansi Project</h5>
            <a href="{{ route('tambah-garansi') }}" class="btn btn-success btn-sm">Tambah Data</a>
          <!-- Bordered Table -->
          <br><br>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                {{-- <th scope="col">Nama Client</th> --}}
                <th scope="col">Nama Project</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Nomor SPK</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($garansi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{ $item->clients?->name_client }}</td> --}}
                        <td>{{ $item->projects?->name_project }}</td>
                        <td>{{ $item->projects?->client?->name_client }}</td>
                        <td>{{ $item->projects?->spk }}</td>
                        <td>
                            <a href="{{ route('edit-garansi', $item )}}">Edit</a> |
                            <a href="delete-garansi/{{ $item->id }}" data-name="{{ $item->name_project }}">Delete</a> |
                            <a href="{{ route('detail-garansi', $item) }}">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          <!-- End Bordered Table -->
@endsection
