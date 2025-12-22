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

    // ==================================================
    // DASHBOARD ADMIN UTAMA
    // ==================================================
    public function index()
    {
        $data = [
            'permohonan' => $this->permohonanModel
                ->orderBy('created_at', 'DESC')
                ->findAll(),

            // hanya admin bidang (untuk assign)
            'admins' => $this->adminModel
                ->where('role', 'bidang')
                ->findAll()
        ];

        return view('admin/dashboard_utama', $data);
    }

    // ==================================================
    // DETAIL PERMOHONAN
    // ==================================================
    public function detail($id)
    {
        $permohonan = $this->permohonanModel
            ->select('permohonan.*, admins.username AS nama_admin, admins.bidang')
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

    // ==================================================
    // APPROVE PERMOHONAN
    // Status: Diproses
    // ==================================================
    public function approve($id)
    {
        $this->permohonanModel->update($id, [
            'status'            => 'Diproses',
            'alasan_penolakan'  => null,
            'diputuskan_pada'   => date('Y-m-d H:i:s'),
            'diputuskan_oleh'   => session()->get('admin_id')
        ]);

        return redirect()->back()
            ->with('success', 'Permohonan disetujui dan diproses.');
    }

    // ==================================================
    // REJECT PERMOHONAN
    // Status: Ditolak
    // ==================================================
    public function reject($id)
    {
        $alasan = $this->request->getPost('alasan_penolakan');

        if (!$alasan) {
            return redirect()->back()
                ->with('error', 'Alasan penolakan wajib diisi.');
        }

        $this->permohonanModel->update($id, [
            'status'            => 'Ditolak',
            'alasan_penolakan'  => $alasan,
            'diputuskan_pada'   => date('Y-m-d H:i:s'),
            'diputuskan_oleh'   => session()->get('admin_id')
        ]);

        return redirect()->back()
            ->with('success', 'Permohonan berhasil ditolak.');
    }

    // ==================================================
    // ASSIGN KE ADMIN / BIDANG
    // Status: Diserahkan
    // ==================================================
    public function assign($id)
    {
        $assignedTo = $this->request->getPost('assigned_to');

        if (!$assignedTo) {
            return redirect()->back()
                ->with('error', 'Admin tujuan wajib dipilih.');
        }

        $this->permohonanModel->update($id, [
            'assigned_to'       => $assignedTo,
            'status'            => 'Diserahkan',
            'diputuskan_pada'   => date('Y-m-d H:i:s'),
            'diputuskan_oleh'   => session()->get('admin_id')
        ]);

        return redirect()->back()
            ->with('success', 'Permohonan berhasil dialokasikan.');
    }
}
