@extends('template.master')
@section('title')
    Payment
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Payment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Payment</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Pembayaran</h5>
            <a href="{{ route('tambah-payment')}}" class="btn btn-success btn-sm">Tambah Data</a>
          <!-- Bordered Table -->
          <br><br>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Project</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Tanggal Pembayaran</th>
                <th scope="col">Jumlah Pembayaran</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{ $payment->project?->client?->name_client }}</td> --}}
                        {{-- <a href="/progres" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        <td><a href="{{ route('detail-payment-project', $payment->project->id)}}">{{ $payment->project?->name_project }}</a></td>
                        {{-- <a href="/detail-project">
                            <td>{{ $payment->project?->name_project }}</td>
                        </a> --}}
                        <td>{{ $payment->project?->client?->name_client }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->amount_payment }}</td>
                        <td>
                            <a href="{{ route('delete-payment', $payment) }}" data-name="{{ $payment->name_project }}">Delete</a> |
                            <a href="{{ route('detail-payment', $payment)}}">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          <!-- End Bordered Table -->
@endsection
