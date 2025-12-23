<?php

namespace App\Controllers;

use App\Models\PermohonanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Download extends BaseController
{
    protected $permohonanModel;

    public function __construct()
    {
        $this->permohonanModel = new PermohonanModel();
    }

    public function file($kode)
    {
        $permohonan = $this->permohonanModel
            ->where('kode', $kode)
            ->first();

        if (!$permohonan) {
            throw new PageNotFoundException('Data permohonan tidak ditemukan.');
        }

        // ❌ Belum selesai
        if ($permohonan['status'] !== 'Selesai') {
            return redirect()->to('/tracking')
                ->with('error', 'Data belum tersedia untuk diunduh.');
        }

        // ❌ Sudah pernah download
        if ($permohonan['file_diunduh'] == 1) {
            return redirect()->to('/tracking')
                ->with('error', 'File sudah pernah diunduh.');
        }

        // ❌ File tidak ada
        $path = WRITEPATH . 'uploads/data_bidang/' . $permohonan['file_data'];

        if (!file_exists($path)) {
            return redirect()->to('/tracking')
                ->with('error', 'File tidak ditemukan di server.');
        }

        // ✅ TANDAI SUDAH DOWNLOAD
        $this->permohonanModel->update($permohonan['id'], [
            'file_diunduh' => 1
        ]);

        // ✅ DOWNLOAD FILE
        return $this->response->download($path, null)
                             ->setFileName($permohonan['file_data']);
    }
}
