<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class PelangganController extends Controller
{
    public function index(){
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', [
            'pelanggan' => $pelanggan
        ]);
    }

        public function create(){
            //Menampilkan Form Tambah pelanggan
            return view('pelanggan.create',[
                'user' => User::all()
            ]);
            } 
            public function store(Request $request){
            //Menyimpan Data pelanggan
            $request->validate([
            'nama_lengkap' => 'required', 
            'no_hp' => 'required', 
            'alamat' => 'required', 
            'foto' => 'image|file|max:2048',
            'id_user' => 'required|unique:pelanggan,id_user'

            ]);
            $array = $request->only([
                'nama_lengkap', 
                'no_hp', 
                'alamat', 
                'id_user'
            ]);
            
            $array['foto'] = $request->file('foto')->store('Foto pelanggan');
            $tambah=Pelanggan::create($array);
            if($tambah) $request->file('foto')->store('Foto pelanggan');
            return redirect()->route('pelanggan.index')->with('success_message', 'Berhasil menambah pelanggan baru');
            }     
            
            public function edit($id)
 { 
    //Menampilkan Form Edit
    $pelanggan = Pelanggan::find($id);
    if (!$pelanggan) return redirect()->route('pelanggan.index')->with('error_message', 'pelanggan dengan id = '.$id.'
    tidak ditemukan');
    return view('pelanggan.edit', [ 
    'pelanggan' => $pelanggan,
    'user' => User::all() 
    //Mengirimkan semua data bidang studi ke Modal pada halaman edit
    ]);
 } 
 public function update(Request $request, $id)
 { 
 //Mengedit Data Standar Kompetensi
 $fields = ['nama_lengkap', 'alamat', 'no_hp', 'id_user', 'foto'];

    $pelanggan = pelanggan::findOrFail($id);


    foreach ($fields as $f) {
        # code...
        if ($f == 'foto'){
            continue;
        }

        if ($request->has($f)){
            $request->validate([$f => 'required']);
            $request->validate(['foto' => 'image']);
            $pelanggan[$f] = $request[$f];

        }
    }


    if ($request->has('foto')){
        if ($request->oldFoto){
            Storage::delete($request->oldFoto);
        }
        $pelanggan->foto = $request->file('foto')->store('Foto pelanggan');
    }


    $pelanggan->save();
    return redirect()->route('pelanggan.index')->with('success_message', 'Berhasil mengubah Data pelanggan');
 }

            public function destroy(Request $request, $id)
            { 
            //Menghapus pelanggan
            $pelanggan = Pelanggan::find($id);
            if ($pelanggan){
            $hapus=$pelanggan->delete();
            if($hapus) unlink("storage/" . $pelanggan->foto);
            } 
            return redirect()->route('pelanggan.index') ->with('success_message', 'Berhasil menghapus pelanggan "' .$pelanggan->nama_lengkap . '" !');
 }

}