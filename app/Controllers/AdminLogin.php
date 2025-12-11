<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminLogin extends BaseController
{
    public function index()
    {
        return view('admin/login');
    }

    // ✅ INI LOGIN ADMIN
    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new AdminModel();
        $admin = $model->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {

            session()->set([
                'isAdminLoggedIn' => true,
                'admin_id' => $admin['id'],
                'admin_name' => $admin['username']
            ]);

            // ✅ PINDAH KE DASHBOARD ADMIN
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
