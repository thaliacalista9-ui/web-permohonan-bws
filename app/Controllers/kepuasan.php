<?php

namespace App\Controllers;

use App\Models\PermohonanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Kepuasan extends BaseController
{
    protected $permohonanModel;

    public function __construct()
    {
        $this->permohonanModel = new PermohonanModel();
    }

    /**
     * Tampilkan form survei kepuasan
     */
    public function isi($kode)
    {
        $permohonan = $this->permohonanModel
            ->where('kode', $kode)
            ->first();

        if (!$permohonan) {
            throw new PageNotFoundException('Data permohonan tidak ditemukan.');
        }

        // ❌ File belum diunduh
        if ($permohonan['file_diunduh'] != 1) {
            return redirect()->to('/tracking')
                ->with('error', 'Silakan unduh file terlebih dahulu sebelum mengisi survei.');
        }

        // ❌ Survey sudah diisi
        if ($permohonan['survey_diisi'] == 1) {
            return redirect()->to('/tracking')
                ->with('success', 'Anda sudah mengisi survei kepuasan.');
        }

        // Tampilkan form survey
        return view('survey_form', [
            'permohonan' => $permohonan
        ]);
    }

    /**
     * Simpan jawaban survei
     */
    public function simpan($kode)
    {
        $permohonan = $this->permohonanModel
            ->where('kode', $kode)
            ->first();

        if (!$permohonan) {
            throw new PageNotFoundException('Data permohonan tidak ditemukan.');
        }

        // Validasi hanya bisa sekali
        if ($permohonan['survey_diisi'] == 1) {
            return redirect()->to('/tracking')
                ->with('success', 'Anda sudah mengisi survei kepuasan.');
        }

        $validation = $this->validate([
            'rating' => 'required|integer|greater_than[0]|less_than_equal_to[5]',
            'komentar' => 'permit_empty|string|max_length[500]',
        ]);

        if (!$validation) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Simpan jawaban survei (misal di kolom tambahan survey_rating & survey_komentar)
        $this->permohonanModel->update($permohonan['id'], [
            'survey_diisi' => 1,
            'survey_rating' => $this->request->getPost('rating'),
            'survey_komentar' => $this->request->getPost('komentar'),
        ]);

        return redirect()->to('/tracking')
            ->with('success', 'Terima kasih, survei kepuasan Anda telah tersimpan.');
    }
}
