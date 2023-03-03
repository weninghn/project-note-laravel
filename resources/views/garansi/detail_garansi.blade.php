@extends('template.master')
@section('title')
    Detail Garansi
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-110">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Data Garansi</h5>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('garansi') }}">Garansi</a></li>
                  <li class="breadcrumb-item active">Detail Garansi project</li>
                </ol>
                <a href="{{ route('export_pdf', $garansi->id) }}" class="btn btn-success btn-sm">Cetak Data</a><br/><br/>
              </nav>
              <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td style="width: 30%">Nama Project</td>
                        <td>{{ $garansi->projects->name_project }}</td>
                    </tr>
                    <td>Nama Client</td>
                    <td>{{ $garansi->projects?->client?->name_client }}</td>
                    <tr>
                        <td>Tanggal Mulai Pengerjaan Project</td>
                        <td>{{ $garansi->start_project }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai Pengerjaan Project</td>
                        <td>{{ $garansi->end_project }}</td>
                    </tr>
                    <tr>
                        <td>Masa Awal Garansi</td>
                        <td>{{ $garansi->start_garansi }}</td>
                    </tr>
                    <tr>
                        <td>Masa Akhir Garansi</td>
                        <td>{{ $garansi->end_garansi }}</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                          <td><a href="{{ asset($garansi->images) }}" target="_blank">View</a> | <a href="{{ route('garansi.download', $garansi->id )}}"  target="_blank">Download</a></td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
