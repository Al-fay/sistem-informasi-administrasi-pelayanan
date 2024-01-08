<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_kematian extends Model
{
    protected $table = 'kematian';

    public function all_data()
    {
        return $this->db->table('kematian')
            ->join('pemohon', 'pemohon.id_pemohon = kematian.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = kematian.id_pengguna', 'left')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function user_kematian()
    {
        return $this->db->table('kematian')
            ->join('pemohon', 'pemohon.id_pemohon = kematian.id_pemohon', 'left')
            ->where('kematian.id_pemohon', session()->get('id_pemohon'))
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function tambah($data)
    {
        $this->db->table('kematian')->insert($data);
    }

    public function detail_kematian($id_meninggal)
    {
        return $this->db->table('kematian')
            ->select('*, DATE_FORMAT(tgl_meninggal, "%w") AS hari_meninggal2')
            ->join('pemohon', 'pemohon.id_pemohon = kematian.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = kematian.id_pengguna', 'left')
            ->where('id_meninggal', $id_meninggal)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('kematian')
            ->where('id_meninggal', $data['id_meninggal'])
            ->update($data);
    }

    //cetak laporan
    public function laporanperperiode($tglawal, $tglakhir)
    {
        return $this->db->table('kematian')
            ->where('tanggal >=', $tglawal)
            ->where('tanggal <=', $tglakhir)
            ->get()->getResult();
    }

    public function belum_diproses()
    {
        return $this->db->table('kematian')
            ->join('pemohon', 'pemohon.id_pemohon = kematian.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = kematian.id_pengguna', 'left')
            ->where('status = "1"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function terima()
    {
        return $this->db->table('kematian')
            ->join('pemohon', 'pemohon.id_pemohon = kematian.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = kematian.id_pengguna', 'left')
            ->where('status = "2"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function tolak()
    {
        return $this->db->table('kematian')
            ->join('pemohon', 'pemohon.id_pemohon = kematian.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = kematian.id_pengguna', 'left')
            ->where('status = "3"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }
}
