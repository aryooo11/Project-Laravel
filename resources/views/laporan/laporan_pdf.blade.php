<!DOCTYPE html>
<html>

<head>
    <title> Form Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Form Laporan</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No.</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Paket</th>
                            <th>Tanggal Reservasi Wisata</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Bukti Transfer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $key => $l)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$l->fpel->nama_lengkap}}</td>
                            <td>{{$l->fpaket->nama_paket}}</td>
                            <td>{{$l->tgl_reservasi_wisata}}</td>
                            <td>{{'Rp'.$l->harga}}</td>
                            <td>{{$l->diskon.'%'}}</td>
                            <td>{{'Rp'.$l->total_bayar}}</td>
                            <td>{{$l->status_reservasi_wisata}}</td>
                            <td><img src="storage/{{$l->file_bukti_tf}}" alt="{{$l->file_bukti_tf}} tidak tampil" class="img-thumbnail" width="50%"></td> 
                        {{-- <td> --}}
                        {{-- <td>
                                <a href="{{route('reservasi.edit', $l)}}" class="btn btn-primary btn-xs">
                                Edit
                                </a>
                                <a href="{{route('reservasi.destroy', $l)}}" onclick="notificationBeforeDelete(event, this)" 
                                class="btn btn-danger btn-xs">
                                Delete
                                </a>
                            </td> --}}
                        </tr>
                    @endforeach
        </tbody>
    </table>

</body>

</html>