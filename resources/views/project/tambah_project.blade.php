@extends('template.master')
@section('title')
    Tambah Project
@endsection
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Data Project</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('project') }}">Project</a></li>
            <li class="breadcrumb-item active">Tambah Data Project</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-110">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Project</h5>

              <!-- General Form Elements -->
              <form action="{{ route('insert-project') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-1">
                  <label for="nama_client" class="col-sm-10 col-form-label">Nama Client</label>
                  <div class="col-sm-10">
                    <select name="client_id" id="client_id" class="form-control" required>
                        <option value="">--Pilih--</option>
                        @foreach ($client as $data)
                            <option value="{{ $data->id}}">{{ $data->name_client }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control"> --}}
                  </div>
                </div>
                <div class="row mb-1">
                    <label for="status_project" class="col-sm-10 col-form-label">Status Project</label>
                    <div class="col-sm-10">
                        <select name="status_project" id="status_project" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="0">Baru</option>
                            <option value="1">Update</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-1">
                  <label for="name_project" class="col-sm-10 col-form-label">Nama Project</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name_project" id="name_project">
                  </div>
                </div>
                <div class="row mb-1">
                    <label for="spk" class="col-sm-10 col-form-label">Nomor SPK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="spk" id="spk">
                    </div>
                  </div>
                  <div class="row mb-1">
                    <label for="work" class="col-sm-10 col-form-label">Jenis Pekerjaan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="work" id="work">
                    </div>
                  </div>
                  <div class="row mb-1">
                    <label for="status_note" class="col-sm-10 col-form-label">Status Nota</label>
                    <div class="col-sm-10">
                        <select name="status_note" id="status_note" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="0">PKP</option>
                            <option value="1">Tunggal</option>
                        </select>
                    </div>
                </div>
                  <div class="row mb-1">
                    <label for="price" class="col-sm-10 col-form-label">Harga Project</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control price" name="price" id="price">
                    </div>
                  </div>
                  <div class="row mb-1">
                    <label for="start_project" class="col-sm-10 col-form-label">Tanggal Mulai Pengerjaan Project</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="start_project" id="start_project">
                    </div>
                  </div>
                  <div class="row mb-1">
                      <label for="end_project" class="col-sm-10 col-form-label">Tanggal Selesai Pengerjaan Project</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="end_project" id="end_project">
                      </div>
                  </div>
                  <div class="row mb-1">
                      <label for="start_garansi" class="col-sm-10 col-form-label">Masa Awal Garansi</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="start_garansi" id="start_garansi">
                      </div>
                  </div>
                  <div class="row mb-1">
                      <label for="end_garansi" class="col-sm-10 col-form-label">Masa Akhir Garansi</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="end_garansi" id="end_garansi">
                      </div>
                  </div>
                  <div class="row mb-1">
                      <label for="file" class="col-sm-10 col-form-label">Upload File*</label>
                      <div class="col-sm-10">
                          <input type="file" name="file[]" id="file[]" class="form-control" multiple>
                      </div>
                  </div>
                  {{-- <div class="row mb-1">
                    <label for="price">Harga</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                      <span class="input-group-text">Rp</span>
                      </div>
                      <div class="col sm-10">
                        <input type="text" class="form-control price" id="price" name="price" required>
                      </div>
                  </div> --}}
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
@push('script')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('js/jquery.masknumber.js') }}"></script>
<script>
  $(document).ready(function(){
    $(".price").keyup(function(){
      $(this).maskNumber({integer: true, thousands: "."})
    })
  })
  </script>
@endpush
