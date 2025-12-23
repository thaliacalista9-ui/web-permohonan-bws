<?php

namespace App\Controllers;

use App\Models\PermohonanModel;

class Tracking extends BaseController
{
    // =========================
    // HALAMAN AWAL TRACKING
    // =========================
    public function index()
    {
        return view('tracking', [
            'not_found' => false,
            'hasil'     => null
        ]);
    }

    // =========================
    // CARI DATA TRACKING
    // =========================
    public function cari()
    {
        $model = new PermohonanModel();

        // 🔹 Jika habis download → auto load ulang
        if (session()->getFlashdata('after_download')) {
            $kode = session()->getFlashdata('after_download');
        } else {
            $kode = $this->request->getPost('kode');
        }

        if (!$kode) {
            return redirect()->to('/tracking');
        }

        $hasil = $model->where('kode', $kode)->first();

        if (!$hasil) {
            return view('tracking', [
                'not_found' => true,
                'hasil'     => null
            ]);
        }

        /**
         * ===============================
         * LOGIKA STATUS TRACKING
         * ===============================
         * status:
         * - Diproses
         * - Selesai
         * - Ditolak
         *
         * field tambahan:
         * - file_diunduh (0/1)
         * - survey_diisi (0/1)
         */

        // Default
        $hasil['boleh_download'] = false;
        $hasil['wajib_survey']   = false;

        // 🔹 Selesai & belum download
        if (
            $hasil['status'] === 'Selesai'
            && ($hasil['file_diunduh'] ?? 0) == 0
        ) {
            $hasil['boleh_download'] = true;
        }

        // 🔹 Sudah download tapi belum survey
        if (
            $hasil['status'] === 'Selesai'
            && ($hasil['file_diunduh'] ?? 0) == 1
            && ($hasil['survey_diisi'] ?? 0) == 0
        ) {
            $hasil['wajib_survey'] = true;
        }

        // 🔹 Ditolak & belum survey
        if (
            $hasil['status'] === 'Ditolak'
            && ($hasil['survey_diisi'] ?? 0) == 0
        ) {
            $hasil['wajib_survey'] = true;
        }

        return view('tracking', [
            'not_found' => false,
            'hasil'     => $hasil
        ]);
    }

    // =========================
    // DOWNLOAD FILE HASIL
    // =========================
    public function download($kode)
    {
        $model = new PermohonanModel();

        $data = $model->where('kode', $kode)->first();

        if (!$data || empty($data['file_data'])) {
            return redirect()->to('/tracking')
                ->with('error', 'File tidak ditemukan.');
        }

        // 🔹 lokasi file SESUAI punyamu
        $path = FCPATH . 'uploads/data_bidang/' . $data['file_data'];

        if (!file_exists($path)) {
            return redirect()->to('/tracking')
                ->with('error', 'File tidak ada di server.');
        }

        // 🔹 tandai sudah diunduh
        $model->update($data['id'], [
            'file_diunduh' => 1
        ]);

        // 🔹 trigger agar halaman tracking reload & munculin survey
        session()->setFlashdata('after_download', $kode);

        return $this->response->download($path, null);
    }

    // =========================
    // FORM SURVEI KEPUASAN
    // =========================
    public function isiKepuasan($kode)
    {
        $model = new PermohonanModel();

        $data = $model->where('kode', $kode)->first();

        if (!$data) {
            return redirect()->to('/tracking');
        }

        return view('kepuasan_form', [
            'data' => $data
        ]);
    }

    // =========================
    // SIMPAN SURVEI KEPUASAN
    // =========================
    public function simpanKepuasan()
    {
        $model = new PermohonanModel();

        $kode = $this->request->getPost('kode');

        if (!$kode) {
            return redirect()->to('/tracking');
        }

        $model->where('kode', $kode)->set([
            'survey_diisi'   => 1,
            'rating_layanan' => $this->request->getPost('rating'),
            'kritik_saran'   => $this->request->getPost('kritik_saran')
        ])->update();

        return redirect()->to('/tracking')
            ->with('success', 'Terima kasih atas penilaian Anda.');
    }
}
