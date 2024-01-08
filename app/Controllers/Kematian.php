<?php

namespace App\Controllers;

use App\Models\Model_kematian;

class Kematian extends BaseController
{
    protected $Model_kematian;

    public function __construct()
    {
        $this->Model_kematian = new Model_kematian();
    }

    public function index(): string
    {
        $data = [
            'title' => 'LAMPID | Kematian',
            'kematian' => $this->Model_kematian->all_data(),
            'kematian_user' => $this->Model_kematian->user_kematian()
        ];
        return view('petugas/kematian/index', $data);
    }

    public function tambah_kematian(): string
    {
        $data = [
            'title' => 'Tambah Kematian'
        ];
        return view('petugas/kematian/tambah', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_meninggal' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi ! '
                ]
            ],
            'umur' => [
                'label' => 'Umur',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
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
            'tempat_meninggal' => [
                'label' => 'Tempat Kematian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'tgl_meninggal' => [
                'label' => 'Tanggal Meninggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'sebab_meninggal' => [
                'label' => 'Sebab Meninggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
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
            //memberi nama random foto
            $nama_file = $pengantar_rt->getRandomName();
            //jika valid
            $data = array(
                'tanggal' => date('Y-m-d h:i:s'),
                'nama_meninggal' => $this->request->getPost('nama_meninggal'),
                'umur' => $this->request->getPost('umur'),
                'alamat' => $this->request->getPost('alamat'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tempat_meninggal' => $this->request->getPost('tempat_meninggal'),
                'tgl_meninggal' => $this->request->getPost('tgl_meninggal'),
                'sebab_meninggal' => $this->request->getPost('sebab_meninggal'),
                'nik' => $this->request->getPost('nik'),
                'no_kk' => $this->request->getPost('no_kk'),
                'id_pengguna' => session()->get('id_pengguna'),
                'id_pemohon' => session()->get('id_pemohon'),
                'pengantar_rt' => $nama_file,
            );
            $pengantar_rt->move('pengantar', $nama_file);
            $this->Model_kematian->tambah($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('kematian'));
        } else {
            //jika tidak valid
            $validation = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $validation);
            return redirect()->to(base_url('kematian/tambah_kematian'))->withInput();
        }
    }

    public function edit_kematian($id_meninggal)
    {
        $data = [
            'title' => 'Edit Kematian',
            'kematian' => $this->Model_kematian->detail_kematian($id_meninggal),
        ];
        return view('petugas/kematian/edit', $data);
    }

    public function update_kematian($id_meninggal)
    {
        if ($this->validate([
            'nama_meninggal' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'umur' => [
                'label' => 'Umur',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
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
            'tempat_meninggal' => [
                'label' => 'Tempat Kematian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'tgl_meninggal' => [
                'label' => 'Tanggal Meninggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'sebab_meninggal' => [
                'label' => 'Sebab Meninggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'pengantar_rt' => [
                'label' => 'Pengantar RT',
                'rules' => 'mime_in[pengantar_rt,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'mime_in' => '{field} yang anda upload bukan foto'
                ]
            ],
        ])) {
            $pengantar_rt = $this->request->getFile('pengantar_rt');
            if ($pengantar_rt->getError() == 4) {
                $data = array(
                    'id_meninggal' => $id_meninggal,
                    'nama_meninggal' => $this->request->getPost('nama_meninggal'),
                    'umur' => $this->request->getPost('umur'),
                    'alamat' => $this->request->getPost('alamat'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'tempat_meninggal' => $this->request->getPost('tempat_meninggal'),
                    'tgl_meninggal' => $this->request->getPost('tgl_meninggal'),
                    'sebab_meninggal' => $this->request->getPost('sebab_meninggal'),
                    'nik' => $this->request->getPost('nik'),
                    'no_kk' => $this->request->getPost('no_kk'),
                );
                $this->Model_kematian->edit($data);
            } else {
                //file diganti
                $pengantar = $this->Model_kematian->detail_kematian($id_meninggal);
                if ($pengantar['pengantar_rt'] != "") {
                    unlink('pengantar/' . $pengantar['pengantar_rt']);
                }
                $nama_file = $pengantar_rt->getRandomName();
                //jika valid
                $data = array(
                    'id_meninggal' => $id_meninggal,
                    'nama_meninggal' => $this->request->getPost('nama_meninggal'),
                    'umur' => $this->request->getPost('umur'),
                    'alamat' => $this->request->getPost('alamat'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'tempat_meninggal' => $this->request->getPost('tempat_meninggal'),
                    'hari_meninggal' => $this->request->getPost('hari_meninggal'),
                    'tgl_meninggal' => $this->request->getPost('tgl_meninggal'),
                    'sebab_meninggal' => $this->request->getPost('sebab_meninggal'),
                    'nik' => $this->request->getPost('nik'),
                    'no_kk' => $this->request->getPost('no_kk'),
                    'pengantar_rt' => $nama_file,
                );
                $pengantar_rt->move('pengantar', $nama_file);
                $this->Model_kematian->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('kematian'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kematian/edit_kematian/' . $id_meninggal));
        }
    }

    public function status($id_meninggal)
    {
        $data = [
            'title' => 'Status Surat kematian',
            'kematian' => $this->Model_kematian->detail_kematian($id_meninggal),
        ];
        return view('petugas/kematian/status', $data);
    }

    public function update_status($id_meninggal)
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
            $no_surat = '';
            if ($this->request->getPost('status') == '2') { // jika diterima
                // format 474.3/2023/001
                $data_surat = $this->Model_kematian->select('RIGHT(no_surat, 3) AS no_surat')->where('YEAR(tanggal)', date('Y'))->where('no_surat IS NOT NULL')->orderBy('no_surat', 'DESC')->limit(1)->get()->getRowArray();
                if ($data_surat == null) {
                    $no_surat = '474.3/' . date('Y') . '/001';
                } else {
                    $no_surat = '474.3/' . date('Y') . '/' . sprintf('%03u', ($data_surat['no_surat'] + 1));
                }
            } else {
                $no_surat = null;
            }
            $data = array(
                'id_meninggal' => $id_meninggal,
                'status' => $this->request->getPost('status'),
                'no_surat' => $no_surat,
            );
            $this->Model_kematian->edit($data);
            session()->setFlashdata('pesan', 'Status Berhasil Ditambahkan');
            return redirect()->to(base_url('kematian'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kematian/status/' . $id_meninggal));
        }
    }

    public function upload($id_meninggal)
    {
        $data = [
            'title' => 'Upload Surat Kematian',
            'kematian' => $this->Model_kematian->detail_kematian($id_meninggal),
        ];
        return view('petugas/kematian/upload', $data);
    }

    public function update_surat($id_meninggal)
    {
        if (!$this->validate([
            'surat_kematian' => [
                'label' => 'Surat Kematian',
                'rules' => 'uploaded[surat_kematian]|ext_in[surat_kematian,pdf]|required',
                'errors' => [
                    'ext_in' => '{field} yang anda upload bukan PDF',
                    'uploaded' => '{field} harus diisi !',
                ]
            ],
        ])) {
            $surat_kematian = $this->request->getFile('surat_kematian');
            if ($surat_kematian->getError() == 4) {
                $data = array(
                    'id_meninggal' => $id_meninggal,
                );
                $this->Model_kematian->edit($data);
            } else {
                //file diganti
                $kematian = $this->Model_kematian->detail_kematian($id_meninggal);
                if ($kematian['surat_kematian'] != "") {
                    unlink('surat/surat_kematian/' . $kematian['surat_kematian']);
                }
                $nama_kematian = $surat_kematian->getRandomName();
                //jika valid
                $data = array(
                    'id_meninggal' => $id_meninggal,
                    'surat_kematian' => $nama_kematian,
                );
                $surat_kematian->move('surat/surat_kematian', $nama_kematian);
                $this->Model_kematian->edit($data);
            }
            session()->setFlashdata('pesan', 'Surat Kematian Berhasil Ditambahkan');
            return redirect()->to(base_url('kematian'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kematian/upload/' . $id_meninggal));
        }
    }

    public function unduh($id_meninggal)
    {
        $filedata = $this->Model_kematian->detail_kematian($id_meninggal);
        $file = 'surat/surat_kematian/' . $filedata['surat_kematian'];
        return response()->download($file, null);
    }

    public function detail($id_meninggal)
    {
        $data = [
            'title' => 'Detail Kematian',
            'kematian' => $this->Model_kematian->detail_kematian($id_meninggal),
        ];
        return view('petugas/kematian/detail', $data);
    }

    public function belum_diproses()
    {
        $data = [
            'title' => 'LAMPID | Surat Kematian Belum Diverifikasi',
            'kematian' => $this->Model_kematian->belum_diproses(),
        ];
        return view('petugas/kematian/belum_diproses', $data);
    }

    public function terima_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Kematian Sudah Diterima',
            'kematian' => $this->Model_kematian->terima(),
        ];
        return view('petugas/kematian/terima_kematian', $data);
    }

    public function tolak_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Kematian Ditolak',
            'kematian' => $this->Model_kematian->tolak(),
        ];
        return view('petugas/kematian/tolak_kematian', $data);
    }
}
