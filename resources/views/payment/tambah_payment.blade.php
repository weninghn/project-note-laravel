@extends('template.master')
@section('title')
    Payment
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Data Pembayaran</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('payment') }}">Payment</a></li>
            <li class="breadcrumb-item active">Tambah Data Pembayaran</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-110">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Pembayaran</h5>

              <!-- General Form Elements -->
              <form action="{{ route('insert-payment') }}" method="POST">
                @csrf
                <div class="row mb-1">
                  <label for="nama_project" class="col-sm-10 col-form-label">Nama Project</label>
                  <div class="col-sm-10">
                    {{-- <input type="text" class="form-control"> --}}
                    <select name="project_id" id="project_id" class="form-control">
                        <option value="">--Pilih--</option>
                        @foreach ($project as $projects)
                            <option value="{{ $projects->id }}">{{ $projects->name_project . ' - ' . $projects->spk. '| Total Rp. ' .$projects->price. '| Belum Dibayarkan Rp. ' . $projects->remain_payment  }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-1">
                  <label for="date" class="col-sm-10 col-form-label">Tanggal Pembayaran</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="date" id="date">
                  </div>
                </div>
                <div class="row mb-1">
                  <label for="jumlah_bayar" class="col-sm-10 col-form-label">Jumlah Pembayaran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="amount_payment" id="amount_payment">
                  </div>
                </div>
                <div class="row mb-1">
                    <label for="ket" class="col-sm-10 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" name="ket" id="ket" class="form-control">
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
