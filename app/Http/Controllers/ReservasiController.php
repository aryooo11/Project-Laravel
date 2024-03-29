<?php

namespace App\Http\Controllers;
use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\DaftarPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::all();
        return view('reservasi.index', [
            'reservasi' => $reservasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan Form Tambah Reservasi
        return view(
            'reservasi.create',
        [
            'pelanggan' => Pelanggan::all(),
            'daftarpaket' => DaftarPaket::all()
        ]
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data Reservasi
         $request->validate([
            'id_pelanggan' => 'required',
            'id_daftar_paket' => 'required',
            'tgl_reservasi_wisata' => 'required',
            'harga' => 'required',
            'jumlah_peserta'  => 'required',
            'diskon'  => 'required',
            'nilai_diskon' => 'required',
            'total_bayar' => 'required',
            'file_bukti_tf' => 'required|image|file|max:2048'
        ]);

        
        $array = $request->only([
            'id_pelanggan',
            'id_daftar_paket',
            'tgl_reservasi_wisata',
            'harga',
            'jumlah_peserta' ,
            'diskon' ,
            'nilai_diskon',
            'total_bayar',
        ]);

        $array['file_bukti_tf'] = $request->file('file_bukti_tf')->store('Foto Transfer');
        $tambah=Reservasi::create($array);
        if($tambah) $request->file('file_bukti_tf')->store('Foto Transfer');
        return redirect()->route('reservasi.index')
        ->with('success_message', 'Berhasil menambah Reservasi baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan Form Edit
        $reservasi = Reservasi::find($id);
        if (!$reservasi) return redirect()->route('reservasi.index')
        ->with('error_message', 'reservasi dengan id = '.$id.' tidak ditemukan');
        return view('reservasi.edit', [
        'reservasi' => $reservasi,
        'pelanggan' => Pelanggan::all(), 
        'daftarpaket' => DaftarPaket::all() 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Mengedit Data Daftar Paket
        $fields = [ 'id_pelanggan',
        'id_daftar_paket',
        'tgl_reservasi_wisata',
        'harga',
        'jumlah_peserta',
        'diskon',
        'nilai_diskon',
        'total_bayar',
        'file_bukti_tf',
        'status_reservasi_wisata'];

        $reservasi = reservasi::findOrFail($id);
    
    
        foreach ($fields as $f) {
            # code...
            if ($f == 'file_bukti_tf'){
                continue;
            }
    
            if ($request->has($f)){
                $request->validate([$f => 'required']);
                $request->validate(['file_bukti_tf' => 'image']);
                $reservasi[$f] = $request[$f];
    
            }
        }
    
    
        if ($request->has('file_bukti_tf')){
            if ($request->oldFoto){
                Storage::delete($request->oldFoto);
            }
            $reservasi->file_bukti_tf = $request->file('file_bukti_tf')->store('Foto Transfer');
        }
            $reservasi->save();
            return redirect()->route('reservasi.index')
            ->with('success_message', 'Berhasil mengubah Daftar Paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //Menghapus Reservasi
        $reservasi = Reservasi::find($id);
        if ($reservasi){
        $hapus=$reservasi->delete();
        if($hapus) unlink("storage/" . $reservasi->file_bukti_tf);
        }
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil menghapus Reservasi "' .
       $reservasi->fpaket->nama_paket . '" !');
    }
}
