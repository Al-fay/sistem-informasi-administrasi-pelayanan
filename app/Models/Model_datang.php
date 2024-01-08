<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_datang extends Model
{
    public function all_data()
    {
        return $this->db->table('datang')
            ->join('pemohon', 'pemohon.id_pemohon = datang.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = datang.id_pengguna', 'left')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function user_datang()
    {
        return $this->db->table('datang')
            ->join('pemohon', 'pemohon.id_pemohon = datang.id_pemohon', 'left')
            ->where('datang.id_pemohon', session()->get('id_pemohon'))
            ->get()->getResult();
    }

    public function add($data)
    {
        $this->db->table('datang')->insert($data);
    }

    public function detail_datang($id_datang)
    {
        return $this->db->table('datang')
            ->join('pemohon', 'pemohon.id_pemohon = datang.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = datang.id_pengguna', 'left')
            ->where('id_datang', $id_datang)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('datang')
            ->where('id_datang', $data['id_datang'])
            ->update($data);
    }

    //cetak laporan
    public function laporanperperiode($tglawal, $tglakhir)
    {
        return $this->db->table('datang')
            ->where('tanggal >=', $tglawal)
            ->where('tanggal <=', $tglakhir)
            ->get()->getResult();
    }

    public function belum_diproses()
    {
        return $this->db->table('datang')
            ->join('pemohon', 'pemohon.id_pemohon = datang.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = datang.id_pengguna', 'left')
            ->where('status = "1"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function terima()
    {
        return $this->db->table('datang')
            ->join('pemohon', 'pemohon.id_pemohon = datang.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = datang.id_pengguna', 'left')
            ->where('status = "2"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function tolak()
    {
        return $this->db->table('datang')
            ->join('pemohon', 'pemohon.id_pemohon = datang.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = datang.id_pengguna', 'left')
            ->where('status = "3"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }
}
