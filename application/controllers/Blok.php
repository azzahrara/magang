<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekmasuk();
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $jenis = $this->session->userdata('jenis');

            if ($jenis == 'peserta') {
                redirect('peserta/laporan');
            } elseif ($jenis == 'pegawai') {
                redirect('pegawai/dashboard');
            }
        }
    }
}
