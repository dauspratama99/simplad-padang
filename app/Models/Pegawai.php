<?php

namespace App\Models;

use CodeIgniter\Model;

class Pegawai extends Model
{
    public function getPegawai()
    {
        $bulder = $this->db->table('tb_pegawai');
        return $bulder->get();
    }
    public function getPegawaiDetail($id)
    {
        $bulder = $this->db->table('tb_pegawai')->where('pegawaiNip', $id);
        return $bulder->get();
    }
    public function getPegawaiNotExist($id)
    {
        $sql = "SELECT * FROM tb_pegawai WHERE NOT EXISTS (SELECT * FROM tb_temp WHERE tempNip = pegawaiNip AND tempUserId = '$id')";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    public function savePegawai($data)
    {
        $query = $this->db->table('tb_pegawai')->insert($data);
        return $query;
    }
    public function updatePegawai($data, $id)
    {
        $query = $this->db->table('tb_pegawai')->update($data, array('pegawaiNip' => $id));
        return $query;
    }
    public function deletePegawai($id)
    {
        $query = $this->db->table('tb_pegawai')->delete(array('pegawaiNip' => $id));
        return $query;
    }
}
