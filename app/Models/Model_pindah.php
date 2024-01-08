<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pindah extends Model
{
    public function all_data()
    {
        return $this->db->table('pindah')
            ->join('pemohon', 'pemohon.id_pemohon = pindah.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pindah.id_pengguna', 'left')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function user_pindah()
    {
        return $this->db->table('pindah')
            ->join('pemohon', 'pemohon.id_pemohon = pindah.id_pemohon', 'left')
            ->where('pindah.id_pemohon', session()->get('id_pemohon'))
            ->get()->getResult();
    }

    public function add($data)
    {
        $this->db->table('pindah')->insert($data);
    }

    public function detail_pindah($id_pindah)
    {
        return $this->db->table('pindah')
            ->join('pemohon', 'pemohon.id_pemohon = pindah.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pindah.id_pengguna', 'left')
            ->where('id_pindah', $id_pindah)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('pindah')
            ->where('id_pindah', $data['id_pindah'])
            ->update($data);
    }

    //cetak laporan
    public function laporanperperiode($tglawal, $tglakhir)
    {
        return $this->db->table('pindah')
            ->where('tanggal >=', $tglawal)
            ->where('tanggal <=', $tglakhir)
            ->get()->getResult();
    }

    public function belum_diproses()
    {
        return $this->db->table('pindah')
            ->join('pemohon', 'pemohon.id_pemohon = pindah.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pindah.id_pengguna', 'left')
            ->where('status = "1"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function terima()
    {
        return $this->db->table('pindah')
            ->join('pemohon', 'pemohon.id_pemohon = pindah.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pindah.id_pengguna', 'left')
            ->where('status = "2"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function tolak()
    {
        return $this->db->table('pindah')
            ->join('pemohon', 'pemohon.id_pemohon = pindah.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pindah.id_pengguna', 'left')
            ->where('status = "3"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }
}
