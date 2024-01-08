<?php

namespace App\Controllers;

use App\Models\Model_datang;

class datang extends BaseController
{
    protected $Model_datang;

    public function __construct()
    {
        $this->Model_datang = new Model_datang();
    }

    public function index(): string
    {
        $data = [
            'title' => 'LAMPID | Datang',
            'datang' => $this->Model_datang->all_data(),
            'datang_user' => $this->Model_datang->user_datang()
        ];
        return view('petugas/datang/index', $data);
    }

    public function tambah_datang(): string
    {
        $data = [
            'title' => 'Tambah Datang'
        ];
        return view('petugas/datang/tambah', $data);
    }

    public function add()
    {
        if ($this->validate([
            'kepala_keluarga' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi ! '
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'status_perkawinan' => [
                'label' => 'Status Perkawinan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'alamat_asal' => [
                'label' => 'Alamat Asal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'alamat_sekarang' => [
                'label' => 'Alamat Asal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'telepon' => [
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'data_anggotakeluarga' => [
                'label' => 'Data Anggota Keluarga Yang Diganti',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
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
            $kk = $this->request->getFile('kk');
            //memberi nama random foto
            $nama_file = $pengantar_rt->getRandomName();
            $nama_kk = $kk->getRandomName();
            //jika valid
            $data = array(
                'tanggal' => date('Y-m-d h:i:s'),
                'kepala_keluarga' => $this->request->getPost('kepala_keluarga'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'status_perkawinan' => $this->request->getPost('status_perkawinan'),
                'alamat_asal' => $this->request->getPost('alamat_asal'),
                'alamat_sekarang' => $this->request->getPost('alamat_sekarang'),
                'telepon' => $this->request->getPost('telepon'),
                'data_anggotakeluarga' => $this->request->getPost('data_anggotakeluarga'),
                'id_pengguna' => session()->get('id_pengguna'),
                'id_pemohon' => session()->get('id_pemohon'),
                'kk' => $nama_kk,
                'pengantar_rt' => $nama_file,
            );
            $pengantar_rt->move('pengantar', $nama_file);
            $kk->move('kk', $nama_kk);
            $this->Model_datang->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('datang'));
        } else {
            //jika tidak valid
            $validation = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $validation);
            return redirect()->to(base_url('datang/tambah_datang'))->withInput();
        }
    }

    public function edit_datang($id_datang)
    {
        $data = [
            'title' => 'Edit Datang',
            'datang' => $this->Model_datang->detail_datang($id_datang),
        ];
        return view('petugas/datang/edit', $data);
    }

    public function update_datang($id_datang)
    {
        if ($this->validate([
            'kepala_keluarga' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'status_perkawinan' => [
                'label' => 'Status Perkawinan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'alamat_asal' => [
                'label' => 'Alamat Asal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'alamat_sekarang' => [
                'label' => 'Alamat Asal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'telepon' => [
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'data_anggotakeluarga' => [
                'label' => 'Data Anggota Keluarga Yang Diganti',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'kk' => [
                'label' => 'Kartu Keluarga',
                'rules' => 'ext_in[kk,pdf]',
                'errors' => [
                    'ext_in' => '{field} yang anda upload bukan PDF'
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
            $kk = $this->request->getFile('kk');
            if ($pengantar_rt->getError() == 4 or $kk->getError() == 4) {
                $data = array(
                    'id_datang' => $id_datang,
                    'kepala_keluarga' => $this->request->getPost('kepala_keluarga'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'status_perkawinan' => $this->request->getPost('status_perkawinan'),
                    'alamat_asal' => $this->request->getPost('alamat_asal'),
                    'alamat_sekarang' => $this->request->getPost('alamat_sekarang'),
                    'telepon' => $this->request->getPost('telepon'),
                    'data_anggotakeluarga' => $this->request->getPost('data_anggotakeluarga'),
                );
                $this->Model_datang->edit($data);
            } else {
                //file diganti
                $pengantar = $this->Model_datang->detail_datang($id_datang);
                if ($pengantar['pengantar_rt'] != "") {
                    unlink('pengantar/' . $pengantar['pengantar_rt']);
                } elseif ($pengantar['kk'] != "") {
                    unlink('kk/' . $pengantar['kk']);
                }
                $nama_file = $pengantar_rt->getRandomName();
                $nama_kk = $kk->getRandomName();
                //jika valid
                $data = array(
                    'id_datang' => $id_datang,
                    'kepala_keluarga' => $this->request->getPost('kepala_keluarga'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'status_perkawinan' => $this->request->getPost('status_perkawinan'),
                    'alamat_asal' => $this->request->getPost('alamat_asal'),
                    'alamat_sekarang' => $this->request->getPost('alamat_sekarang'),
                    'telepon' => $this->request->getPost('telepon'),
                    'data_anggotakeluarga' => $this->request->getPost('data_anggotakeluarga'),
                    'pengantar_rt' => $nama_file,
                    'kk' => $nama_kk,
                );
                $pengantar_rt->move('pengantar', $nama_file);
                $kk->move('kk', $nama_kk);
                $this->Model_datang->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('datang'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('datang/edit_datang/' . $id_datang));
        }
    }

    public function status($id_datang)
    {
        $data = [
            'title' => 'Status Surat Datang',
            'datang' => $this->Model_datang->detail_datang($id_datang),
        ];
        return view('petugas/datang/status', $data);
    }

    public function update_status($id_datang)
    {
        if ($this->validate([
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
        ])) {
            $data = array(
                'id_datang' => $id_datang,
                'status' => $this->request->getPost('status'),
            );
            $this->Model_datang->edit($data);
            session()->setFlashdata('pesan', 'Status Berhasil Ditambahkan');
            return redirect()->to(base_url('datang'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('datang/status/' . $id_datang));
        }
    }

    public function upload($id_datang)
    {
        $data = [
            'title' => 'Upload Surat Datang',
            'datang' => $this->Model_datang->detail_datang($id_datang),
        ];
        return view('petugas/datang/upload', $data);
    }

    public function update_surat($id_datang)
    {
        if (!$this->validate([
            'surat_datang' => [
                'label' => 'Surat datang',
                'rules' => 'uploaded[surat_datang]|ext_in[surat_datang,pdf]',
                'errors' => [
                    'uploaded' => '{field} harus diisi !',
                    'ext_in' => '{field} yang anda upload bukan PDF'
                ]
            ],
        ])) {
            $surat_datang = $this->request->getFile('surat_datang');
            if ($surat_datang->getError() == 4) {
                $data = array(
                    'id_datang' => $id_datang,
                );
                $this->Model_datang->edit($data);
            } else {
                //file diganti
                $datang = $this->Model_datang->detail_datang($id_datang);
                if ($datang['surat_datang'] != "") {
                    unlink('surat/surat_datang/' . $datang['surat_datang']);
                }
                $nama_datang = $surat_datang->getRandomName();
                //jika valid
                $data = array(
                    'id_datang' => $id_datang,
                    'surat_datang' => $nama_datang,
                );
                $surat_datang->move('surat/surat_datang', $nama_datang);
                $this->Model_datang->edit($data);
            }
            session()->setFlashdata('pesan', 'Surat Datang Berhasil Ditambahkan');
            return redirect()->to(base_url('datang'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('datang/upload/' . $id_datang));
        }
    }

    public function unduh($id_datang)
    {
        $filedata = $this->Model_datang->detail_datang($id_datang);
        $file = 'surat/surat_datang/' . $filedata['surat_datang'];
        return response()->download($file, null);
    }

    public function detail($id_datang)
    {
        $data = [
            'title' => 'Detail Datang',
            'datang' => $this->Model_datang->detail_datang($id_datang),
        ];
        return view('petugas/datang/detail', $data);
    }

    public function belum_diproses()
    {
        $data = [
            'title' => 'LAMPID | Surat Datang Belum Diverifikasi',
            'datang' => $this->Model_datang->belum_diproses(),
        ];
        return view('petugas/datang/belum_diproses', $data);
    }

    public function terima_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Datang Sudah Diterima',
            'datang' => $this->Model_datang->terima(),
        ];
        return view('petugas/datang/terima_datang', $data);
    }

    public function tolak_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Datang Ditolak',
            'datang' => $this->Model_datang->tolak(),
        ];
        return view('petugas/datang/tolak_datang', $data);
    }
}
