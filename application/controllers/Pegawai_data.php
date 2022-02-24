<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekmasuk();
    }

    public function index()
    {
        $data['user'] = $this->Model_pegawai->getuser();

        echo 'selamat datang ' . $data['user']['nama_pegawai'];
    }

    public function blok()
    {
        echo "blok";
    }
}
