<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekmasuk();
    }

    public function index()
    {
        $data['user2'] = $this->Model_peserta->getspec();
        echo 'selamat datang ' . $data['user2']['nama_pm'];
    }

    public function lapming()
    {
    }

    public function blok()
    {
        echo "blok";
    }
}
