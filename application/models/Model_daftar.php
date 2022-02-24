<?php
class Model_daftar extends CI_model
{
    public function get_data($table)
    {
        return $this->db->get($table)->result();
    }

    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function idpm()
    {
        $sql = "SELECT MAX(MID(id_pm,5,3)) AS nourut FROM peserta_magang 
                WHERE MID(id_pm,3,2) = DATE_FORMAT(CURDATE(), '%y')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $nom = ((int)$row->nourut) + 1;
            $no = sprintf("%'.03d", $nom);
        } else {
            $no = "001";
        }
        $id_pm = "PM" . date('y') . $no;
        return $id_pm;
    }
}
