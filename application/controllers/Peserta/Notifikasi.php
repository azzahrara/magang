<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekmasuk();
    }

    public function index()
    {
        $data['title'] = "Peserta | Notifikasi";
        $data['user2'] = $this->Model_peserta->getuser();
        $id_pm = $data['user2']['id_pm'];
        $ket1 = 'notif_peserta.id_aksi = laporan_mingguan.id_lap_ming';
        $ket2 = 'laporan_mingguan.id_pm';
        $notiflap = $this->Model_pegawai->join2arrinner('laporan_mingguan', 'notif_peserta', $ket1, $ket2, $id_pm);
        $keta = 'notif_peserta.id_aksi = detail_tugas.id_det_tugas';
        $ketb = 'detail_tugas.id_pm';
        $notiftgs = $this->Model_peserta->join2arrinner('detail_tugas', 'notif_peserta', $keta, $ketb, $id_pm);
        $data['notiflap'] = $notiflap;
        $data['notiftgs'] = $notiftgs;
        // var_dump($notiftgs);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar_p');
        $this->load->view('peserta/notifikasi/v_notifikasi', $data);
        $this->load->view('templates/footer');
    }

    public function laporan($id_np)
    {
        $ket = ['id_np' => $id_np];
        $detail = $this->Model_peserta->getdetail('notif_peserta', $ket);
        $id_lap_ming = $detail->id_aksi;
        $ket2 = ['id_lap_ming' => $id_lap_ming];
        $data = [
            'status_np' => 'read',
        ];
        $data2 = [
            'status_rev' => 'read',
        ];
        $this->Model_peserta->updata('notif_peserta', $data, $ket);
        $this->Model_peserta->updata('laporan_mingguan', $data2, $ket2);
        redirect('peserta/laporan/detail/' . $id_lap_ming);
    }

    public function penugasan($id_np)
    {
        $keta = 'detail_tugas.id_det_tugas = notif_peserta.id_aksi';
        $ketb = 'notif_peserta.id_np';
        $detail = $this->Model_peserta->join2inner('notif_peserta', 'detail_tugas', $keta, $ketb, $id_np);
        // $detail = $this->Model_peserta->getdetail('notif_peserta', $ket);
        // var_dump($detail);
        $id_tugas = $detail->id_tugas;
        $data = [
            'status_np' => 'read',
        ];
        $ket = ['id_np' => $id_np];
        $this->Model_peserta->updata('notif_peserta', $data, $ket);
        redirect('peserta/penugasan/detail/' . $id_tugas);
    }

    public function blok()
    {
        echo "blok";
    }
}
