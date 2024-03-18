<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket_Wisata;
use Illuminate\Support\Facades\Storage;


class PaketWisataController extends Controller
{
    public function index(){
        $paketwisata = paket_wisata::all();
        return view('paketwisata.index', [
            'paketwisata' => $paketwisata
        ]);
    }

        public function create(){
            //Menampilkan Form Tambah paket_wisata
            return view('paketwisata.create'
            );
            } 
        public function store(Request $request){

            //Menyimpan Data paket_wisata
            $validatedData = $request->validate([
            'nama_paket' => 'required', 
            'deskripsi' => 'required', 
            'fasilitas' => 'required', 
            'itinerary' => 'required', 
            'diskon' => 'required', 
            'foto1' => 'image|file|max:2048',
            'foto2' => 'image|file|max:2048',
            'foto3' => 'image|file|max:2048',
            'foto4' => 'image|file|max:2048',
            'foto5' => 'image|file|max:2048'

            ]);
         
             

            
            if($request->file('foto1')){
                $validatedData['foto1'] = $request->file('foto1')->store('Paket Wisata');
            }

            if($request->file('foto2')){
                $validatedData['foto2'] = $request->file('foto2')->store('Paket Wisata');
            }

            if($request->file('foto3')){
                $validatedData['foto3'] = $request->file('foto3')->store('Paket Wisata');
            }

            if($request->file('foto4')){
                $validatedData['foto4'] = $request->file('foto4')->store('Paket Wisata');
            }

            if($request->file('foto5')){
                $validatedData['foto5'] = $request->file('foto5')->store('Paket Wisata');
            }

            Paket_Wisata::create($validatedData);
            
          
            return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menambah paket wisata baru');

            }     
            
            public function edit($id)
 { 
    // Menampilkan Form Edit
    $paketwisata = paket_wisata::find($id);
    if (!$paketwisata) return redirect()->route('paketwisata.index')->with('error_message', 'paket wisata dengan id = '.$id.'
    tidak ditemukan');
    return view('paketwisata.edit', [ 
    'paketwisata' => $paketwisata,
    //Mengirimkan semua data bidang studi ke Modal pada halaman edit
    ]);
 } 
 public function update(Request $request, $id)
 { 
//  //Mengedit Data Standar Kompetensi
 $fields = [ 
    'nama_paket', 
    'deskripsi', 
    'fasilitas', 
    'itinerary', 
    'diskon','foto1','foto2','foto3','foto4','foto5'];

    $paketwisata = paket_wisata::findOrFail($id);


    foreach ($fields as $f) {
        # code...
        if ($f == 'foto1'){
            continue;
        } if ($f == 'foto2'){
            continue;
        }
        if ($f == 'foto3'){
            continue;
        }
        if ($f == 'foto4'){
            continue;
        }
        if ($f == 'foto5'){
            continue;
        }

        if ($request->has($f)){
            $request->validate([$f => 'required' ]);
            $request->validate([
                'foto1' ,
                'foto2' ,
                'foto3' ,
                'foto4' ,
                'foto5' => 'image',
            ]);
            $paketwisata[$f] = $request[$f];

        }
    }

    if ($request->has('foto1')){
        if ($request->oldFoto){
            Storage::delete($request->oldFoto1);
        }
        $paketwisata->foto1 = $request->file('foto1')->store('Foto Paket Wisata');
    }
    if ($request->has('foto2')){
        if ($request->oldFoto){
            Storage::delete($request->oldFoto2);
        }
        $paketwisata->foto2 = $request->file('foto2')->store('Foto Paket Wisata');
    }
    if ($request->has('foto3')){
        if ($request->oldFoto){
            Storage::delete($request->oldFoto3);
        }
        $paketwisata->foto3 = $request->file('foto3')->store('Foto Paket Wisata');
    }
    if ($request->has('foto4')){
        if ($request->oldFoto){
            Storage::delete($request->oldFoto4);
        }
        $paketwisata->foto4 = $request->file('foto4')->store('Foto Paket Wisata');
    }
    if ($request->has('foto5')){
        if ($request->oldFoto){
            Storage::delete($request->oldFoto5);
        }
        $paketwisata->foto5 = $request->file('foto5')->store('Foto Paket Wisata');
    }
    $paketwisata->save();
    return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil mengubah Data Paket Wisata');
 }

            public function destroy(Request $request, $id)
            { 
            //Menghapus paket_wisata
            $paketwisata = paket_wisata::find($id);
            if ($paketwisata){
            $hapus=$paketwisata->delete();
            if($hapus) unlink("storage/" . $paketwisata->foto1);
            if($hapus) unlink("storage/" . $paketwisata->foto2);
            if($hapus) unlink("storage/" . $paketwisata->foto3);
            if($hapus) unlink("storage/" . $paketwisata->foto4);
            if($hapus) unlink("storage/" . $paketwisata->foto5);
        }
            return redirect()->route('paketwisata.index') ->with('success_message', 'Berhasil menghapus paket_wisata "' .$paketwisata->nama_paket . '" !');
 }

    }