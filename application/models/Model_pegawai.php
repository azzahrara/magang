<?php
class Model_pegawai extends CI_model
{
    public function idp()
    {
        $sql = "SELECT MAX(MID(id_tugas,7,2)) AS nourut FROM tugas
                WHERE MID(id_tugas,3,4) = DATE_FORMAT(CURDATE(), '%y%m')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $nom = ((int)$row->nourut) + 1;
            $no = sprintf("%'.02d", $nom);
        } else {
            $no = "01";
        }
        $id_tugas = "PN" . date('ym') . $no;
        return $id_tugas;
    }

    // public function idrev()
    // {
    //     $sql = "SELECT MAX(MID(id_rev_lap,8,2)) AS nourut FROM rev_lap
    //             WHERE MID(id_rev_lap,4,4) = DATE_FORMAT(CURDATE(), '%y%m')";
    //     $query = $this->db->query($sql);
    //     if ($query->num_rows() > 0) {
    //         $row = $query->row();
    //         $nom = ((int)$row->nourut) + 1;
    //         $no = sprintf("%'.02d", $nom);
    //     } else {
    //         $no = "01";
    //     }
    //     $id_rev_lap = "REV" . date('ym') . $no;
    //     return $id_rev_lap;
    // }

    public function idnp()
    {
        $sql = "SELECT MAX(MID(id_np,7,3)) AS nourut FROM notif_peserta
                WHERE MID(id_np,3,4) = DATE_FORMAT(CURDATE(), '%y%m')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $nom = ((int)$row->nourut) + 1;
            $no = sprintf("%'.03d", $nom);
        } else {
            $no = "001";
        }
        $id_np = "NP" . date('ym') . $no;
        return $id_np;
    }

    public function get_data($table)
    {
        return $this->db->get($table)->result();
    }

    // ambil data user yang login
    public function getuser()
    {
        $query = $this->db->get_where('data_pegawai', ['email' => $this->session->userdata('email')])->row_array();
        return $query;
    }

    //untuk ambil seluruh data yang sama dengan $ket (lebih dari 1 baris)
    public function getspecdata($table, $ket)
    {
        $query = $this->db->get_where($table, $ket)->result();
        return $query;
    }

    //ambil data dari suatu baris sesuai $ket
    public function getdetail($table, $ket)
    {
        $query = $this->db->get_where($table, $ket)->row();
        return $query;
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    //update data di tabel sesuai dengan keterangan
    public function updata($table, $data, $ket)
    {
        $this->db->where($ket);
        $this->db->update($table, $data);
    }

    public function hapus($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function join3($table, $table2, $table3, $ktabel21, $ktable31, $ket, $param)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'left');
        $this->db->join($table3, $ktable31, 'left');
        $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->result();
    }

    public function join2($table, $table2, $ktabel21, $ket, $param)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'left');
        $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->row();
    }

    public function join2inner($table, $table2, $ktabel21, $ket, $param)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'inner');
        $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->row();
    }

    //inner with 2 kondisi
    public function join2inner2w($table, $table2, $ktabel21, $ket, $param, $ket2 = NULL, $param2 = NULL)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'inner');
        $this->db->where($ket, $param);
        $this->db->where($ket2, $param2);
        $query = $this->db->get();
        return $query->row();
    }

    public function join2arr($table, $table2, $ktabel21, $ket, $param)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'left');
        $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->result();
    }

    public function join2arrinner($table, $table2, $ktabel21, $ket, $param)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'inner');
        $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->result();
    }
    public function alljoin2arrinner($table, $table2, $ktabel21)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'inner');
        // $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_peg_pdf()
    {

        $this->db->select('nip, nama_pegawai');
        $this->db->from('peserta_magang');
        $this->db->join('data_pegawai', 'data_pegawai.nip = peserta_magang.pembimbing_balai', 'inner');
        $this->db->group_by('nip');
        // $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->result();
    }

    public function join3arr($table, $table2, $table3, $ktabel21, $ktable31, $ket, $param)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'left');
        $this->db->join($table3, $ktable31, 'left');
        $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->result();
    }

    public function tgl($tglawal, $tglakhir)
    {
        $this->db->select('*');
        $this->db->from('peserta_magang');
        $this->db->where("tgl_mli_pm BETWEEN '$tglawal' AND '$tglakhir'");
        $this->db->join('data_pegawai', 'data_pegawai.nip = peserta_magang.pembimbing_balai');
        $this->db->order_by('tgl_mli_pm', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function mhs_nip($ket)
    {
        $this->db->select('*');
        $this->db->from('peserta_magang');
        $this->db->join('data_pegawai', 'data_pegawai.nip = peserta_magang.pembimbing_balai');
        $this->db->where($ket);
        $this->db->order_by('tgl_mli_pm', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function tgl_mhs_nip($tglawal, $tglakhir, $ket)
    {
        $this->db->select('*');
        $this->db->from('peserta_magang');
        $this->db->join('data_pegawai', 'data_pegawai.nip = peserta_magang.pembimbing_balai');
        $this->db->where("tgl_mli_pm BETWEEN '$tglawal' AND '$tglakhir'");
        $this->db->order_by('tgl_mli_pm', 'ASC');
        $this->db->where($ket);
        $query = $this->db->get();
        return $query->result();
    }
}
