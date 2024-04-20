<?php

namespace App\Controllers;

use App\Models\DaftarModel;
use DateTime;

class Home extends BaseController
{
    protected $DaftarModel;
    protected $jumlahlist = 10;
    public function __construct()
    {
        $this->DaftarModel = new DaftarModel();
    }

    public function index(): string
    {
        if (!is_null($this->request->getVar('hp'))) {
            $date = new DateTime();
            $date = $date->format('Y-m-d H:i:s');
            $datatambah = [
                'nama' => $this->request->getVar('nama'),
                'hp' => $this->request->getVar('hp'),
                'gender' => $this->request->getVar('gender'),
                'gereja' => $this->request->getVar('gereja'),
                'updated_at' => $date
            ];
            if ($this->DaftarModel->insert($datatambah)) {
                session()->setFlashdata('pesan', 'Pendaftaran nama  ' . $this->request->getVar('nama') . ' Berhasil.');
            } else {
                session()->setFlashdata('pesan', 'Pendaftaran nama ' . $this->request->getVar('nama') . ' Gagal.');
            }
        }
        $data = [
            'judul' => 'Pendaftaran',
            'listgereja' => $this->DaftarModel->listgereja(),
        ];
        return view('Pendaftaran/index', $data);
    }
}
