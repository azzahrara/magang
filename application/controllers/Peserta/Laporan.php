<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekmasuk();
    }

    public function index()
    {
        //echo 'selamat datang ' . $data['user2']['nama_pm'];
        $data['title'] = 'Peserta | Laporan';
        $data['user2'] = $this->Model_peserta->getuser();
        $id_pm = $data['user2']['id_pm'];
        $ket = ['id_pm' => $id_pm];
        //ambil data laporan yang sesuai dengan id peserta yang lagi login
        $data['lap'] = $this->Model_peserta->getspecdata('laporan_mingguan', $ket);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar_p');
        $this->load->view('peserta/laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Peserta | Tambah Laporan';
        $data['user2'] = $this->Model_peserta->getuser();
        $id_pm = $data['user2']['id_pm'];
        $this->form_validation->set_rules('tgllap', 'Tanggal Laporan', 'required');
        $this->form_validation->set_rules('isilap', 'Isi Laporan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar_p');
            $this->load->view('peserta/laporan/v_tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $doklap = $_FILES['doklap']['name'];
            if ($doklap) {
                $config['upload_path'] = './assets/dokumen/lap_ming';
                $config['allowed_types'] = 'pdf|docx';
                $config['max_size']     = '3000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('doklap')) {
                    $dok_lap_ming = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  File gagal diunggah </div>');
                    redirect('peserta/laporan/tambah');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  File tidak memenuhi kebutuhan </div>');
                redirect('peserta/laporan/tambah');
            }
            $data = [
                'id_lap_ming' => $this->Model_peserta->idlap(),
                'tgl_lap_ming' => $this->input->post('tgllap'),
                'isi_lap_ming' => htmlspecialchars($this->input->post('isilap')),
                'dok_lap_ming' => $dok_lap_ming,
                'id_pm' => $id_pm
            ];
            //var_dump($data);
            $this->Model_peserta->insert_data($data, 'laporan_mingguan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Laporan Tersimpan </div>');
            redirect('peserta/laporan');
        }
    }

    public function detail($id_lap_ming)
    {
        $data['title'] = 'Peserta | Detail Laporan';
        $ket = ['id_lap_ming' => $id_lap_ming];
        $getdetail = $this->Model_peserta->getdetail('laporan_mingguan', $ket);
        $data['detail'] = $getdetail;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar_p');
        $this->load->view('peserta/laporan/v_detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_lap_ming)
    {
        $data['title'] = 'Peserta | Edit Laporan';
        //ambil detail laporan sesuai id yang dipilih
        $ket = ['id_lap_ming' => $id_lap_ming];
        $getdetail = $this->Model_peserta->getdetail('laporan_mingguan', $ket);
        $data['detail'] = $getdetail;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar_p');
        $this->load->view('peserta/laporan/v_edit', $data);
        $this->load->view('templates/footer');
    }

    public function simpanedit()
    {
        $id_lap_ming = $this->input->post('id_lap_ming');
        $ket = ['id_lap_ming' => $id_lap_ming];
        $getdetail = $this->Model_peserta->getdetail('laporan_mingguan', $ket);
        $doklap = $_FILES['doklap']['name'];
        if ($doklap) {
            $config['upload_path'] = './assets/dokumen/lap_ming';
            $config['allowed_types'] = 'pdf|docx';
            $config['max_size']     = '3000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('doklap')) {
                $filelama = $getdetail->dok_lap_ming;
                unlink(FCPATH . '/assets/dokumen/lap_ming/' . $filelama);
                $dok_lap_ming = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  File gagal diunggah </div>');
                redirect('peserta/laporan/detail/' . $id_lap_ming);
            }
        } else {
            $dok_lap_ming = $getdetail->dok_lap_ming;
        }
        $data = [
            'tgl_lap_ming' => $this->input->post('tgllap'),
            'isi_lap_ming' => htmlspecialchars($this->input->post('isilap')),
            'dok_lap_ming' => $dok_lap_ming,
        ];
        $this->Model_peserta->updata('laporan_mingguan', $data, $ket);
        //$this->Model_peserta->updata('laporan_mingguan', $data, $ket);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Laporan diubah! </div>');
        redirect('peserta/laporan/detail/' . $id_lap_ming);
    }

    function hapus($id_lap_ming)
    {
        $ket = ['id_lap_ming' => $id_lap_ming];
        $this->Model_peserta->hapus('laporan_mingguan', $ket);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Laporan dihapus! </div>');
        redirect('peserta/laporan');
    }

    public function blok()
    {
        echo "blok";
    }
}
