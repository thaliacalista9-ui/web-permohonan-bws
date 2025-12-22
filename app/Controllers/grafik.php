<?php

namespace App\Controllers;

use App\Models\SurveyModel;

class Grafik extends BaseController
{
    protected $surveyModel;

    public function __construct()
    {
        $this->surveyModel = new SurveyModel();
    }

    public function index()
    {
        $data['rata'] = $this->surveyModel->getRataRata();
        $data['jumlah'] = $this->surveyModel->countAll();

        return view('grafik/index', $data);
    }

    public function submitSurvey()
    {
        $this->surveyModel->insert([
            'nilai' => $this->request->getPost('nilai'),
            'komentar' => $this->request->getPost('komentar')
        ]);

        return redirect()->to('/grafik');
    }
}
