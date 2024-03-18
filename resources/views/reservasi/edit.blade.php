@extends('adminlte::page')
@section('title', 'Edit Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Edit Reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.update', $reservasi)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="idpelanggan">Data Pelanggan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{$reservasi->fpel->id ?? old('id_pelanggan')}}">
                            <input type="text" class="form-control
                    @error('nama_lengkap') is-invalid @enderror" placeholder="Pelanggan" id="nama_lengkap"
                                name="nama_lengkap" value="{{$reservasi->fpel->nama_lengkap ?? old('nama_lengkap')}}" arialabel="Nama Pelanggan"
                                aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>Cari Data Pelanggan</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="daftarpaket">Daftar Paket</label>
                        <div class="input-group">
                            <input type="hidden" name="id_daftar_paket" id="id_daftar_paket"
                                value="{{$reservasi->fpaket->id ?? old('id_daftar_paket')}}">
                            <input type="text" class="form-control
                    @error('daftarpaket') is-invalid @enderror" placeholder="Daftar Paket" id="daftarpaket"
                                name="daftarpaket" value="{{$reservasi->fpaket->nama_paket ?? old('daftarpaket')}}" arialabel="Daftar Paket"
                                aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>
                                Cari Data Daftar Paket</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_reservasi_wisata">Tanggal Reservasi Wisata</label>
                        <input type="text" class="form-control
@error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata" placeholder="Tanggal Reservasi Wisata" name="tgl_reservasi_wisata"
                            value="{{$reservasi->tgl_reservasi_wisata ?? old('tgl_reservasi_wisata')}}">
                        @error('tgl_reservasi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control
@error('harga') is-invalid @enderror" id="harga" placeholder="Harga" name="harga"
                            value="{{$reservasi->harga ?? old('harga')}}">
                        @error('harga') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="text" class="form-control
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Jumlah Peserta" name="jumlah_peserta"
                            value="{{$reservasi->jumlah_peserta ?? old('jumlah_peserta')}}">
                        @error('jumlah_peserta') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="text" class="form-control
@error('diskon') is-invalid @enderror" id="diskon" placeholder="Diskon" name="diskon"
                            value="{{$reservasi->diskon ?? old('diskon')}}">
                        @error('diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="text" class="form-control
@error('nilai_diskon') is-invalid @enderror" id="nilai_diskon" placeholder="Nilai Diskon" name="nilai_diskon"
                            value="{{$reservasi->nilai_diskon ?? old('nilai_diskon')}}">
                        @error('nilai_diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="text" class="form-control
@error('total_bayar') is-invalid @enderror" id="total_bayar" placeholder="Total Bayar" name="total_bayar"
                            value="{{$reservasi->total_bayar ?? old('total_bayar')}}">
                        @error('total_bayar') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_reservasi_wisata">Status Reservasi Wisata</label>
                        <select class="form-select @error('status_reservasi_wisata') isinvalid @enderror"
                            id="status_reservasi_wisata" name="status_reservasi_wisata">
                            <option value="pesan" @if($reservasi->status_reservasi_wisata ==
                                'pesan' || old('status_reservasi_wisata')=='pesan' )selected @endif>Pesan
                            </option>
                            <option value="dibayar" @if($reservasi->status_reservasi_wisata ==
                                'dibayar' ||old('status_reservasi_wisata')=='dibayar' )selected @endif>
                                Lunas</option>
                            <option value="selesai" @if($reservasi->status_reservasi_wisata ==
                                'selesai' || old('status_reservasi_wisata')=='selesai' )selected @endif>
                                Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file_bukti_tf">Bukti Transfer</label>
                        <input type="hidden" name="oldFoto" value="{{ $reservasi->file_bukti_tf }}">
                        <img src="{{ asset('storage') . '/'. $reservasi->file_bukti_tf }}" class="img-thumbnail d-block" width="15%" id="tampil">
                        <input class="form-control @error('foto') is-invalid @enderror" type="file"
                            id="foto" name="foto" value="{{ $reservasi->file_bukti_tf ?? old('file_bukti_tf') }}" >
                        @error('file_bukti_tf') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
              
            </div>
        </div>
    </div>
<!-- Modal -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered tablestripped" id="example2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>No. Hp</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th>ID User</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelanggan as $key => $pln)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pln->nama_lengkap}}</td>
                                    <td>{{$pln->no_hp}}</td>
                                    <td>{{$pln->alamat}}</td>
                                    <td>{{$pln->foto}}</td>
                                    <td>{{$pln->id_user}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" onclick="pilih('{{$pln->id}}', '{{$pln->nama_lengkap}}', '{{$pln->no_hp}}', '{{$pln->alamat}}', 
                        '{{$pln->foto}}', '{{$pln->id_user}}')" data-bs-dismiss="modal">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel1">Pencarian Data Daftar Paket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered tablestripped" id="example3">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Paket</th>
                                    <th>Id Paket Wisata</th>
                                    <th>Jumlah Peserta</th>
                                    <th>Harga Paket</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($daftarpaket as $key => $dp)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <!-- <td>{{$dp->id}}</td> -->
                                    <td>{{$dp->nama_paket}}</td>
                                    <td>{{$dp->id_paket_wisata}}</td>
                                    <td>{{$dp->jumlah_peserta}}</td>
                                    <td>{{$dp->harga_paket}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary
                            btn-xs" onclick="pilih1('{{$dp->id}}','{{$dp->nama_paket}}','{{$dp->id_paket_wisata}}',
                             '{{$dp->jumlah_peserta}}' , '{{$dp->harga_paket}}')" data-bs-dismiss="modal">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route('reservasi.index')}}" class="btn btn-danger">Batal</a>
    </div>
    <!--End Modal -->

    @stop
    @push('js')
    <script>
    document.getElementById("harga").addEventListener("keyup", hitung);
document.getElementById("diskon").addEventListener("keyup", hitung);
document.getElementById("jumlah_peserta").addEventListener("keyup", hitung);
function hitung() {
            let harga = document.getElementById("harga").value
            let diskon = document.getElementById("diskon").value
            let jumlah_peserta = document.getElementById("jumlah_peserta").value

            let nilai_diskon = harga * jumlah_peserta * diskon / 100
            document.getElementById("nilai_diskon").value = nilai_diskon
            let total_bayar = jumlah_peserta * harga - nilai_diskon
            document.getElementById("total_bayar").value = total_bayar

            //alert("qty = " + qty + " harga = " + harga)
        }
</script>
    <script>
         $('#example2').DataTable({
            "responsive": true,
        });
        //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
        function pilih(id, nama_lengkap) {
            document.getElementById('id_pelanggan').value = id
            document.getElementById('nama_lengkap').value = nama_lengkap
        }

        $('#example3').DataTable({
            "responsive": true,
        });
        //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
        function pilih1(id, dp) {
            document.getElementById('id_daftar_paket').value = id
            document.getElementById('daftarpaket').value = dp
        }

        const turu = document.getElementById("total").addEventListener("click", function (e) {
            e.preventDefault();
            let harga = document.getElementById("harga").value;
            let diskon = document.getElementById("diskon").value;
            let nilai_dis = harga * diskon / 100
            let nilai_diskon = document.getElementById("nilai_diskon");
            let harga_akhir = harga - nilai_dis
            let total_bayar = document.getElementById("total_bayar");
            total_bayar.value = harga_akhir;
            nilai_diskon.value = nilai_dis;

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file_bukti_tf").change(function () {
            readURL(this);
        });

    </script>
    @endpush

