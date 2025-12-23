<?php

namespace App\Controllers;

use App\Models\PermohonanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class AdminBidang extends BaseController
{
    protected $permohonanModel;

    public function __construct()
    {
        $this->permohonanModel = new PermohonanModel();
    }

    // ==================================================
    // DASHBOARD ADMIN BIDANG
    // ==================================================
    public function dashboard()
    {
        $adminId = session()->get('admin_id');

        if (!$adminId) {
            return redirect()->to('/admin/login');
        }

        $data['permohonan'] = $this->permohonanModel
            ->where('assigned_to', $adminId)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('admin/dashboard_bidang', $data);
    }

    // ==================================================
    // DETAIL PERMOHONAN
    // ==================================================
    public function detail($id)
    {
        $permohonan = $this->permohonanModel->find($id);

        if (!$permohonan) {
            throw PageNotFoundException::forPageNotFound('Permohonan tidak ditemukan');
        }

        return view('admin/detail_permohonan_bidang', [
            'permohonan' => $permohonan
        ]);
    }

    // ==================================================
    // PROSES PERMOHONAN + UPLOAD FILE
    // ==================================================
    public function proses($id)
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('admin/bidang/dashboard'));
        }

        $permohonan = $this->permohonanModel->find($id);
        if (!$permohonan) {
            return redirect()->to(base_url('admin/bidang/dashboard'))
                             ->with('error', 'Data tidak ditemukan');
        }

        // ================= DATA UPDATE =================
        $dataUpdate = [
            'status'          => $this->request->getPost('status'),
            'catatan_admin'   => $this->request->getPost('catatan_admin'),
            'diputuskan_oleh' => session()->get('admin_id'),
            'diputuskan_pada' => date('Y-m-d H:i:s')
        ];

        // ================= UPLOAD FILE =================
        $file = $this->request->getFile('file_data');

        if ($file && $file->isValid() && !$file->hasMoved()) {

            $uploadPath = FCPATH . 'uploads/data_bidang/';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $namaFile = $file->getRandomName();

            if (!$file->move($uploadPath, $namaFile)) {
                return redirect()->back()->with('error', 'File gagal diupload.');
            }

            $dataUpdate['file_data'] = $namaFile;
        }

        // ================= UPDATE DATABASE =================
        $this->permohonanModel->update($id, $dataUpdate);

        return redirect()->to(base_url('admin/bidang/dashboard'))
                         ->with('success', 'Permohonan berhasil diproses');
    }

    // ==================================================
    // DOWNLOAD FILE
    // ==================================================
    public function download($id)
    {
        $permohonan = $this->permohonanModel->find($id);

        if (!$permohonan || !$permohonan['file_data']) {
            throw PageNotFoundException::forPageNotFound('File tidak ditemukan');
        }

        return $this->response->download(FCPATH . 'uploads/data_bidang/' . $permohonan['file_data'], null);
    }
}
