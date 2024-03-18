@extends('adminlte::page')
@section('title', 'Edit Paket Wisata')
@section('content_header')
<h1 class="m-0 text-dark">Edit Paket Wisata</h1>
@stop
@section('content')
<form action="{{route('paketwisata.update', $paketwisata)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="nama_paket">Nama Paket</label>
        <input type="text" class="form-control 
@error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Nama Paket" name="nama_paket"
            value="{{$paketwisata->nama_paket ?? old('nama_paket')}}">
        @error('nama_paket') <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label></label>
        <input type="text" class="form-control 
@error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi" value="{{$paketwisata->deskripsi ?? old('deskripsi')}}">
        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        <label for="fasilitas">Fasilitas</label>
        <input type="text" class="form-control 
@error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="fasilitas" name="fasilitas"
            value="{{$paketwisata->fasilitas ?? old('fasilitas')}}">
        @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <div class="form-group">
        <label for="itinerary">Itinerary</label>
        <input type="text" class="form-control 
@error('itinerary') is-invalid @enderror" id="itinerary" placeholder="Itinerary" name="itinerary"
            value="{{$paketwisata->itinerary ?? old('itinerary')}}">
        @error('itinerary') <span class="text-danger">{{$message}}</span> @enderror
    </div>

    <div class="form-group">
        <label for="diskon">Diskon</label>
        <input type="text" class="form-control 
@error('diskon') is-invalid @enderror" id="diskon" placeholder="Diskon" name="diskon"
            value="{{$paketwisata->diskon ?? old('diskon')}}">
        @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
    </div>


                 <div class="form-group">
                    <label for="foto1" class="form-label">Foto 1</label>
                    <input type="hidden" name="oldFoto1" value="{{ $paketwisata->foto1 }}">
                    <img src="{{ asset('storage') . '/'. $paketwisata->foto1 }}" class="img-thumbnail d-block" width="15%" id="tampil1">
                    <input class="form-control @error('foto1') is-invalid @enderror" type="file"
                        id="foto1" name="foto1" value="{{ $paketwisata->foto1 ?? old('foto1') }}" >
                    @error('foto1') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="foto2" class="form-label">Foto 2</label>
                    <input type="hidden" name="oldFoto2" value="{{ $paketwisata->foto2 }}">
                    <img src="{{ asset('storage') . '/'. $paketwisata->foto2 }}" class="img-thumbnail d-block" width="15%" id="tampil2">
                    <input class="form-control @error('foto2') is-invalid @enderror" type="file"
                        id="foto2" name="foto2" value="{{ $paketwisata->foto2 ?? old('foto2') }}" >
                    @error('foto2') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="foto3" class="form-label">Foto 3</label>
                    <input type="hidden" name="oldFoto3" value="{{ $paketwisata->foto2 }}">
                    <img src="{{ asset('storage') . '/'. $paketwisata->foto3 }}" class="img-thumbnail d-block" name="tampil3" alt="..." width="15%"
                        id="tampil3" value="{{old('foto3')}}" >
                    <input class="form-control @error('foto3') is-invalid @enderror" type="file" id="foto3"
                        name="foto3">
                    @error('foto3') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="foto4" class="form-label">Foto 4</label>
                    <input type="hidden" name="oldFoto4" value="{{ $paketwisata->foto2 }}">
                    <img src="{{ asset('storage') . '/'. $paketwisata->foto4 }}" class="img-thumbnail d-block" name="tampil4" alt="..." width="15%"
                        id="tampil4" value="{{old('foto4')}}" >
                    <input class="form-control @error('foto4') is-invalid @enderror" type="file" id="foto4"
                        name="foto4">
                    @error('foto4') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="foto5" class="form-label">Foto 5</label>
                    <input type="hidden" name="oldFoto5" value="{{ $paketwisata->foto5 }}">
                    <img src="{{ asset('storage') . '/'. $paketwisata->foto5 }}" class="img-thumbnail d-block" name="tampil5" alt="..." width="15%"
                        id="tampil5" value="{{old('foto5')}}" >
                    <input class="form-control @error('foto5') is-invalid @enderror" type="file" id="foto5"
                        name="foto5">
                    @error('foto5') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>                

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('paketwisata.index')}}" class="btn btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    
@stop
@push('js') 
<script>
  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto1").change(function () {
            readURL(this);
        });
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto2").change(function () {
            readURL2(this);
        });
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto3").change(function () {
            readURL3(this);
        });
        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil4').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto4").change(function () {
            readURL4(this);
        });
        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil5').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto5").change(function () {
            readURL5(this);
        });
 $('#example2').DataTable({
            "responsive": true,
        });
                
</script>
@endpush