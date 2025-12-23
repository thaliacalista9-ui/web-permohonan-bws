<?php

namespace App\Controllers;

use App\Models\PermohonanModel;

class AdminBidang extends BaseController
{
    protected $permohonanModel;

    public function __construct()
    {
        $this->permohonanModel = new PermohonanModel();
    }

    // ================= DASHBOARD ADMIN BIDANG =================
    public function dashboard()
    {
        $adminId = session()->get('admin_id');

        $data['permohonan'] = $this->permohonanModel
            ->where('assigned_to', $adminId)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('admin/dashboard_bidang', $data);
    }

    // ================= DETAIL PERMOHONAN =================
    public function detail($id)
    {
        $data['permohonan'] = $this->permohonanModel->find($id);

        if (!$data['permohonan']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/detail_permohonan_bidang', $data);
    }

    // ================= PROSES PERMOHONAN =================
    public function proses($id)
    {
        $file = $this->request->getFile('file_data');
        $namaFile = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads/data_bidang', $namaFile);
        }

        $this->permohonanModel->update($id, [
            'status'         => $this->request->getPost('status'),
            'catatan_admin'  => $this->request->getPost('catatan_admin'),
            'file_data'      => $namaFile,
            'diputuskan_oleh'=> session()->get('admin_id'),
            'diputuskan_pada'=> date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/bidang/dashboard');
    }
}
