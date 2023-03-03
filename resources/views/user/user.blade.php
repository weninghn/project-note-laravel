@extends('template.master')
@section('title')
    Data User
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">User</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data User</h5>
            <a href="{{ route('tambah-user') }}" class="btn btn-success btn-sm">Tambah Data</a>
          <!-- Bordered Table -->
          <br><br>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                            <a href="{{ route('edit-user', $data) }}">Edit</a> |
                            <a href="delete-user/{{ $data->id }}" data-name="{{ $data->name }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          <!-- End Bordered Table -->
@endsection
