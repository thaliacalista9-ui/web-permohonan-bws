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
        $kode = $this->request->getPost('kode');
        $model = new PermohonanModel();

        $hasil = $model->where('tracking_kode', $kode)->first();

        if (!$hasil) {
            return view('tracking', [
                'not_found' => true,
                'hasil'     => null
            ]);
        }

        return view('tracking', [
            'not_found' => false,
            'hasil'     => $hasil
        ]);
    }
}
