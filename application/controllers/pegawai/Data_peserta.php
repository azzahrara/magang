<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekmasuk();
    }

    public function index()
    {
        //echo 'selamat datang ' . $data['user2']['nama_pm'];
        $data['title'] = 'Pegawai | Data Peserta';
        $data['user'] = $this->Model_pegawai->getuser();
        $nip = $data['user']['nip'];
        $ket = ['pembimbing_balai' => $nip];
        $data['ps'] = $this->Model_peserta->getspecdata('peserta_magang', $ket);
        //var_dump($data['ps']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/peserta/index', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id_pm)
    {
        $data['title'] = 'Pegawai | Detail Peserta';
        $ket = ['id_pm' => $id_pm];
        $getdetail = $this->Model_peserta->getdetail('peserta_magang', $ket);
        $data['lap'] = $this->Model_peserta->getspecdata('laporan_mingguan', $ket);
        $data['detail'] = $getdetail;
        //var_dump($data['detail']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/peserta/v_detail', $data);
        $this->load->view('templates/footer');
    }
}
