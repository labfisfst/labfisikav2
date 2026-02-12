<?php

namespace App\Models;

use CodeIgniter\Model;

class AlatModel extends Model
{
    protected $table            = 'alat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    // --- YANG BOLEH DIISI ---
    protected $allowedFields = ['nama_alat', 'lab_id', 'gambar', 'tahun', 'kondisi', 'fungsi'];
    // --- PENTING: SAYA UBAH JADI FALSE ---
    // Supaya tidak error kalau belum ada kolom created_at/updated_at di database
    protected $useTimestamps = false; 
}