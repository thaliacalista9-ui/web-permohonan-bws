<?php

namespace App\Models;
use CodeIgniter\Model;

class PermohonanModel extends Model
{
    protected $table = 'permohonan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama','ktp','email','whatsapp','pekerjaan','alamat',
        'jenis_data','tujuan','catatan','file_ktp','file_surat',
        'no_surat','kode','status','assigned_to'
    ];

    protected $useTimestamps = true;        
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
