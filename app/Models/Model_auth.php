<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('pengguna')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function all_data()
    {
        return $this->db->table('pengguna')
            ->get()->getResult();
    }

    public function add($data)
    {
        $this->db->table('pengguna')->insert($data);
    }

    public function edit_user($id_pengguna)
    {
        return $this->db->table('pengguna')
            ->where('id_pengguna', $id_pengguna)->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('pengguna')
            ->where('id_pengguna', $data['id_pengguna'])
            ->update($data);
    }
}
