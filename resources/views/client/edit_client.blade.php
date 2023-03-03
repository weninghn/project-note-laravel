@extends('template.master')
@section('title')
    Edit Data Client
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Data Client</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('client') }}">Client</a></li>
            <li class="breadcrumb-item active">Edit Data Client</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section">
        <div class="row">
          <div class="col-lg-110">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Data Client</h5>
                <form action="{{ route('update', $client) }}" method="POST">
                    @csrf
                    <div class="row mb-1">
                        <label for="name_client" class="col-sm-10 col-form-label">Nama Client</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name_client" name="name_client" value="{{$client->name_client}}">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="email" class="col-sm-10 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{$client->email}}">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="phone" class="col-sm-10 col-form-label">No Telpon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$client->phone}}">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="address" class="col-sm-10 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" id="address" value="{{$client->address}}">
                        </div>
                    </div>
                    <div class="row mb-1 mt-2">
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
