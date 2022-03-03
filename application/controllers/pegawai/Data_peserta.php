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
        $data['sub'] = 'Data Peserta Bimbingan';
        $data['user'] = $this->Model_pegawai->getuser();
        $nip = $data['user']['nip'];
        $ket = ['pembimbing_balai' => $nip];
        $data['ps'] = $this->Model_peserta->getspecdata('peserta_magang', $ket);
        $data['pegawai'] = $this->Model_pegawai->get_peg_pdf();
        // var_dump($data['pegawai']);
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

    public function data_seluruh_peserta()
    {
        //echo 'selamat datang ' . $data['user2']['nama_pm'];
        $data['title'] = 'Pegawai | Data Peserta';
        $data['sub'] = 'Data Seluruh Peserta Magang';
        $data['ps'] = $this->Model_peserta->get_data('peserta_magang');
        $ket1 = 'data_pegawai.nip = peserta_magang.pembimbing_balai';
        $getdetail = $this->Model_pegawai->alljoin2arrinner('peserta_magang', 'data_pegawai', $ket1);
        $data['detail'] = $getdetail;
        $data['pegawai'] = $this->Model_pegawai->get_peg_pdf();
        // var_dump($data['detail']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/peserta/index', $data);
        $this->load->view('templates/footer');
    }

    public function export_pdf2()
    {
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');
        $pdfjns = $this->input->post('pdfjns');
        $pdfpeg = $this->input->post('pdfpeg');
        if ($pdfjns == NULL and $pdfpeg == NULL) {
            if ($tglawal == NULL or $tglakhir == NULL) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Filter tidak valid!  </div>');
                redirect('pegawai/data_peserta/data_seluruh_peserta');
            } else {
                // echo "cuma buat tgl";
                $data['detail'] = $this->Model_pegawai->tgl($tglawal, $tglakhir);
                $data['tglawal'] = $tglawal;
                $data['tglakhir'] = $tglakhir;
                $data['pdfpeg'] = 'Seluruh Pegawai';
                $data['pdfjns'] = 'Seluruh Jenis';
            }
        } elseif ($pdfpeg == NULL) {
            if ($tglawal == NULL and $tglakhir == NULL) {
                $ket = [
                    'jns_magang' => $pdfjns
                ];
                // cuma buat jenis
                $data['detail'] = $this->Model_pegawai->mhs_nip($ket);
                $data['tglawal'] = 'Seluruh Tanggal';
                $data['tglakhir'] = ' ';
                $data['pdfpeg'] = 'Seluruh Pegawai';
                $data['pdfjns'] = $pdfjns;
            } elseif ($tglawal == NULL or $tglakhir == NULL) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Tanggal tidak valid!  </div>');
                redirect('pegawai/data_peserta/data_seluruh_peserta');
            } else {
                $ket = [
                    'jns_magang' => $pdfjns
                ];
                $data['detail'] = $this->Model_pegawai->tgl_mhs_nip($tglawal, $tglakhir, $ket);
                $data['tglawal'] = $tglawal;
                $data['tglakhir'] = $tglakhir;
                $data['pdfpeg'] = 'Seluruh Pegawai';
                $data['pdfjns'] = $pdfjns;
            }
        } elseif ($pdfjns == NULL) {
            if ($tglawal == NULL and $tglakhir == NULL) {
                $ket = [
                    'pembimbing_balai' => $pdfpeg
                ];
                $data['detail'] = $this->Model_pegawai->mhs_nip($ket);
                // cuma buat peg
                $data['tglawal'] = 'Seluruh Tanggal';
                $data['tglakhir'] = ' ';
                $data['pdfpeg'] = $pdfpeg;
                $data['pdfjns'] = 'Seluruh Jenis';
            } elseif ($tglawal == NULL or $tglakhir == NULL) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Tanggal tidak valid!  </div>');
                redirect('pegawai/data_peserta/data_seluruh_peserta');
            } else {
                $ket = [
                    'pembimbing_balai' => $pdfpeg
                ];;
                $data['detail'] = $this->Model_pegawai->tgl_mhs_nip($tglawal, $tglakhir, $ket);
                $data['tglawal'] = $tglawal;
                $data['tglakhir'] = $tglakhir;
                $data['pdfpeg'] = $pdfpeg;
                $data['pdfjns'] = 'Seluruh Jenis';
            }
        } else {
            if ($tglawal == NULL and $tglakhir == NULL) {
                $ket = [
                    'jns_magang' => $pdfjns,
                    'pembimbing_balai' => $pdfpeg
                ];
                $data['detail'] = $this->Model_pegawai->mhs_nip($ket);
                $data['tglawal'] = 'Seluruh Tanggal';
                $data['tglakhir'] = ' ';
                $data['pdfpeg'] = $pdfpeg;
                $data['pdfjns'] = $pdfjns;
            } elseif ($tglawal == NULL or $tglakhir == NULL) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Tanggal tidak valid!  </div>');
                redirect('pegawai/data_peserta/data_seluruh_peserta');
            } else {
                $ket = [
                    'jns_magang' => $pdfjns,
                    'pembimbing_balai' => $pdfpeg
                ];
                $data['detail'] = $this->Model_pegawai->tgl_mhs_nip($tglawal, $tglakhir, $ket);
                $data['tglawal'] = $tglawal;
                $data['tglakhir'] = $tglakhir;
                $data['pdfpeg'] = $pdfpeg;
                $data['pdfjns'] = $pdfjns;
            }
        }
        // var_dump($data['detail']);
        $data['title'] = 'Daftar Peserta Magang';
        $nama_file = 'peserta_magang';
        $size = 'A4';
        $orientation = "landscape";
        $this->load->library('generatepdf');
        $html = $this->load->view('laporan_pdf', $data, true);
        $this->generatepdf->generate($html, $nama_file, $size, $orientation);
    }

    // public function test()
    // {
    //     $data['title_pdf'] = 'Laporan Penjualan Toko Kita';
    //     $nama_file = 'laporan_penjualan_toko_kita';
    //     $size = 'A4';
    //     $orientation = "landscape";
    //     $this->load->library('pdfgenerator');

    //     $html = $this->load->view('laporan_pdf', $data, true);
    //     $this->pdfgenerator->generate($html, $nama_file, $size, $orientation);
    // }
    // public function test()
    // {
    //     $data = [
    //         'pembimbing_balai' => '196710081994032013',
    //         'jns_magang' => 'Mahasiswa',
    //     ];
    //     var_dump($this->Model_pegawai->mhs_nip($data));
    //     echo "<br>";
    //     echo "INI ATAS ITU YANG PEMBIMBING BALAI MA MAHASISWA";
    //     echo "<br>";
    //     $data2 = [
    //         'jns_magang' => 'Mahasiswa',
    //     ];
    //     var_dump($this->Model_pegawai->mhs_nip($data2));
    //     echo "<br>";
    //     echo "INI ATAS ITU YANG PEMBIMBING BALAI MA MAHASISWA";
    //     echo "<br>";
    //     $data3 = [
    //         'pembimbing_balai' => '196710081994032013',
    //     ];
    //     var_dump($this->Model_pegawai->mhs_nip($data3));
    //     echo "<br>";
    //     // echo "INI ATAS ITU YANG PEMBIMBING BALAI MA MAHASISWA";
    //     // echo "<br>";
    //     // var_dump($this->Model_pegawai->mhs('2022-02-11', '2022-02-25', $data2));
    // }
}
