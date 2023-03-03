@extends('template.master')
@section('title')
    Detail Pembayaran
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-110">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Data Pembayaran</h5>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('payment') }}">Pembayaran</a></li>
                  <li class="breadcrumb-item active">Detail Pembayaran</li>
                </ol>
                <a href="{{ route('payment_pdf', $payment->id) }}" class="btn btn-success btn-sm">Cetak Data</a><br/><br/>
              </nav>
              <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td style="width:30%">Nama Project</td>
                        <td>{{ $payment->project->name_project }}</td>
                    </tr>
                    <tr>
                        <td>Nama Client</td>
                        <td>{{ $payment->project?->client?->name_client }}</td>
                    </tr>
                    <tr>
                        <td>Harga Project</td>
                        <td>{{ $payment->project->price }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Yang Sudah Dibayarkan</td>
                        <td>{{ $payment->amount_payment }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan Pembayaran</td>
                        <td>{{ $payment->ket }}</td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
