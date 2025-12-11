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
        $trackingCode = 'BWS-' . date('Ymd') . '-' . rand(1000,9999);

        // ===========================
        // GENERATE NOMOR SURAT
        // Format: 123/PD-BWS/V/2025
        // ===========================
        $bulanRomawi = [
            1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',6=>'VI',
            7=>'VII',8=>'VIII',9=>'IX',10=>'X',11=>'XI',12=>'XII'
        ];

        $last = $model->orderBy('id', 'DESC')->first();
        $nextNomor = ($last ? $last['id'] + 1 : 1);

        $noSurat = $nextNomor . "/PD-BWS/" . $bulanRomawi[date('n')] . "/" . date('Y');

        // ===========================
        // FILE UPLOAD
        // ===========================
        $fileKtp = $this->request->getFile('file_ktp');
        $fileSurat = $this->request->getFile('file_surat');

        $namaKtp = $fileKtp && $fileKtp->isValid() ? $fileKtp->getRandomName() : null;
        $namaSurat = $fileSurat && $fileSurat->isValid() ? $fileSurat->getRandomName() : null;

        if ($namaKtp) $fileKtp->move('uploads/ktp', $namaKtp);
        if ($namaSurat) $fileSurat->move('uploads/surat', $namaSurat);

        // ===========================
        // SIMPAN DATA
        // ===========================
        $model->insert([
            'nama'        => $this->request->getPost('nama'),
            'ktp'         => $this->request->getPost('ktp'),
            'email'       => $this->request->getPost('email'),
            'whatsapp'    => $this->request->getPost('whatsapp'),
            'pekerjaan'   => $this->request->getPost('pekerjaan'),
            'alamat'      => $this->request->getPost('alamat'),
            'jenis_data'  => $this->request->getPost('jenis_data'),
            'tujuan'      => $this->request->getPost('tujuan'),
            'catatan'     => $this->request->getPost('catatan'),
            'file_ktp'    => $namaKtp,
            'file_surat'  => $namaSurat,
            'no_surat'    => $noSurat,
            'kode'        => $trackingCode,  // <-- INI PENTING
            'status'      => 'Diproses'
        ]);

        // ===========================
        // KIRIM EMAIL
        // ===========================
        $email = \Config\Services::email();

        $email->setTo($this->request->getPost('email'));
        $email->setSubject("Kode Tracking Permohonan Data");
        $email->setMessage("
            Terima kasih telah mengajukan permohonan data.<br><br>
            Berikut kode tracking Anda:<br>
            <h3>$trackingCode</h3>
            Gunakan kode ini untuk melacak status permohonan Anda.
        ");

        $email->send();

        return redirect()->to('/tracking')->with(
            'success',
            "Permohonan berhasil dikirim! Kode tracking telah dikirim ke email Anda."
        );
    }
}
