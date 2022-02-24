<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekmasuk();
    }

    public function index()
    {
        $data['title'] = 'Pegawai | Dashboard';
        $data['user'] = $this->Model_pegawai->getuser();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function blok()
    {
        echo "blok";
    }
}
