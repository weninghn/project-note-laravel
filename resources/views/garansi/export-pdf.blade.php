<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Garansi</title>
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
        <h2>Detail Data Garansi</h2>

        <table border="1"></table>
        <br>
        <p>Nama Client : {{ $data->projects?->client?->name_client }}</p>
        <p>Nama Project : {{ $data->projects?->name_project }}</p>
        <p>Tanggal Mulai Pengerjaan Project : {{ $data->start_project }}</p>
        <p>Tanggal Selesai Pengerjaan Project : {{ $data->end_project }}</p>
        <p>Masa Awal Garansi : {{ $data->start_garansi }}</p>
        <p>Masa Akhir Garansi : {{ $data->end_garansi }}</p>
        {{-- <p>Lampiran :
            @foreach ($data->pictures as $picture)
                <img src="{{ asset('images/'.$picture->image) }}" style="width: 70px; margin-right: 20px">
            @endforeach
        </p> --}}
        {{-- <th>Nama Project</th> --}}
        {{-- <p>Nama Project : {{ $data->name_project }}</p>
        <p>Nomor SPK :  {{ $data->spk }}</p> --}}
        {{-- <table border="1">
            <thead> --}}
                {{-- <tr>
                    <td>Nama Project</td>
                    <td>{{ $data->projects?->name_project }}</td>
                </tr>
                <tr>
                    <td>Nama Project</th>
                    <td>{{ $data->start_project }}</td>
                </tr>
                <tr>
                    <td>Tangggal Mulai Pengerjaan Project</td>
                    <td>{{ $data->end_project }}</td>
                </tr>
                <tr>
                    <td>Masa Awal Garansi</td>
                    <td>{{ $data->start_garansi }}</td>
                </tr>
                <tr>
                    <td>Masa Akhir Garansi</td>
                    <td>{{ $data->end_garansi }}</td>
                </tr> --}}
                {{-- <tr>
                    <th>Jenis Pekerjaan</th>
                    <td>{{ $data->work }}</td>
                </tr>
                <tr>
                    <th>Status Nota</th>
                    <td>{{ $data->status_note_text }}</td>
                </tr>
                <tr>
                    <th>Status Project</th>
                    <td>{{ $data->status_project_text }}</td>
                </tr>
                <tr>
                    <th>Harga Project</th>
                    <td>{{ $data->price }}</td>
                </tr> --}}
            {{-- </thead>
        </table> --}}
    </div>
</body>
</html>
