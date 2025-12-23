<?php

namespace App\Controllers;

use App\Models\PermohonanModel;

class Grafik extends BaseController
{
    protected $permohonanModel;

    public function __construct()
    {
        $this->permohonanModel = new PermohonanModel();
    }

    // Halaman grafik untuk user/admin
    public function index()
    {
        // Ambil data survei yang sudah diisi
        $data['survei'] = $this->permohonanModel
            ->where('survey_diisi', 1)
            ->findAll();

        return view('grafik', $data);
    }

    // Jika mau submit survey lewat grafik (opsional)
    public function submitSurvey()
    {
        // Bisa diisi nanti sesuai kebutuhan
    }
}
