<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarPaket;
use App\Models\Paket_Wisata;

class DaftarPaketController extends Controller
{
    //Nampilin Data
    public function index(){
        $dp = DaftarPaket::all();
        return view('daftarpaket.index', [
            'daftarpaket' => $dp
        ]);
    }
    public function create()
    {
        // $karyawanp = StandarKompetensi::all();
        return view(
            'daftarpaket.create', [
            'paketwisata' => Paket_Wisata::all()
        ]);
    }
    public function store(Request $request)
    {
        $fields = [ 
            'nama_paket',
            'id_paket_wisata',
            'jumlah_peserta',
            'harga_paket'];
        
            foreach ($fields as $f) {
                # code...
              
        
                if ($request->has($f)){
                    $request->validate([$f => 'required' ]);
                    $daftarpaket[$f] = $request[$f];
        
                }
            }    
            DaftarPaket::create($daftarpaket);
            

        return redirect()->route('daftarpaket.index')->with('success_message', 'Daftar Paket telah ditambahkan');
    }
    public function edit($id)
 { 
 //Menampilkan Form Edit
 $daftarpaket = DaftarPaket::find($id);
 if (!$daftarpaket) return redirect()->route('daftarpaket.index')->with('error_message', 'Paket dengan id = '.$id.'
tidak ditemukan');
 return view('daftarpaket.edit', [ 
 'daftarpaket' => $daftarpaket,'paketwisata' => Paket_Wisata::all() //Mengirimkan semua data bidang studi ke Modal pada halaman edit
 ]);
 } 
 public function update(Request $request, $id)
 { 
 //Mengedit Data Standar Kompetensi
 $fields = [ 'nama_paket',
 'id_paket_wisata',
 'jumlah_peserta',
 'harga_paket'];

 $daftarpaket = DaftarPaket::findOrFail($id);


 foreach ($fields as $f) {
     # code...

     if ($request->has($f)){
         $request->validate([$f => 'required']);
         $daftarpaket[$f] = $request[$f];

     }
 }
 $daftarpaket->save();
 return redirect()->route('daftarpaket.index') 
 ->with('success_message', 'Berhasil mengubah Data Paket');
 }
 public function destroy(Request $request, $id)
 { 
 //Menghapus Bidang Studi
 $daftarpaket = DaftarPaket::find($id);
 if ($daftarpaket) $daftarpaket->delete();
 return redirect()->route('daftarpaket.index') ->with('success_message', 'Berhasil menghapus Paket ' . $daftarpaket->nama_paket . ' !');
 }
}
