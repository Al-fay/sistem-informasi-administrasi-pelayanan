<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pengantar extends Model
{
    protected $table = 'pengantar';

    public function all_data()
    {
        return $this->db->table('pengantar')
            ->join('pemohon', 'pemohon.id_pemohon = pengantar.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pengantar.id_pengguna', 'left')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function user_pengantar()
    {
        return $this->db->table('pengantar')
            ->join('pemohon', 'pemohon.id_pemohon = pengantar.id_pemohon', 'left')
            ->where('pengantar.id_pemohon', session()->get('id_pemohon'))
            ->get()->getResult();
    }

    public function add($data)
    {
        $this->db->table('pengantar')->insert($data);
    }

    public function detail_pengantar($id_pengantar)
    {
        return $this->db->table('pengantar')
            ->join('pemohon', 'pemohon.id_pemohon = pengantar.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pengantar.id_pengguna', 'left')
            ->where('id_pengantar', $id_pengantar)->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('pengantar')
            ->where('id_pengantar', $data['id_pengantar'])
            ->update($data);
    }

    //cetak laporan
    public function laporanperperiode($tglawal, $tglakhir)
    {
        return $this->db->table('pengantar')
            ->where('tanggal >=', $tglawal)
            ->where('tanggal <=', $tglakhir)
            ->get()->getResult();
    }

    public function belum_diproses()
    {
        return $this->db->table('pengantar')
            ->join('pemohon', 'pemohon.id_pemohon = pengantar.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pengantar.id_pengguna', 'left')
            ->where('status = "1"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function terima()
    {
        return $this->db->table('pengantar')
            ->join('pemohon', 'pemohon.id_pemohon = pengantar.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pengantar.id_pengguna', 'left')
            ->where('status = "2"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }

    public function tolak()
    {
        return $this->db->table('pengantar')
            ->join('pemohon', 'pemohon.id_pemohon = pengantar.id_pemohon', 'left')
            ->join('pengguna', 'pengguna.id_pengguna = pengantar.id_pengguna', 'left')
            ->where('status = "3"')
            ->orderBy('tanggal', 'DESC')
            ->get()->getResult();
    }
}
