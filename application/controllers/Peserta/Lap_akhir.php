<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lap_akhir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekmasuk();
    }

    public function index()
    {
        $data['title'] = 'Peserta | Laporan Akhir';
        $data['user2'] = $this->Model_peserta->getuser();
        $id_pm = $data['user2']['id_pm'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar_p');
        $this->load->view('peserta/laporan_akhir/index', $data);
        $this->load->view('templates/footer');
    }

    public function blok()
    {
        echo "blok";
    }
}
