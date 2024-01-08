<?php

namespace App\Controllers;

use App\Models\Model_keterangan;

class Keterangan extends BaseController
{
    protected $Model_keterangan;

    public function __construct()
    {
        $this->Model_keterangan = new Model_keterangan();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Daftar Surat Keterangan',
            'keterangan' => $this->Model_keterangan->all_data(),
            'keterangan_user' => $this->Model_keterangan->user_keterangan(),
        ];
        return view('petugas/keterangan/index', $data);
    }

    public function tambah_keterangan(): string
    {
        $data = [
            'title' => 'Tambah Surat Keterangan'
        ];
        return view('petugas/keterangan/tambah', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama' => [
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
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'agama' => [
                'label' => 'Agama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'pekerjaan' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'no_ktp' => [
                'label' => 'Surat Bukti Diri',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'keperluan' => [
                'label' => 'Keperluan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan Lain-Lain',
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
        ])) { //ambil file foto yang diupload
            $pengantar_rt = $this->request->getFile('pengantar_rt');
            //memberi nama random foto
            $nama_file = $pengantar_rt->getRandomName();
            //jika valid
            $data = array(
                'tanggal' => date('Y-m-d h:i:s'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'negara' => $this->request->getPost('negara'),
                'agama' => $this->request->getPost('agama'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'alamat' => $this->request->getPost('alamat'),
                'no_ktp' => $this->request->getPost('no_ktp'),
                'keperluan' => $this->request->getPost('keperluan'),
                'keterangan' => $this->request->getPost('keterangan'),
                'id_pengguna' => session()->get('id_pengguna'),
                'id_pemohon' => session()->get('id_pemohon'),
                'pengantar_rt' => $nama_file,
            );
            $pengantar_rt->move('pengantar', $nama_file);;
            $this->Model_keterangan->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('keterangan'));
        } else {
            //jika tidak valid
            $validation = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $validation);
            return redirect()->to(base_url('keterangan/tambah_keterangan'))->withInput();
        }
    }

    public function edit_keterangan($id_keterangan)
    {
        $data = [
            'title' => 'Edit Surat Keterangan',
            'keterangan' => $this->Model_keterangan->detail_keterangan($id_keterangan),
        ];
        return view('petugas/keterangan/edit', $data);
    }

    public function update_keterangan($id_keterangan)
    {
        if ($this->validate([
            'nama' => [
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
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'agama' => [
                'label' => 'Agama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'pekerjaan' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'no_ktp' => [
                'label' => 'Surat Bukti Diri',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'keperluan' => [
                'label' => 'Keperluan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan Lain-Lain',
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
            ]
        ])) {
            $pengantar_rt = $this->request->getFile('pengantar_rt');
            if ($pengantar_rt->getError() == 4) {
                $data = array(
                    'id_keterangan' => $id_keterangan,
                    'nama' => $this->request->getPost('nama'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'negara' => $this->request->getPost('negara'),
                    'agama' => $this->request->getPost('agama'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_ktp' => $this->request->getPost('no_ktp'),
                    'keperluan' => $this->request->getPost('keperluan'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'status' => $this->request->getPost('status'),
                );
                $this->Model_keterangan->edit($data);
            } else {
                //file diganti
                $pengantar = $this->Model_keterangan->detail_keterangan($id_keterangan);
                if ($pengantar['pengantar_rt'] != "") {
                    unlink('pengantar/' . $pengantar['pengantar_rt']);
                }
                $nama_file = $pengantar_rt->getRandomName();
                //jika valid
                $data = array(
                    'id_keterangan' => $id_keterangan,
                    'nama' => $this->request->getPost('nama'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'negara' => $this->request->getPost('negara'),
                    'agama' => $this->request->getPost('agama'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_ktp' => $this->request->getPost('no_ktp'),
                    'keperluan' => $this->request->getPost('keperluan'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'status' => $this->request->getPost('status'),
                    'pengantar_rt' => $nama_file,
                );
                $pengantar_rt->move('pengantar', $nama_file);
                $this->Model_keterangan->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('keterangan'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('keterangan/edit_keterangan/' . $id_keterangan));
        }
    }

    public function status($id_keterangan)
    {
        $data = [
            'title' => 'Status Surat Keterangan',
            'keterangan' => $this->Model_keterangan->detail_keterangan($id_keterangan),
        ];
        return view('petugas/keterangan/status', $data);
    }

    public function update_status($id_keterangan)
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
                // format 422.8/2023/001
                $data_surat = $this->Model_keterangan->select('RIGHT(no_surat, 3) AS no_surat')->where('YEAR(tanggal)', date('Y'))->where('no_surat IS NOT NULL')->orderBy('no_surat', 'DESC')->limit(1)->get()->getRowArray();
                if ($data_surat == null) {
                    $no_surat = '422.8/' . date('Y') . '/001';
                } else {
                    $no_surat = '422.8/' . date('Y') . '/' . sprintf('%03u', ($data_surat['no_surat'] + 1));
                }
            } else {
                $no_surat = null;
            }
            $data = array(
                'id_keterangan' => $id_keterangan,
                'status' => $this->request->getPost('status'),
                'no_surat' => $no_surat,
            );
            $this->Model_keterangan->edit($data);
            session()->setFlashdata('pesan', 'Status Berhasil Ditambahkan');
            return redirect()->to(base_url('keterangan'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('keterangan/status/' . $id_keterangan));
        }
    }

    public function upload($id_keterangan)
    {
        $data = [
            'title' => 'Upload Surat Keterangan',
            'keterangan' => $this->Model_keterangan->detail_keterangan($id_keterangan),
        ];
        return view('petugas/keterangan/upload', $data);
    }

    public function update_surat($id_keterangan)
    {
        if (!$this->validate([
            'surat_keterangan' => [
                'label' => 'Surat Keterangan',
                'rules' => 'uploaded[surat_keterangan]|ext_in[surat_keterangan,pdf]',
                'errors' => [
                    'uploaded' => '{field} harus diisi !',
                    'ext_in' => '{field} yang anda upload bukan PDF'
                ]
            ],
        ])) {
            $surat_keterangan = $this->request->getFile('surat_keterangan');
            if ($surat_keterangan->getError() == 4) {
                $data = array(
                    'id_keterangan' => $id_keterangan,
                );
                $this->Model_keterangan->edit($data);
            } else {
                //file diganti
                $keterangan = $this->Model_keterangan->detail_keterangan($id_keterangan);
                if ($keterangan['surat_keterangan'] != "") {
                    unlink('surat/surat_keterangan/' . $keterangan['surat_keterangan']);
                }
                $nama_keterangan = $surat_keterangan->getRandomName();
                //jika valid
                $data = array(
                    'id_keterangan' => $id_keterangan,
                    'surat_keterangan' => $nama_keterangan,
                );
                $surat_keterangan->move('surat/surat_keterangan', $nama_keterangan);
                $this->Model_keterangan->edit($data);
            }
            session()->setFlashdata('pesan', 'Surat Keterangan Berhasil Ditambahkan');
            return redirect()->to(base_url('keterangan'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('keterangan/upload/' . $id_keterangan));
        }
    }

    public function unduh($id_keterangan)
    {
        $filedata = $this->Model_keterangan->detail_keterangan($id_keterangan);
        $file = 'surat/surat_keterangan/' . $filedata['surat_keterangan'];
        return response()->download($file, null);
    }

    public function detail($id_keterangan)
    {
        $data = [
            'title' => 'Detail Surat Keterangan',
            'keterangan' => $this->Model_keterangan->detail_keterangan($id_keterangan),
        ];
        return view('petugas/keterangan/detail', $data);
    }

    public function belum_diproses()
    {
        $data = [
            'title' => 'LAMPID | Surat Keterangan Belum Diverifikasi',
            'keterangan' => $this->Model_keterangan->belum_diproses(),
        ];
        return view('petugas/keterangan/belum_diproses', $data);
    }

    public function terima_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Keterangan Sudah Diterima',
            'keterangan' => $this->Model_keterangan->terima(),
        ];
        return view('petugas/keterangan/terima_keterangan', $data);
    }

    public function tolak_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Keterangan Ditolak',
            'keterangan' => $this->Model_keterangan->tolak(),
        ];
        return view('petugas/keterangan/tolak_keterangan', $data);
    }
}
