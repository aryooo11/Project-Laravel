@extends('adminlte::page')
@section('title', 'Generate Laporan')
@section('content_header')
    <h1 class="m-0 text-dark"> Generate Laporan</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('exportlaporan') }}" class="btn btn-success mb-2">
                        Generate
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="rawr">
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
       
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
        
    </script>
     <script>
         $(document).ready(function() {
            $('#rawr').DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        text: 'csv',
                        extend: 'csvHtml5',
                    },
                    {
                        text: 'excel',
                        extend: 'excelHtml5',
                    },
                    {
                        text: 'pdf',
                        extend: 'pdfHtml5',
                    },
                    {
                        text: 'print',
                        extend: 'print',
                    },  
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });
        });
    </script>
@endpush