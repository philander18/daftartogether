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
        $page = 1;

        $data = [
            'judul' => 'Pendaftaran',
            'listgereja' => $this->DaftarModel->listgereja(),
            'peserta' => $this->DaftarModel->searchnama("", $this->jumlahlist, 0)['tabel'],
            'pagination' => $this->pagination($page, $this->DaftarModel->searchnama("", $this->jumlahlist, 0)['lastpage']),
            'last' => $this->DaftarModel->searchnama("", $this->jumlahlist, 0)['lastpage'],
            'jumlah' => $this->DaftarModel->searchnama("", $this->jumlahlist, 0)['jumlah'],
            'page' => $page,
        ];
        return view('Pendaftaran/index', $data);
    }

    public function getdata()
    {
        echo json_encode($this->DaftarModel->getDatabyid($_POST['id'])[0]);
    }

    public function searchDataPeserta()
    {
        $page = $_POST['page'];
        $keyword = $_POST['keyword'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $peserta = $this->DaftarModel->searchnama($keyword, $this->jumlahlist, $index)['tabel'];
        $last = $this->DaftarModel->searchnama($keyword, $this->jumlahlist, $index)['lastpage'];
        $jumlah = $this->DaftarModel->searchnama($keyword, $this->jumlahlist, $index)['jumlah'];
        $pagination = $this->pagination($page, $last);
        $data = [
            'peserta' => $peserta,
            'pagination' => $pagination,
            'last' => $last,
            'jumlah' => $jumlah,
            'page' => $page,
            // 'summary' => $summary,
        ];
        echo view('Pendaftaran/Tabel/peserta', $data);
    }

    public function pagination($page, $lastpage)
    {
        $pagination = [
            'first' => false,
            'previous' => false,
            'next' => false,
            'last' => false
        ];
        if ($lastpage == 1) {
            $pagination['number'] = [1];
        } elseif ($lastpage == 2) {
            $pagination['number'] = [1, 2];
        } elseif ($lastpage == 3) {
            $pagination['number'] = [1, 2, 3];
        } elseif ($lastpage == 4) {
            $pagination['number'] = [1, 2, 3, 4];
        } elseif ($lastpage == 5) {
            $pagination['number'] = [1, 2, 3, 4, 5];
        } else {
            if ($page >= 1 and $page <= 3) {
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [1, 2, 3];
            } elseif ($page >= $lastpage - 2 and $page <= $lastpage) {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['number'] = [$lastpage - 2, $lastpage - 1, $lastpage];
            } else {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [$page - 1, $page, $page + 1];
            }
        };
        $pagination['page'] = $page;
        return $pagination;
    }
}
