<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PermohonanModel;

class Permohonan extends Controller
{
    public function index()
    {
        return view('permohonan/create');
    }

    public function submit()
    {
        $model = new PermohonanModel();

        // ===========================
        // GENERATE KODE TRACKING
        // ===========================
        $trackingCode = 'BWS-' . date('Ymd') . '-' . rand(1000, 9999);

        // ===========================
        // GENERATE NOMOR SURAT
        // Format: 123/PD-BWS/V/2025
        // ===========================
        $bulanRomawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
        ];

        $last = $model->orderBy('id', 'DESC')->first();
        $nextNomor = ($last ? $last['id'] + 1 : 1);
        $noSurat = $nextNomor . "/PD-BWS/" . $bulanRomawi[date('n')] . "/" . date('Y');

        // ===========================
        // FILE UPLOAD
        // ===========================
        $fileKtp   = $this->request->getFile('file_ktp');
        $fileSurat = $this->request->getFile('file_surat');

        $namaKtp   = ($fileKtp && $fileKtp->isValid()) ? $fileKtp->getRandomName() : null;
        $namaSurat = ($fileSurat && $fileSurat->isValid()) ? $fileSurat->getRandomName() : null;

        if ($namaKtp) {
            $fileKtp->move('uploads/ktp', $namaKtp);
        }

        if ($namaSurat) {
            $fileSurat->move('uploads/surat', $namaSurat);
        }

        // ===========================
        // SIMPAN DATA KE DATABASE
        // ===========================
        $model->insert([
            'nama'         => $this->request->getPost('nama'),
            'ktp'          => $this->request->getPost('ktp'),
            'email'        => $this->request->getPost('email'),
            'whatsapp'     => $this->request->getPost('whatsapp'),
            'pekerjaan'    => $this->request->getPost('pekerjaan'),
            'alamat'       => $this->request->getPost('alamat'),
            'jenis_data'   => $this->request->getPost('jenis_data'),
            'lokasi_data'  => $this->request->getPost('lokasi_data'),
            'periode_data' => $this->request->getPost('periode_data'),
            'tujuan'       => $this->request->getPost('tujuan'),
            'catatan'      => $this->request->getPost('catatan'),
            'file_ktp'     => $namaKtp,
            'file_surat'   => $namaSurat,
            'no_surat'     => $noSurat,
            'kode'         => $trackingCode,
            'status'       => 'Diproses'
        ]);

        // ===========================
        // KIRIM EMAIL KE PEMOHON
        // ===========================
        $email = \Config\Services::email();

        $email->setFrom(
            config('Email')->fromEmail,
            config('Email')->fromName
        );

        $email->setTo($this->request->getPost('email'));
        $email->setSubject('Permohonan Data Berhasil Diajukan');

        $email->setMessage("
            <p>Yth. Bapak/Ibu <b>{$this->request->getPost('nama')}</b>,</p>

            <p>Permohonan data Anda telah <b>berhasil diajukan</b>.</p>

            <p><b>Kode Tracking Permohonan:</b></p>
            <h2 style='color:#0A2A43;'>$trackingCode</h2>

            <p>Gunakan kode tersebut untuk memantau status permohonan melalui:</p>
            <p><a href='" . base_url('tracking') . "'>" . base_url('tracking') . "</a></p>

            <br>
            <p>Hormat kami,<br>
            <b>BWS Sumatera V</b></p>
        ");

        if (! $email->send()) {
            log_message('error', $email->printDebugger(['headers']));
        }

        // ===========================
        // REDIRECT
        // ===========================
        return redirect()->to('/tracking')->with(
            'success',
            'Permohonan berhasil dikirim. Kode tracking telah dikirim ke email Anda.'
        );
    }
}

