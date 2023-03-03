@extends('template.master')
@section('title')
    Detail Project
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-110">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Data Project</h5>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('project') }}">Project</a></li>
                  <li class="breadcrumb-item active">Detail Project</li>
                </ol>
                <a href="{{ route('project_pdf', $project->id) }}" class="btn btn-success btn-sm">Cetak Data</a><br/><br/>
              </nav>
              <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td style="width: 30%">Nama Client</td>
                        <td>{{ $project->client?->name_client }}</td>
                    </tr>
                    <tr>
                        <td>Nama Project</td>
                        <td>{{ $project->name_project }}</td>
                    </tr>
                    <tr>
                        <td>Nomor SPK</td>
                        <td>{{ $project->spk }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Pekerjaan</td>
                        <td>{{ $project->work }}</td>
                    </tr>
                    <tr>
                        <td>Status Nota</td>
                        <td>{{ $project->status_note_text }}</td>
                    </tr>
                    <tr>
                        <td>Status Project</td>
                        <td>{{ $project->status_project_text }}</td>
                    </tr>
                    <tr>
                        <td>Status Pembayaran Project</td>
                        <td>{{ $project->status_payment_text }}</td>
                    </tr>
                    <tr>
                        <td>Harga Project</td>
                        <td>{{ $project->price }}</td>
                    </tr>
                </table>
              </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-110">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Detail Data Garansi Project</h5>
                      <div class="box-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>Mulai Pengerjaan Project</td>
                                <td>{{ $project->start_project }}</td>
                            </tr>
                            <tr>
                                <td>Selesai Pengerjaan Project</td>
                                <td>{{ $project->end_project }}</td>
                            </tr>
                            <tr>
                                <td>Masa Awal Garansi Project</td>
                                <td>{{ $project->start_garansi }}</td>
                            </tr>
                            <tr>
                                <td>Harga Project</td>
                                <td>{{ $project->end_garansi }}</td>
                            </tr>
                            <tr>
                                <td>Lampiran</td>
                                  <td><a href="{{ asset($project->images) }}" target="_blank">View</a> | <a href="{{ route('garansi.download', $project->id )}}"  target="_blank">Download</a></td>
                            </tr>
                        </table>
                      </div>
                    </div>
          </div>
          <div class="row">
          <div class="col-lg-110">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Pembayaran Project</h5>
            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nominal Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Keterangan</th>
                    </tr>
                    @foreach ($project->payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->amount_payment }}</td>
                            <td>{{ $payment->date }}</td>
                            <td>{{ $payment->ket }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
          </div>
          </div>
        </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-110">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Detail Data Garansi Project</h5>
              <div class="box-body">
                  <table class="table table-striped table-bordered">
                      <tr>
                          <th>Mulai Pengerjaan Project</th>
                          <th>Selesai Pengerjaan Project</th>
                          <th>Masa Awal garansi</th>
                          <th>Masa Akhir Garansi</th>
                      </tr>
                      @foreach ($project as $item)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $project->start_project }}</td>
                            <td>{{ $project->end_project }}</td>
                            <td>{{ $project->start_garansi }}</td>
                            <td>{{ $project->end_garansi }}</td>
                          </tr>
                      @endforeach
                  </table>
              </div>
            </div>
            </div>
          </div>
          </div> --}}
      </div>
    </section>
@endsection
