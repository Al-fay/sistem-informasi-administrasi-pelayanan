<?php

namespace App\Controllers;

use App\Models\Model_pindah;

class Pindah extends BaseController
{
    protected $Model_pindah;

    public function __construct()
    {
        $this->Model_pindah = new Model_pindah();
    }

    public function index(): string
    {
        $data = [
            'title' => 'LAMPID | Pindah',
            'pindah' => $this->Model_pindah->all_data(),
            'pindah_user' => $this->Model_pindah->user_pindah(),
        ];
        return view('petugas/pindah/index', $data);
    }

    public function tambah_pindah(): string
    {
        $data = [
            'title' => 'Tambah Pindah'
        ];
        return view('petugas/pindah/tambah', $data);
    }

    public function add()
    {
        if ($this->validate([
            'no_kk' => [
                'label' => 'No.KK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'pekerjaan' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat_asal' => [
                'label' => 'Alamat Asal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat_pindah' => [
                'label' => 'Alamat Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'klasifikasi_perpindahan' => [
                'label' => 'Klasifikasi Perpindahan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alasan_pindah' => [
                'label' => 'Alasan Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_kepindahan' => [
                'label' => 'Jenis Kepindahan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'anggotakeluarga_tidakpindah' => [
                'label' => 'Anggota Keluarga Tidak Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'anggotakeluarga_pindah' => [
                'label' => 'Anggota Keluarga Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'daftarpindah' => [
                'label' => 'Daftar Anggota Keluarga Yang Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kk' => [
                'label' => 'Kartu Keluarga',
                'rules' => 'uploaded[kk]|ext_in[kk,pdf]',
                'errors' => [
                    'uploaded' => '{field} belum diupload',
                    'ext_in' => '{field} yang anda upload bukan PDF'
                ]
            ],
            'foto' => [
                'label' => 'Foto Kepala Keluarga/Yang Pindah',
                'rules' => 'uploaded[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} belum diupload',
                    'mime_in' => '{field} yang anda upload bukan foto'
                ]
            ],
            'pengantar_rt' => [
                'label' => 'Pengantar RT',
                'rules' => 'uploaded[pengantar_rt]|mime_in[pengantar_rt,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} belum diupload',
                    'mime_in' => '{field} yang anda upload bukan foto'
                ]
            ]
        ])) {
            //ambil file foto yang diupload
            $pengantar_rt = $this->request->getFile('pengantar_rt');
            $foto = $this->request->getFile('foto');
            $kk = $this->request->getFile('kk');
            //memberi nama random foto
            $nama_file = $pengantar_rt->getRandomName();
            $nama_foto = $foto->getRandomName();
            $nama_kk = $kk->getRandomName();
            //jika valid
            $data = array(
                'tanggal' => date('Y-m-d'),
                'no_kk' => $this->request->getPost('no_kk'),
                'nama' => $this->request->getPost('nama'),
                'nik' => $this->request->getPost('nik'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'jenis_permohonan' => $this->request->getPost('jenis_permohonan'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'alamat_asal' => $this->request->getPost('alamat_asal'),
                'alamat_pindah' => $this->request->getPost('alamat_pindah'),
                'klasifikasi_perpindahan' => $this->request->getPost('klasifikasi_perpindahan'),
                'alasan_pindah' => $this->request->getPost('alasan_pindah'),
                'jenis_kepindahan' => $this->request->getPost('jenis_kepindahan'),
                'anggotakeluarga_tidakpindah' => $this->request->getPost('anggotakeluarga_tidakpindah'),
                'anggotakeluarga_pindah' => $this->request->getPost('anggotakeluarga_pindah'),
                'daftarpindah' => $this->request->getPost('daftarpindah'),
                'id_pengguna' => session()->get('id_pengguna'),
                'id_pemohon' => session()->get('id_pemohon'),
                'kk' => $nama_kk,
                'foto' => $nama_foto,
                'pengantar_rt' => $nama_file,
            );
            $pengantar_rt->move('pengantar', $nama_file);
            $foto->move('foto', $nama_foto);
            $kk->move('kk', $nama_kk);
            $this->Model_pindah->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('pindah'));
        } else {
            //jika tidak valid
            $validation = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $validation);
            return redirect()->to(base_url('pindah/tambah_pindah'))->withInput();
        }
    }

    public function edit_pindah($id_pindah)
    {
        $data = [
            'title' => 'Edit Pindah',
            'pindah' => $this->Model_pindah->detail_pindah($id_pindah),
        ];
        return view('petugas/pindah/edit', $data);
    }

    public function update_pindah($id_pindah)
    {
        if ($this->validate([
            'no_kk' => [
                'label' => 'No.KK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'pekerjaan' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat_asal' => [
                'label' => 'Alamat Asal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat_pindah' => [
                'label' => 'Alamat Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'klasifikasi_perpindahan' => [
                'label' => 'Klasifikasi Perpindahan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alasan_pindah' => [
                'label' => 'Alasan Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_kepindahan' => [
                'label' => 'Jenis Kepindahan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'anggotakeluarga_tidakpindah' => [
                'label' => 'Anggota Keluarga Tidak Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'anggotakeluarga_pindah' => [
                'label' => 'Anggota Keluarga Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'daftarpindah' => [
                'label' => 'Daftar Anggota Keluarga Yang Pindah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kk' => [
                'label' => 'Kartu Keluarga',
                'rules' => 'ext_in[kk,pdf]',
                'errors' => [
                    'ext_in' => '{field} yang anda upload bukan PDF'
                ]
            ],
            'foto' => [
                'label' => 'Foto Kepala Keluarga/Yang Pindah',
                'rules' => 'mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => '{field} yang anda upload bukan foto'
                ]
            ],
            'pengantar_rt' => [
                'label' => 'Pengantar RT',
                'rules' => 'mime_in[pengantar_rt,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => '{field} yang anda upload bukan foto'
                ]
            ]
        ])) {
            $pengantar_rt = $this->request->getFile('pengantar_rt');
            $foto = $this->request->getFile('foto');
            $kk = $this->request->getFile('kk');
            if ($pengantar_rt->getError() == 4 or $foto->getError() == 4 or $kk->getError() == 4) {
                $data = array(
                    'id_pindah' => $id_pindah,
                    'no_kk' => $this->request->getPost('no_kk'),
                    'nama' => $this->request->getPost('nama'),
                    'nik' => $this->request->getPost('nik'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'jenis_permohonan' => $this->request->getPost('jenis_permohonan'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'alamat_asal' => $this->request->getPost('alamat_asal'),
                    'alamat_pindah' => $this->request->getPost('alamat_pindah'),
                    'klasifikasi_perpindahan' => $this->request->getPost('klasifikasi_perpindahan'),
                    'alasan_pindah' => $this->request->getPost('alasan_pindah'),
                    'jenis_kepindahan' => $this->request->getPost('jenis_kepindahan'),
                    'anggotakeluarga_tidakpindah' => $this->request->getPost('anggotakeluarga_tidakpindah'),
                    'anggotakeluarga_pindah' => $this->request->getPost('anggotakeluarga_pindah'),
                    'daftarpindah' => $this->request->getPost('daftarpindah'),
                );
                $this->Model_pindah->edit($data);
            } else {
                //file diganti
                $pengantar = $this->Model_pindah->detail_pindah($id_pindah);
                if ($pengantar['pengantar_rt'] != "") {
                    unlink('pengantar/' . $pengantar['pengantar_rt']);
                } elseif ($pengantar['foto'] != "") {
                    unlink('foto/' . $pengantar['foto']);
                } elseif ($pengantar['kk'] != "") {
                    unlink('kk/' . $pengantar['kk']);
                }
                $nama_file = $pengantar_rt->getRandomName();
                $nama_foto = $foto->getRandomName();
                $nama_kk = $kk->getRandomName();
                //jika valid
                $data = array(
                    'id_pindah' => $id_pindah,
                    'no_kk' => $this->request->getPost('no_kk'),
                    'nama' => $this->request->getPost('nama'),
                    'nik' => $this->request->getPost('nik'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'jenis_permohonan' => $this->request->getPost('jenis_permohonan'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'alamat_asal' => $this->request->getPost('alamat_asal'),
                    'alamat_pindah' => $this->request->getPost('alamat_pindah'),
                    'klasifikasi_perpindahan' => $this->request->getPost('klasifikasi_perpindahan'),
                    'alasan_pindah' => $this->request->getPost('alasan_pindah'),
                    'jenis_kepindahan' => $this->request->getPost('jenis_kepindahan'),
                    'anggotakeluarga_tidakpindah' => $this->request->getPost('anggotakeluarga_tidakpindah'),
                    'anggotakeluarga_pindah' => $this->request->getPost('anggotakeluarga_pindah'),
                    'daftarpindah' => $this->request->getPost('daftarpindah'),
                    'pengantar_rt' => $nama_file,
                    'foto' => $nama_foto,
                    'kk' => $nama_kk,
                );
                $pengantar_rt->move('pengantar', $nama_file);
                $foto->move('foto', $nama_foto);
                $kk->move('kk', $nama_kk);
                $this->Model_pindah->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('pindah'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pindah/edit_pindah/' . $id_pindah));
        }
    }

    public function status($id_pindah)
    {
        $data = [
            'title' => 'Status Surat Pindah',
            'pindah' => $this->Model_pindah->detail_pindah($id_pindah),
        ];
        return view('petugas/pindah/status', $data);
    }

    public function update_status($id_pindah)
    {
        if ($this->validate([
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $data = array(
                'id_pindah' => $id_pindah,
                'status' => $this->request->getPost('status'),
            );
            $this->Model_pindah->edit($data);
            session()->setFlashdata('pesan', 'Status Berhasil Ditambahkan');
            return redirect()->to(base_url('pindah'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pindah/status/' . $id_pindah));
        }
    }

    public function upload($id_pindah)
    {
        $data = [
            'title' => 'Upload Surat Pindah',
            'pindah' => $this->Model_pindah->detail_pindah($id_pindah),
        ];
        return view('petugas/pindah/upload', $data);
    }

    public function update_surat($id_pindah)
    {
        if (!$this->validate([
            'surat_pindah' => [
                'label' => 'Surat Pindah',
                'rules' => 'uploaded[surat_pindah]|required|ext_in[surat_pindah,pdf]|',
                'errors' => [
                    'uploaded' => '{field} harus diisi',
                    'ext_in' => '{field} yang anda upload bukan PDF',
                ]
            ],
        ])) {
            $surat_pindah = $this->request->getFile('surat_pindah');

            if ($surat_pindah->getError() == 4) {
                $data = array(
                    'id_pindah' => $id_pindah,
                );
                $this->Model_pindah->edit($data);
            } else {
                //file diganti
                $pindah = $this->Model_pindah->detail_pindah($id_pindah);
                if ($pindah['surat_pindah'] != "") {
                    unlink('surat/surat_pindah/' . $pindah['surat_pindah']);
                }
                $nama_pindah = $surat_pindah->getRandomName();
                //jika valid
                $data = array(
                    'id_pindah' => $id_pindah,
                    'surat_pindah' => $nama_pindah,
                );
                $surat_pindah->move('surat/surat_pindah', $nama_pindah);
                $this->Model_pindah->edit($data);
            }
            session()->setFlashdata('pesan', 'Surat Pindah Berhasil Ditambahkan');
            return redirect()->to(base_url('pindah'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pindah/upload/' . $id_pindah));
        }
    }

    public function unduh($id_pindah)
    {
        $filedata = $this->Model_pindah->detail_pindah($id_pindah);
        $file = 'surat/surat_pindah/' . $filedata['surat_pindah'];
        return response()->download($file, null);
    }

    public function detail($id_pindah)
    {
        $data = [
            'title' => 'Detail Pindah',
            'pindah' => $this->Model_pindah->detail_pindah($id_pindah),
        ];
        return view('petugas/pindah/detail', $data);
    }

    public function belum_diproses()
    {
        $data = [
            'title' => 'LAMPID | Surat Pindah Belum Diverifikasi',
            'pindah' => $this->Model_pindah->belum_diproses(),
        ];
        return view('petugas/pindah/belum_diproses', $data);
    }

    public function terima_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Pindah Sudah Diterima',
            'pindah' => $this->Model_pindah->terima(),
        ];
        return view('petugas/pindah/terima_pindah', $data);
    }

    public function tolak_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Pindah Ditolak',
            'pindah' => $this->Model_pindah->tolak(),
        ];
        return view('petugas/pindah/tolak_pindah', $data);
    }
}
