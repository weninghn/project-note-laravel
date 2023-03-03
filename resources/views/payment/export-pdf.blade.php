<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
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
        <h2>Detail Data Pembayaran</h2>
        {{-- <th>Nama Project</th> --}}
        {{-- <p>Nama Project : {{ $data->name_project }}</p>
        <p>Nomor SPK :  {{ $data->spk }}</p> --}}
        <table border="1"></table>
        <p>Nama Project : {{ $data->project->name_project }}</p>
        <p>Nama Client : {{ $data->project->client?->name_client }}</p>
        <p>Harga Project : {{ $data->project->price }}</p>
        <p>Jumlah Pembayaran : {{ $data->amount_payment }}</p>
        <p>Keterangan : {{$data->ket }}</p>
    </div>
</body>
</html>
