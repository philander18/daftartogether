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
        $data = [
            'judul' => 'Pendaftaran',
            'listgereja' => $this->DaftarModel->listgereja(),
        ];
        return view('Pendaftaran/index', $data);
    }
}
