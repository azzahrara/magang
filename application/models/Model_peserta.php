<?php
class Model_peserta extends CI_model
{
    public function idlap()
    {
        $sql = "SELECT MAX(MID(id_lap_ming,7,2)) AS nourut FROM laporan_mingguan
                WHERE MID(id_lap_ming,3,4) = DATE_FORMAT(CURDATE(), '%y%m')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $nom = ((int)$row->nourut) + 1;
            $no = sprintf("%'.02d", $nom);
        } else {
            $no = "01";
        }
        $id_lap_ming = "LM" . date('ym') . $no;
        return $id_lap_ming;
    }

    //ambil seluruh data dari tabel
    public function get_data($table)
    {
        return $this->db->get($table)->result();
    }

    //ambol data user yang sesuai dengan email user
    public function getuser()
    {
        $query = $this->db->get_where('peserta_magang', ['email_pm' => $this->session->userdata('email')])->row_array();
        return $query;
    }

    //ambil banyak data yang sesuai dengan keterangan
    public function getspecdata($table, $ket)
    {
        $query = $this->db->get_where($table, $ket)->result();
        return $query;
    }

    //ambil suatu data yang sesuai dengan keterangan
    public function getdetail($table, $ket)
    {
        $query = $this->db->get_where($table, $ket)->row();
        return $query;
    }

    //insert data ke tabel
    public function insert_data($data, $table)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    //update data di tabel sesuai dengan keterangan
    public function updata($table, $data, $ket)
    {
        $this->db->where($ket);
        $this->db->update($table, $data);
    }

    //hapus data di tabel sesuai dengan keterangan
    public function hapus($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //join 2 tabel, left, yang hasilnya 1 baris
    public function join2($table, $table2, $ktabel21, $ket, $param)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'left');
        $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->row();
    }

    //join 2 tabel, left, yang ahsilngya banyak
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
    public function join2inner($table, $table2, $ktabel21, $ket, $param)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'inner');
        $this->db->where($ket, $param);
        $query = $this->db->get();
        return $query->row();
    }
    public function join2arrinner2w($table, $table2, $ktabel21, $ket, $param, $ket2, $param2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'inner');
        $this->db->where($ket, $param);
        $this->db->where($ket2, $param2);
        $query = $this->db->get();
        return $query->result();
    }

    //join 2 tabel, yang ada 2 keterangan where, left, yang hasilnya satu baris
    public function join2where($table, $table2, $ket21, $ketparam1, $param1, $ketparam2, $param2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ket21, 'left');
        $this->db->where($ketparam1, $param1);
        $this->db->where($ketparam2, $param2);
        $query = $this->db->get();
        return $query->row();
    }

    //join 3 tabel yg hasilnya nnati satu
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

    //join 3 tabel yg hasilnya nnati banyak
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
    public function join3arrinner2w($table, $table2, $table3, $ktabel21, $ktable31, $ket, $param, $ket2, $param2)
    {

        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ktabel21, 'inner');
        $this->db->join($table3, $ktable31, 'inner');
        $this->db->where($ket, $param);
        $this->db->where($ket2, $param2);
        $query = $this->db->get();
        return $query->result();
    }

    //join 3 tabel, hasilnya 1, 2 keterangan
    public function join3where($table, $table2, $table3, $ket21, $ket31, $ketparam1, $param1, $ketparam2, $param2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $ket21, 'left');
        $this->db->join($table3, $ket31, 'left');
        $this->db->where($ketparam1, $param1);
        $this->db->where($ketparam2, $param2);
        $query = $this->db->get();
        return $query->row();
    }







    // Join 3 tabel yang hasilnya banyak
    // function join3($table, $table2, $table3, $ktabel21, $ktable31, $ket, $param)
    // {

    //     $this->db->select('*');
    //     $this->db->from($table);
    //     $this->db->join($table2, $ktabel21, 'left');
    //     $this->db->join($table3, $ktable31, 'left');
    //     $this->db->where($ket, $param);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

}
