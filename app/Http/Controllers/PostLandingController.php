<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\DaftarPaket;
use App\Models\Paket_Wisata;
use App\Models\Pelanggan;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class PostLandingController extends Controller
{
    //


    
    public function index(){
        $paketwisata = Reservasi::all();
        $pelanggan = pelanggan::all();
        $destination = DaftarPaket::all();
        return view('index', compact(
            'paketwisata', 'pelanggan', 'destination'
        ));
        
    }

    public function daftarpaketshow(){
        $destination = DaftarPaket::all();
        return view('dest', compact('destination'));
        
    }

    public function paketshow($id){
        $paket = DaftarPaket::find($id);
        return view('paket', compact('paket'));
    }

    public function contact(){
        return view('contact');
    }

    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
}
