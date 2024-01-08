<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_kelahiran extends Model
{
    protected $table = 'kelahiran';
    public function all_data()
    {
        return $this->db->table('kelahiran')
            ->join('pengguna', 'pengguna.id_pengguna = kelahiran.id_pengguna', 'left')
            ->join('pemohon', 'pemohon.id_pemohon = kelahiran.id_pemohon', 'left')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function user_kelahiran()
    {
        return $this->db->table('kelahiran')
            ->join('pemohon', 'pemohon.id_pemohon = kelahiran.id_pemohon', 'left')
            ->where('kelahiran.id_pemohon', session()->get('id_pemohon'))
            ->get()->getResult();
    }

    public function add($data)
    {
        $this->db->table('kelahiran')->insert($data);
    }

    public function detail_kelahiran($id_kelahiran)
    {
        return $this->db->table('kelahiran')
            ->select('*, DATE_FORMAT(tgl_kelahiran, "%w") AS hari_kelahiran2')
            ->join('pemohon', 'pemohon.id_pemohon = kelahiran.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = kelahiran.id_pengguna', 'left')
            ->where('id_kelahiran', $id_kelahiran)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('kelahiran')
            ->where('id_kelahiran', $data['id_kelahiran'])
            ->update($data);
    }

    //cetak laporan
    public function laporanperperiode($tglawal, $tglakhir)
    {
        return $this->db->table('kelahiran')
            ->where('tanggal >=', $tglawal)
            ->where('tanggal <=', $tglakhir)
            ->get()->getResult();
    }

    public function belum_diproses()
    {
        return $this->db->table('kelahiran')
            ->join('pengguna', 'pengguna.id_pengguna = kelahiran.id_pengguna', 'left')
            ->join('pemohon', 'pemohon.id_pemohon = kelahiran.id_pemohon', 'left')
            ->where('status_kelahiran = "1"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function terima()
    {
        return $this->db->table('kelahiran')
            ->join('pengguna', 'pengguna.id_pengguna = kelahiran.id_pengguna', 'left')
            ->join('pemohon', 'pemohon.id_pemohon = kelahiran.id_pemohon', 'left')
            ->where('status_kelahiran = "2"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function tolak()
    {
        return $this->db->table('kelahiran')
            ->join('pengguna', 'pengguna.id_pengguna = kelahiran.id_pengguna', 'left')
            ->join('pemohon', 'pemohon.id_pemohon = kelahiran.id_pemohon', 'left')
            ->where('status_kelahiran = "3"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }
}
