<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{


    public function index()
    {
        //echo 'selamat datang ' . $data['user2']['nama_pm'];
        $data['title'] = 'test';
        $detail = $this->Model_peserta->get_data('tugas');
        $data['detail'] = $detail;
        $this->load->view('templates/header', $data);
        $this->load->view('test', $data);
        // echo date('Y-m-d');
    }
}
