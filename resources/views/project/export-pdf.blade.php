<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project</title>
</head>
<style>
    table
    {
        border-collapse: collapse;
        width: 100%;
    }

    /* th,
    td
    {
        text-align: left;
        padding: 8px;
    }
    tr: :nth-child(even)
    {
        background-color: #f2f2f2;
    }
    th
    {
        background-color: #04aa6d;
        color: white;
    }
    h3
    {
        text-align: center;
    } */
</style>
<body>
    <div class="form-group">
        <h2>Detail Data Project</h2>
        {{-- <th>Nama Project</th> --}}
        <p>Nama Project : {{ $data->name_project }}</p>
        <p>Nomor SPK :  {{ $data->spk }}</p>
        <table border="1"></table>
        <br>
        <p>Nama Client : {{ $data->client?->name_client }}</p>
        <p>Nama Project : {{ $data->name_project }}</p>
        <p>Nomor SPK : {{ $data->spk }}</p>
        <p>Jenis Pekerjaan : {{ $data->work }}</p>
        <p>Status Nota : {{ $data->status_note_text }}</p>
        <p>Status Project : {{ $data->status_project_text }}</p>
        <p>Harga Project : {{ $data->price }}</p>
        <br>
        <table border="1"></table>
        <br>
        <h2>Detail Data Pembayaran</h2>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Tanggal Pembayaran</th>
                <th>Nominal Pembayaran</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($payment as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->amount_payment }}</td>
                <td>{{ $item->ket }}</td>
            </tr>
        @endforeach
        </table>
        <br>
        <table border="1"></table>
        <h2>Detail Data Garansi Project</h2>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Mulai Pengerjaan Project</th>
                <th>Selesai Pengerjaan Project</th>
                <th>Awal Garansi</th>
                <th>Akhir Garansi</th>
            </tr>
            @foreach ($garansi as $garansii)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $garansii->start_project }}</td>
                    <td>{{ $garansii->end_project }}</td>
                    <td>{{ $garansii->start_garansi }}</td>
                    <td>{{ $garansii->end_project }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
