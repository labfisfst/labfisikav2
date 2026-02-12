<?php

namespace App\Models;

use CodeIgniter\Model;

class LabsModel extends Model
{
    protected $table = 'labs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lab', 'deskripsi'];
}