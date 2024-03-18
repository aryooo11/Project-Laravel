<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    protected $fillable = [
       'id_reservasi',
    ];

    public function fpel(){
        return $this->belongsTo(Pelanggan::class
        // , 'id_pelanggan', 'id'
    );
    }
    public function fpaket(){
        return $this->belongsTo(DaftarPaket::class
        // , 'id_daftar_paket', 'id'
    );
    }

    public function frsv(){
        return $this->belongsTo(Reservasi::class
        , 'id_reservasi', 'id'
    );
    }
}
