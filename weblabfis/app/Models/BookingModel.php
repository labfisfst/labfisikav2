<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'alat_id', 'nama_peminjam', 'identitas', 'instansi', 
        'keperluan', 'dosen_pembimbing', 'kontak_wa', 
        'tgl_mulai', 'tgl_selesai', 'status'
    ];
}