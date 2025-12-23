<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanModel extends Model
{
    protected $table      = 'permohonan';
    protected $primaryKey = 'id';

    // Semua field yang bisa diisi
    protected $allowedFields = [
        'nama',
        'ktp',
        'email',
        'whatsapp',
        'pekerjaan',
        'alamat',
        'jenis_data',
        'lokasi_data',
        'periode_data',
        'tujuan',
        'catatan',
        'file_ktp',
        'file_surat',
        'no_surat',
        'kode',
        'status',
        'file_data',
        'catatan_admin',
        'file_diunduh',
        'survey_diisi',
        'assigned_to',
        'alasan_penolakan',
        'diputuskan_oleh',
        'diputuskan_pada'
    ];

    // Aktifkan timestamp otomatis
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Jika ada soft delete, bisa diaktifkan
    // protected $useSoftDeletes = true;
    // protected $deletedField  = 'delated_at';
}
