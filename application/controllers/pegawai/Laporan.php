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
        $data['title'] = 'Pegawai | Laporan';
        $data['sub'] = 'Laporan Mingguan Peserta Bimbingan';
        $data['user'] = $this->Model_pegawai->getuser();
        $nip = $data['user']['nip'];
        $ket1 = 'laporan_mingguan.id_pm = peserta_magang.id_pm';
        $ket = 'peserta_magang.pembimbing_balai';
        $getdetail = $this->Model_pegawai->join2arrinner('peserta_magang', 'laporan_mingguan', $ket1, $ket, $nip);
        $data['detail'] = $getdetail;
        //var_dump($getdetail);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_lap_ming)
    {
        //echo 'selamat datang ' . $data['user2']['nama_pm'];
        $data['title'] = 'Pegawai | Detail Laporan';
        $data['jns'] = '1';
        $data['user'] = $this->Model_pegawai->getuser();
        $nip = $data['user']['nip'];
        $ket1 = 'laporan_mingguan.id_pm = peserta_magang.id_pm';
        $ket = 'peserta_magang.pembimbing_balai';
        $ketw = 'laporan_mingguan.id_lap_ming';
        $getdetail = $this->Model_pegawai->join2inner2w('peserta_magang', 'laporan_mingguan', $ket1, $ket, $nip, $ketw, $id_lap_ming);
        $data['detail'] = $getdetail;
        // var_dump($getdetail);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/laporan/v_detail', $data);
        $this->load->view('templates/footer');
    }

    public function review()
    {
        // $idrev = $this->Model_pegawai->idrev();
        $idnp = $this->Model_pegawai->idnp();
        $id_lap_ming = $this->input->post('id');
        $ket = ['id_lap_ming' => $id_lap_ming];
        $ket2 = ['id_aksi' => $id_lap_ming];
        // $getdetail = $this->Model_pegawai->getdetail('laporan_mingguan', $ket);
        $getdetailnotif = $this->Model_pegawai->getdetail('notif_peserta', $ket2);
        $datarev = [
            'review_lap' => htmlspecialchars($this->input->post('isirev')),
            'status_rev' => 'sent',
        ];

        if (!$getdetailnotif) {
            $datanp = [
                'id_np' => $idnp,
                'jenis' => 'Review',
                'id_aksi' => $id_lap_ming,
                // 'id_pm' => $getdetail->id_pm,
                'status_np' => 'sent',
            ];
            $this->Model_pegawai->insert('notif_peserta', $datanp);
        } //else {
        //     $datanp = [
        //         'id_np' => $idnp,
        //         'jenis' => 'PReview',
        //         'id_aksi' => $id_lap_ming,
        //         'id_pm' => $getdetail->id_pm,
        //         'status_np' => 'sent',
        //     ];
        // }
        $this->Model_peserta->updata('laporan_mingguan', $datarev, $ket);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Review Tersimpan</div>');
        redirect('pegawai/laporan/detail/' . $id_lap_ming);
    }

    public function hapus($id_lap_ming)
    {
        $ket = ['id_lap_ming' => $id_lap_ming];
        $datarev = [
            'review_lap' => NULL,
            'status_rev' => NULL,
        ];
        $this->Model_peserta->updata('laporan_mingguan', $datarev, $ket);
        $ket1 = ['id_aksi' => $id_lap_ming];
        $this->Model_pegawai->hapus('notif_peserta', $ket1);
        $this->Model_peserta->updata('laporan_mingguan', $datarev, $ket);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Review Dihapus</div>');
        redirect('pegawai/laporan/detail/' . $id_lap_ming);
    }

    public function laporan_seluruh_peserta()
    {
        //echo 'selamat datang ' . $data['user2']['nama_pm'];
        //echo 'selamat datang ' . $data['user2']['nama_pm'];
        $data['title'] = 'Pegawai | Laporan';
        $data['sub'] = 'Laporan Mingguan Seluruh Peserta';
        $data['user'] = $this->Model_pegawai->getuser();
        $data['nip'] = $data['user']['nip'];
        $ket1 = 'peserta_magang.id_pm = laporan_mingguan.id_pm';
        $getdetail = $this->Model_pegawai->alljoin2arrinner('laporan_mingguan', 'peserta_magang', $ket1);
        $data['details'] = $getdetail;
        // var_dump($data['detail']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function det_lap($id_lap_ming)
    {
        //echo 'selamat datang ' . $data['user2']['nama_pm'];
        $data['title'] = 'Pegawai | Detail Laporan';
        $data['user'] = $this->Model_pegawai->getuser();
        $data['jns'] = '0';
        // $nip = $data['user']['nip'];
        $ket1 = 'laporan_mingguan.id_pm = peserta_magang.id_pm';
        $ketw = 'laporan_mingguan.id_lap_ming';
        $getdetail = $this->Model_pegawai->join2inner('peserta_magang', 'laporan_mingguan', $ket1, $ketw, $id_lap_ming);
        $data['detail'] = $getdetail;
        // var_dump($getdetail);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/laporan/v_detail', $data);
        $this->load->view('templates/footer');
    }
}
