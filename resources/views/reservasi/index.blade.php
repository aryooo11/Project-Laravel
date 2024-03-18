@extends('adminlte::page')
@section('title', 'List Reservasi')
@section('content_header')
    <h1 class="m-0 text-dark">List Reservasi</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('reservasi.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                        <th>No.</th>
                            <th>Pelanggan</th>
                            <th>Daftar Paket</th>
                            <th>Tanggal Reservasi Wisata</th>
                            <th>Harga</th>
                            <th>Jumlah Peserta</th>
                            <th>Diskon</th>
                            <th>Nilai Diskon</th>
                            <th>Total Bayar</th>
                            <th>Bukti Transfer</th>
                            <th>Status Reservasi Wisata</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
@foreach($reservasi as $key => $reservasi)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$reservasi->fpel->nama_lengkap}}</td>
                            <td>{{$reservasi->fpaket->nama_paket}}</td>
                            <td>{{$reservasi->tgl_reservasi_wisata}}</td>
                            <td>{{'Rp.'.$reservasi->harga}}</td>
                            <td>{{$reservasi->jumlah_peserta}}</td>
                            <td>{{$reservasi->diskon.'%'}}</td>
                            <td>{{'Rp.'.$reservasi->nilai_diskon}}</td>
                            <td>{{'Rp.'.$reservasi->total_bayar}}</td>
                            <td><img src="storage/{{$reservasi->file_bukti_tf}}" alt="{{$reservasi->file_bukti_tf}} tidak tampil" class="img-thumbnail" width="50%"></td> 
                        <td>
                            @switch($reservasi->status_reservasi_wisata)
                            @case('pesan')
                            Pesan
                            @break
                            @case('dibayar')
                            Lunas
                            @break
                            @case('selesai')
                            Selesai
                            @endswitch
                        </td>
                        <td>
                                <a href="{{route('reservasi.edit', $reservasi)}}" class="btn btn-primary btn-xs">
                                Edit
                                </a>
                                <a href="{{route('reservasi.destroy', $reservasi)}}" onclick="notificationBeforeDelete(event, this)" 
                                class="btn btn-danger btn-xs">
                                Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
</form>
<script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

        function pilih1(id, dp, hrg, dsk) {
            document.getElementById('id_paket').value = id
            document.getElementById('nama_paket').value = dp 
            document.getElementById('harga').value = hrg
            document.getElementById('diskon').value = dsk


        }
    </script>
@endpush