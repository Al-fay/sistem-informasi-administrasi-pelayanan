<?php

namespace App\Controllers;

use App\Models\Model_datang;
use App\Models\Model_kelahiran;
use App\Models\Model_kematian;
use App\Models\Model_keterangan;
use App\Models\Model_pengantar;
use App\Models\Model_pindah;

class Laporan extends BaseController
{
    protected $Model_kelahiran;
    protected $Model_kematian;
    protected $Model_pindah;
    protected $Model_datang;
    protected $Model_keterangan;
    protected $Model_pengantar;

    public function __construct()
    {
        helper("form");
        $this->Model_kelahiran = new Model_kelahiran();
        $this->Model_kematian = new Model_kematian();
        $this->Model_pindah = new Model_pindah();
        $this->Model_datang = new Model_datang();
        $this->Model_keterangan = new Model_keterangan();
        $this->Model_pengantar = new Model_pengantar();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('laporan/home', $data);
    }

    public function kelahiran(): string
    {
        $data = [
            'title' => 'Laporan Surat Kelahiran',
        ];
        return view('laporan/laporan_kelahiran', $data);
    }

    public function cetak_kelahiran(): string
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');
        $laporan_kelahiran = $this->Model_kelahiran->laporanperperiode($tglawal, $tglakhir);
        $data = [
            'title' => 'Laporan Kelahiran',
            'laporan_kelahiran' => $laporan_kelahiran,
        ];
        return view('laporan/cetak_laporan_kelahiran', $data);
    }

    public function kematian(): string
    {
        $data = [
            'title' => 'Laporan Surat Kematian',
        ];
        return view('laporan/laporan_kematian', $data);
    }

    public function cetak_kematian(): string
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');
        $laporan_kematian = $this->Model_kematian->laporanperperiode($tglawal, $tglakhir);
        $data = [
            'title' => 'Laporan Kematian',
            'laporan_kematian' => $laporan_kematian,
        ];
        return view('laporan/cetak_laporan_kematian', $data);
    }

    public function pindah(): string
    {
        $data = [
            'title' => 'Laporan Surat Pindah',
        ];
        return view('laporan/laporan_pindah', $data);
    }

    public function cetak_pindah(): string
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');
        $laporan_pindah = $this->Model_pindah->laporanperperiode($tglawal, $tglakhir);
        $data = [
            'title' => 'Laporan Pindah',
            'laporan_pindah' => $laporan_pindah,
        ];
        return view('laporan/cetak_laporan_pindah', $data);
    }

    public function datang(): string
    {
        $data = [
            'title' => 'Laporan Surat Datang',
        ];
        return view('laporan/laporan_datang', $data);
    }

    public function cetak_datang(): string
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');
        $laporan_datang = $this->Model_datang->laporanperperiode($tglawal, $tglakhir);
        $data = [
            'title' => 'Laporan Datang',
            'laporan_datang' => $laporan_datang,
        ];
        return view('laporan/cetak_laporan_datang', $data);
    }

    public function keterangan(): string
    {
        $data = [
            'title' => 'Laporan Surat Keterangan',
        ];
        return view('laporan/laporan_keterangan', $data);
    }

    public function cetak_keterangan(): string
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');
        $laporan_keterangan = $this->Model_keterangan->laporanperperiode($tglawal, $tglakhir);
        $data = [
            'title' => 'Laporan Surat Keterangan',
            'laporan_keterangan' => $laporan_keterangan,
        ];
        return view('laporan/cetak_laporan_keterangan', $data);
    }

    public function pengantar(): string
    {
        $data = [
            'title' => 'Laporan Surat Pengantar',
        ];
        return view('laporan/laporan_pengantar', $data);
    }

    public function cetak_pengantar(): string
    {
        $tglawal = $this->request->getPost('tglawal');
        $tglakhir = $this->request->getPost('tglakhir');
        $laporan_pengantar = $this->Model_pengantar->laporanperperiode($tglawal, $tglakhir);
        $data = [
            'title' => 'Laporan Surat Pengantar',
            'laporan_pengantar' => $laporan_pengantar,
        ];
        return view('laporan/cetak_laporan_pengantar', $data);
    }
}
