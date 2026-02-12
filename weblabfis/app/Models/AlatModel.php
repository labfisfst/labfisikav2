<?php

namespace App\Models;

use CodeIgniter\Model;

class AlatModel extends Model
{
    protected $table      = 'alat';
    protected $primaryKey = 'id';

    // PASTIKAN SEMUA KOLOM INI ADA
    protected $allowedFields = [
        'nama_alat', 
        'merek',        // <--- Harus ada
        'kode_barang',   // <--- Harus ada
        'lab_id', 
        'tahun', 
        'jumlah', 
        'satuan', 
        'kondisi', 
        'fungsi', 
        'gambar'
    ];

    protected $useTimestamps = false;
}