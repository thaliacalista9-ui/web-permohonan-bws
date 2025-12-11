<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminLogin extends BaseController
{
    public function index()
    {
        return view('admin/login');
    }

    public function auth()
    {
        $session = session();
        $adminModel = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // CARI USER BERDASARKAN USERNAME
        $admin = $adminModel->where('username', $username)->first();

        if ($admin) {
            // CEK PASSWORD MENGGUNAKAN password_verify
            if (password_verify($password, $admin['password'])) {

                $sessionData = [
                    'admin_id' => $admin['id'],
                    'username' => $admin['username'],
                    'role'     => $admin['role'],
                    'logged_in' => true
                ];

                $session->set($sessionData);
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah!');
                return redirect()->to('/admin/login');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan!');
            return redirect()->to('/admin/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
