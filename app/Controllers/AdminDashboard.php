<?php

namespace App\Controllers;

use App\Models\PermohonanModel;
use App\Models\AdminModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class AdminDashboard extends BaseController
{
    protected $permohonanModel;
    protected $adminModel;

    public function __construct()
    {
        $this->permohonanModel = new PermohonanModel();
        $this->adminModel      = new AdminModel();
    }

    // =====================================
    // DASHBOARD UTAMA
    // =====================================
    public function index()
    {
        $data = [
            'permohonan' => $this->permohonanModel
                ->orderBy('created_at', 'DESC')
                ->findAll(),
            'admins' => $this->adminModel->findAll()
        ];

        return view('admin/dashboard_utama', $data);
    }

    // =====================================
    // DETAIL PERMOHONAN (FULL DATA)
    // =====================================
    public function detail($id)
    {
        $permohonan = $this->permohonanModel
            ->select('permohonan.*, admins.bidang AS bidang_admin')
            ->join('admins', 'admins.id = permohonan.assigned_to', 'left')
            ->where('permohonan.id', $id)
            ->first();

        if (!$permohonan) {
            throw new PageNotFoundException('Permohonan tidak ditemukan');
        }

        return view('admin/detail_permohonan', [
            'permohonan' => $permohonan
        ]);
    }

    // =====================================
    // APPROVE PERMOHONAN
    // =====================================
    public function approve($id)
    {
        $this->permohonanModel->update($id, [
            'status'            => 'Disetujui',
            'diputuskan_pada'   => date('Y-m-d H:i:s'),
            'diputuskan_oleh'   => session()->get('admin_id')
        ]);

        return redirect()->back()->with('success', 'Permohonan disetujui');
    }

    // =====================================
    // REJECT PERMOHONAN
    // =====================================
    public function reject($id)
    {
        $this->permohonanModel->update($id, [
            'status'             => 'Ditolak',
            'alasan_penolakan'   => $this->request->getPost('alasan_penolakan'),
            'diputuskan_pada'    => date('Y-m-d H:i:s'),
            'diputuskan_oleh'    => session()->get('admin_id')
        ]);

        return redirect()->back()->with('success', 'Permohonan ditolak');
    }

    // =====================================
    // ASSIGN KE ADMIN/BIDANG
    // =====================================
    public function assign($id)
    {
        $this->permohonanModel->update($id, [
            'assigned_to' => $this->request->getPost('assigned_to'),
            'status'      => 'Diproses'
        ]);

        return redirect()->back()->with('success', 'Permohonan berhasil di-assign');
    }
}
