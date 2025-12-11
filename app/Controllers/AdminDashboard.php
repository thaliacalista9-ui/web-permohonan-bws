<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PermohonanModel;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->get('role') !== 'utama') {
            return redirect()->to('/admin/login');
        }

        $permohonanModel = new PermohonanModel();
        $adminModel = new AdminModel();

        $data['permohonan'] = $permohonanModel->findAll();
        $data['admins'] = $adminModel->where('role', 'bidang')->findAll();

        return view('admin/dashboard_utama', $data);
    }

    public function bidang()
    {
        $session = session();

        if ($session->get('role') !== 'bidang') {
            return redirect()->to('/admin/login');
        }

        $permohonanModel = new PermohonanModel();

        $data['permohonan'] = $permohonanModel
            ->where('assigned_to', $session->get('admin_id'))
            ->findAll();

        return view('admin/dashboard_bidang', $data);
    }

    public function assign($id_permohonan)
    {
        $permohonanModel = new PermohonanModel();

        $assigned_to = $this->request->getPost('assigned_to');

        $permohonanModel->update($id_permohonan, [
            'assigned_to' => $assigned_to,
            'status' => 'Ditugaskan'
        ]);

        return redirect()->to('/admin/dashboard');
    }
}
