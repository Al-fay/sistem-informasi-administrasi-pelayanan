<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pemohon extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('pemohon')->where([
            'username' => $username,
            'password' => sha1($password),
        ])->get()->getRowArray();
    }

    public function all_data()
    {
        return $this->db->table('pemohon')
            ->get()->getResult();
    }

    public function belum_verifikasi()
    {
        return $this->db->table('pemohon')
            ->where('status_akun = "1"')
            ->get()->getResult();
    }

    public function terima_verifikasi()
    {
        return $this->db->table('pemohon')
            ->where('status_akun = "2"')
            ->get()->getResult();
    }

    public function tolak_verifikasi()
    {
        return $this->db->table('pemohon')
            ->where('status_akun = "3"')
            ->get()->getResult();
    }

    public function add($data)
    {
        $this->db->table('pemohon')->insert($data);
    }

    public function edit_user($id_pemohon)
    {
        return $this->db->table('pemohon')
            ->where('id_pemohon', $id_pemohon)->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('pemohon')
            ->where('id_pemohon', $data['id_pemohon'])
            ->update($data);
    }
}
