<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
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

		$pegawai = $this->Model_daftar->get_data('data_pegawai');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		//$this->form_validation->set_rules('jk', 'Jenis_Kelamin', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[peserta_magang.email_pm]');
		$this->form_validation->set_rules('nowa', 'Nomor Whatsapp', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis Magang', 'required');
		$this->form_validation->set_rules('asalinstansi', 'Asal Instansi/Universitas/Sekolah', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		// $this->form_validation->set_rules('pi', 'Pembimbing Instansi/Universitas/Sekolah', 'required');
		// $this->form_validation->set_rules('nowapi', 'Nomor Whatsapp Pembimbing', 'required');
		$this->form_validation->set_rules('tglmli', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tglsls', 'Tanggal Selesai', 'required');
		$this->form_validation->set_rules('pb', 'Pembimbing Balai', 'required');
		$this->form_validation->set_rules('ks1', 'Kata Sandi', 'required|trim|min_length[8]|matches[ks2]', [
			'matches' => 'Kata sandi tidak sama',
			'min_length' => 'Kata sandi terlalu pendek'
		]);
		$this->form_validation->set_rules('ks2', 'Kata Sandi', 'required|trim|matches[ks1]');

		if ($this->form_validation->run() == false) { //kl form validasi gagal
			$data['title'] = "Magang Balitklimat";
			$data['pegawai'] = $pegawai;
			$this->load->view('templates/header', $data);
			$this->load->view('v_daftar');
		} else {
			//bikin buat pengajuan
			$pengajuan = $_FILES['pengajuan']['name'];
			$penerimaan = $_FILES['penerimaan']['name'];
			if ($pengajuan) {
				$config['upload_path'] = './assets/dokumen/surat';
				$config['allowed_types'] = 'pdf|doc';
				$config['max_size']     = '3000';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('pengajuan')) {
					$s_pengajuan_pm = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  File gagal diunggah </div>');
					redirect('daftar');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  File tidak memenuhi kebutuhan </div>');
				redirect('daftar');
			}
			//bikin buat penerimaans
			if ($penerimaan) {
				$config['upload_path'] = './assets/dokumen/surat';
				$config['allowed_types'] = 'pdf|doc';
				$config['max_size']     = '3000';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('penerimaan')) {
					$s_penerimaan_pm = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  File gagal diunggah </div>');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">  File tidak memenuhi kebutuhan </div>');
			}
			$email = $this->input->post('email');
			$data = [
				'id_pm' => $this->Model_daftar->idpm(),
				'nama_pm' => htmlspecialchars($this->input->post('nama')),
				// 'jk_pm' => $this->input->post('jk'),
				'email_pm' => htmlspecialchars($this->input->post('email')),
				'no_wa_pm' => htmlspecialchars($this->input->post('nowa')),
				'jns_magang' => $this->input->post('jenis'),
				'asal_instansi_pm' => htmlspecialchars($this->input->post('asalinstansi')),
				'jurusan_pm' => htmlspecialchars($this->input->post('jurusan')),
				'pi_pm' => htmlspecialchars($this->input->post('pi')),
				'no_wa_pi_pm' => htmlspecialchars($this->input->post('nowapi')),
				'tgl_mli_pm' => $this->input->post('tglmli'),
				'tgl_sls_pm' => $this->input->post('tglsls'),
				's_pengajuan_pm' => $s_pengajuan_pm,
				's_penerimaan_pm' => $s_penerimaan_pm,
				'pembimbing_balai' => $this->input->post('pb'),
				'kata_sandi_pm' => password_hash($this->input->post('ks1'), PASSWORD_DEFAULT),
				'status_pm' => 'berlangsung'
			];
			//var_dump($data);
			$this->Model_daftar->insert_data($data, 'peserta_magang');
			//$this->db->insert('peserta_magang', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data anda sudah tersimpan! Silakan login ' . $email . ' sebagai peserta </div>');
			redirect('masuk');
		}
	}

	// public function yaya()
	// {
	// 	$pegawai = $this->Model_daftar->get_data('data_pegawai');
	// 	var_dump($pegawai);
	// 	//echo date('ym');
	// }
}
