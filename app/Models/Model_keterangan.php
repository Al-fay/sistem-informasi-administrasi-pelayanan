<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_keterangan extends Model
{
    protected $table = 'keterangan';

    public function all_data()
    {
        return $this->db->table('keterangan')
            ->join('pemohon', 'pemohon.id_pemohon = keterangan.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = keterangan.id_pengguna', 'left')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function user_keterangan()
    {
        return $this->db->table('keterangan')
            ->join('pemohon', 'pemohon.id_pemohon = keterangan.id_pemohon', 'left')
            ->where('keterangan.id_pemohon', session()->get('id_pemohon'))
            ->get()->getResult();
    }

    public function add($data)
    {
        $this->db->table('keterangan')->insert($data);
    }

    public function detail_keterangan($id_keterangan)
    {
        return $this->db->table('keterangan')
            ->join('pemohon', 'pemohon.id_pemohon = keterangan.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = keterangan.id_pengguna', 'left')
            ->where('id_keterangan', $id_keterangan)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('keterangan')
            ->where('id_keterangan', $data['id_keterangan'])
            ->update($data);
    }

    //cetak laporan
    public function laporanperperiode($tglawal, $tglakhir)
    {
        return $this->db->table('keterangan')
            ->where('tanggal >=', $tglawal)
            ->where('tanggal <=', $tglakhir)
            ->get()->getResult();
    }

    public function belum_diproses()
    {
        return $this->db->table('keterangan')
            ->join('pemohon', 'pemohon.id_pemohon = keterangan.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = keterangan.id_pengguna', 'left')
            ->where('status = "1"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function terima()
    {
        return $this->db->table('keterangan')
            ->join('pemohon', 'pemohon.id_pemohon = keterangan.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = keterangan.id_pengguna', 'left')
            ->where('status = "2"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function tolak()
    {
        return $this->db->table('keterangan')
            ->join('pemohon', 'pemohon.id_pemohon = keterangan.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = keterangan.id_pengguna', 'left')
            ->where('status = "3"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }
}
