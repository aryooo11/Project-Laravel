@extends('adminlte::page')
@section('title', 'Tambah paket wisata')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Paket Wisata</h1>
@stop
@section('content')
<form action="{{route('paketwisata.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control 
    @error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Nama Paket" name="nama_paket"
                            value="{{old('nama_paket')}}">
                        @error('nama_paket') <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label></label>
                        <input type="text" class="form-control 
        @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi" value="{{old('deskripsi')}}">
                        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <input type="text" class="form-control 
        @error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="fasilitas" name="fasilitas"
                            value="{{old('fasilitas')}}">
                        @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="itinerary">Itinerary</label>
                        <input type="text" class="form-control 
        @error('itinerary') is-invalid @enderror" id="itinerary" placeholder="Itinerary" name="itinerary"
                            value="{{old('itinerary')}}">
                        @error('itinerary') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="text" class="form-control 
        @error('diskon') is-invalid @enderror" id="diskon" placeholder="Diskon" name="diskon"
                            value="{{old('diskon')}}">
                        @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto1" class="form-label">Foto 1</label>
                        <img src="/img/no-image.png" class="img-thumbnail d-block" name="tampil1" alt="..." width="15%"
                            id="tampil1" value="{{old('foto1')}}" >
                        <input class="form-control @error('foto1') is-invalid @enderror" type="file" id="foto1"
                            name="foto1">
                        @error('foto1') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto2" class="form-label">Foto 2</label>
                        <img src="/img/no-image.png" class="img-thumbnail d-block" name="tampil2" alt="..." width="15%"
                            id="tampil2" value="{{old('foto2')}}" >
                        <input class="form-control @error('foto2') is-invalid @enderror" type="file" id="foto2"
                            name="foto2">
                        @error('foto2') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto3" class="form-label">Foto 3</label>
                        <img src="/img/no-image.png" class="img-thumbnail d-block" name="tampil3" alt="..." width="15%"
                            id="tampil3" value="{{old('foto3')}}" >
                        <input class="form-control @error('foto3') is-invalid @enderror" type="file" id="foto3"
                            name="foto3">
                        @error('foto3') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto4" class="form-label">Foto 4</label>
                        <img src="/img/no-image.png" class="img-thumbnail d-block" name="tampil4" alt="..." width="15%"
                            id="tampil4" value="{{old('foto4')}}" >
                        <input class="form-control @error('foto4') is-invalid @enderror" type="file" id="foto4"
                            name="foto4">
                        @error('foto4') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto5" class="form-label">Foto 5</label>
                        <img src="/img/no-image.png" class="img-thumbnail d-block" name="tampil5" alt="..." width="15%"
                            id="tampil5" value="{{old('foto5')}}" >
                        <input class="form-control @error('foto5') is-invalid @enderror" type="file" id="foto5"
                            name="foto5">
                        @error('foto5') <span class="text-danger">{{$message}}</span> @enderror
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
        $('#example2').DataTable({
            "responsive": true,
        });

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
      
        // const foto = document.querySelectorAll('#foto1','#foto2','#foto3','#foto4','#foto5')

       
    </script>

    @endpush