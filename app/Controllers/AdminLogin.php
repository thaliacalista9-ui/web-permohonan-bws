<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminLogin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    // ================= FORM LOGIN =================
    public function index()
    {
        return view('admin/login');
    }

    // ================= PROSES LOGIN =================
    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel
            ->where('username', $username)
            ->first();

        if (!$admin || !password_verify($password, $admin['password'])) {
            return redirect()->back()->with('error', 'Username atau password salah');
        }

        // ✅ SESSION RESMI
        session()->set([
            'isLogin'  => true,
            'admin_id' => $admin['id'],
            'username' => $admin['username'],
            'role'     => $admin['role'],   
            'bidang'   => $admin['bidang']  
        ]);

        // ✅ ARAHKAN SESUAI ROLE
        if ($admin['role'] === 'utama') {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/admin/bidang/dashboard');
    }

    // ================= LOGOUT =================
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
