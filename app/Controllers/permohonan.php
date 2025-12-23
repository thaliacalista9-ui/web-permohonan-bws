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
        $data = [
            'nama'             => $this->request->getPost('nama') ?? '-',
            'ktp'              => $this->request->getPost('ktp') ?? '-',
            'email'            => $this->request->getPost('email') ?? '-',
            'whatsapp'         => $this->request->getPost('whatsapp') ?? '-',
            'pekerjaan'        => $this->request->getPost('pekerjaan') ?? '-',
            'alamat'           => $this->request->getPost('alamat') ?? '-',
            'jenis_data'       => $this->request->getPost('jenis_data') ?? '-',
            'lokasi_data'      => $this->request->getPost('lokasi_data') ?? '-',
            'periode_data'     => $this->request->getPost('periode_data') ?? '-',
            'tujuan'           => $this->request->getPost('tujuan') ?? '-',
            'catatan'          => $this->request->getPost('catatan') ?? '-',
            'file_ktp'         => $namaKtp,
            'file_surat'       => $namaSurat,
            'no_surat'         => $noSurat,
            'kode'             => $trackingCode,
            'status'           => 'Diproses',
            'file_data'        => null,
            'catatan_admin'    => null,
            'file_diunduh'     => 0,
            'survey_diisi'     => 0,
            'assigned_to'      => null,
            'alasan_penolakan' => null,
            'diputuskan_oleh'  => null,
            'diputuskan_pada'  => null,
        ];

        $model->insert($data);

        // ===========================
        // KIRIM EMAIL KE PEMOHON
        // ===========================
        $email = \Config\Services::email();

        $email->setFrom(config('Email')->fromEmail, config('Email')->fromName);
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
            <p>Hormat kami,<br><b>BWS Sumatera V</b></p>
        ");

        if (! $email->send()) {
            log_message('error', $email->printDebugger(['headers']));
        }

        return redirect()->to('/tracking')->with(
            'success',
            'Permohonan berhasil dikirim. Kode tracking telah dikirim ke email Anda.'
        );
    }

    public function tolak($id)
    {
        $model = new PermohonanModel();
        $permohonan = $model->find($id);

        if (!$permohonan) {
            return redirect()->back()->with('error', 'Permohonan tidak ditemukan.');
        }

        $alasan = $this->request->getPost('alasan_penolakan') ?? '-';
        $data = [
            'status' => 'Ditolak',
            'alasan_penolakan' => $alasan,
            'diputuskan_oleh' => 'Admin',
            'diputuskan_pada' => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        // Kirim email pemberitahuan
        $email = \Config\Services::email();
        $email->setFrom(config('Email')->fromEmail, config('Email')->fromName);
        $email->setTo($permohonan['email']);
        $email->setSubject('Permohonan Data Ditolak');
        $email->setMessage("
            <p>Yth. Bapak/Ibu <b>{$permohonan['nama']}</b>,</p>
            <p>Permohonan data Anda <b>telah ditolak</b>.</p>
            <p><b>Kode Tracking:</b> {$permohonan['kode']}</p>
            <p><b>Alasan Penolakan:</b></p>
            <p>$alasan</p>
            <br>
            <p>Hormat kami,<br><b>BWS Sumatera V</b></p>
        ");
        $email->send();

        return redirect()->back()->with('success', 'Permohonan berhasil ditolak dan email telah dikirim.');
    }

    public function selesai($id)
    {
        $model = new PermohonanModel();
        $permohonan = $model->find($id);

        if (!$permohonan) {
            return redirect()->back()->with('error', 'Permohonan tidak ditemukan.');
        }

        $data = [
            'status' => 'Selesai',
            'diputuskan_oleh' => 'Admin',
            'diputuskan_pada' => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        // Kirim email pemberitahuan
        $email = \Config\Services::email();
        $email->setFrom(config('Email')->fromEmail, config('Email')->fromName);
        $email->setTo($permohonan['email']);
        $email->setSubject('Permohonan Data Selesai');
        $email->setMessage("
            <p>Yth. Bapak/Ibu <b>{$permohonan['nama']}</b>,</p>
            <p>Permohonan data Anda <b>telah selesai diproses</b>.</p>
            <p><b>Kode Tracking:</b> {$permohonan['kode']}</p>
            <br>
            <p>Hormat kami,<br><b>BWS Sumatera V</b></p>
        ");
        $email->send();

        return redirect()->back()->with('success', 'Permohonan berhasil diselesaikan dan email telah dikirim.');
    }
}
