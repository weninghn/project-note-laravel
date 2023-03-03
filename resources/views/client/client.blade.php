@extends('template.master')
@section('title')
    Data Client
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Client</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Client</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Client</h5>
            <a href="{{route('client-tambah')}}" class="btn btn-success btn-sm">Tambah Data</a>
          <!-- Bordered Table -->
          <br><br>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $client->name_client }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->address }}</td>
                    <td>
                        <a href="edit-client/{{ $client->id }}">Edit</a> |
                        <a href="delete-client/{{ $client->id }}" data-name="{{ $client->name_client }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <!-- End Bordered Table -->
@endsection
