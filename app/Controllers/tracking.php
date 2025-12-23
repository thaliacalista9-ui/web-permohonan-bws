<?php

namespace App\Controllers;

use App\Models\PermohonanModel;

class Tracking extends BaseController
{
    public function index()
    {
        return view('tracking', [
            'not_found' => false,
            'hasil'     => null
        ]);
    }

    public function cari()
    {
        $kode  = $this->request->getPost('kode');
        $model = new PermohonanModel();

        // =====================================
        // CARI BERDASARKAN FIELD `kode`
        // (SESUAI CONTROLLER PERMOHONAN KAMU)
        // =====================================
        $hasil = $model->where('kode', $kode)->first();

        if (!$hasil) {
            return view('tracking', [
                'not_found' => true,
                'hasil'     => null
            ]);
        }

        /**
         * =====================================
         * LOGIKA ALUR TRACKING (PROFESIONAL)
         * =====================================
         * status:
         * - Diproses
         * - Diserahkan
         * - Selesai
         * - Ditolak
         *
         * tambahan field (disarankan):
         * - file_diunduh (0/1)
         * - survey_diisi (0/1)
         */

        // Default aman
        $hasil['boleh_download'] = false;
        $hasil['wajib_survey']   = false;

        // 🔹 JIKA DATA SELESAI & BELUM DOWNLOAD
        if (
            $hasil['status'] === 'Selesai'
            && ($hasil['file_diunduh'] ?? 0) == 0
        ) {
            $hasil['boleh_download'] = true;
        }

        // 🔹 JIKA SUDAH DOWNLOAD TAPI BELUM SURVEY
        if (
            $hasil['status'] === 'Selesai'
            && ($hasil['file_diunduh'] ?? 0) == 1
            && ($hasil['survey_diisi'] ?? 0) == 0
        ) {
            $hasil['wajib_survey'] = true;
        }

        // 🔹 JIKA DITOLAK → WAJIB SURVEY
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
}
