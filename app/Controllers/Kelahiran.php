<?php

namespace App\Controllers;

use App\Models\Model_kelahiran;

class Kelahiran extends BaseController
{
    protected $Model_kelahiran;

    public function __construct()
    {
        $this->Model_kelahiran = new Model_kelahiran();
    }

    public function index(): string
    {
        $data = [
            'title' => 'LAMPID | Kelahiran',
            'kelahiran' => $this->Model_kelahiran->all_data(),
            'user_lahir' => $this->Model_kelahiran->user_kelahiran(),
        ];
        return view('petugas/kelahiran/index', $data);
    }

    public function tambah_kelahiran(): string
    {
        $data = [
            'title' => 'Tambah Kelahiran'
        ];
        return view('petugas/kelahiran/tambah', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_anak' => [
                'label' => 'Nama Anak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'nama_ayah' => [
                'label' => 'Nama Ayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'nama_ibu' => [
                'label' => 'Nama Ibu',
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
            'tgl_kelahiran' => [
                'label' => 'Tanggal Kelahiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'tempat_kelahiran' => [
                'label' => 'Tempat Kelahiran',
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
                'nama_anak' => $this->request->getPost('nama_anak'),
                'nama_ayah' => $this->request->getPost('nama_ayah'),
                'nama_ibu' => $this->request->getPost('nama_ibu'),
                'alamat' => $this->request->getPost('alamat'),
                'tgl_kelahiran' => $this->request->getPost('tgl_kelahiran'),
                'tempat_kelahiran' => $this->request->getPost('tempat_kelahiran'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'id_pengguna' => session()->get('id_pengguna'),
                'id_pemohon' => session()->get('id_pemohon'),
                'pengantar_rt' => $nama_file,
            );
            $pengantar_rt->move('pengantar', $nama_file);
            $this->Model_kelahiran->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('kelahiran'));
        } else {
            //jika tidak valid
            $validation = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $validation);
            return redirect()->to(base_url('kelahiran/tambah_kelahiran'))->withInput();
        }
    }

    public function edit_kelahiran($id_kelahiran)
    {
        $data = [
            'title' => 'Edit Kelahiran',
            'kelahiran' => $this->Model_kelahiran->detail_kelahiran($id_kelahiran),
        ];
        return view('petugas/kelahiran/edit', $data);
    }

    public function update_kelahiran($id_kelahiran)
    {
        if ($this->validate([
            'nama_anak' => [
                'label' => 'Nama Anak',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'nama_ayah' => [
                'label' => 'Nama Ayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'nama_ibu' => [
                'label' => 'Nama Ibu',
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
            'tgl_kelahiran' => [
                'label' => 'Tanggal Kelahiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
            'tempat_kelahiran' => [
                'label' => 'Tempat Kelahiran',
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
                    'id_kelahiran' => $id_kelahiran,
                    'nama_anak' => $this->request->getPost('nama_anak'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                    'nama_ibu' => $this->request->getPost('nama_ibu'),
                    'alamat' => $this->request->getPost('alamat'),
                    'tgl_kelahiran' => $this->request->getPost('tgl_kelahiran'),
                    'tempat_kelahiran' => $this->request->getPost('tempat_kelahiran'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                );
                $this->Model_kelahiran->edit($data);
            } else {
                //file diganti
                $pengantar = $this->Model_kelahiran->detail_kelahiran($id_kelahiran);
                if ($pengantar['pengantar_rt'] != "") {
                    unlink('pengantar/' . $pengantar['pengantar_rt']);
                }
                $nama_file = $pengantar_rt->getRandomName();
                //jika valid
                $data = array(
                    'id_kelahiran' => $id_kelahiran,
                    'nama_anak' => $this->request->getPost('nama_anak'),
                    'nama_ayah' => $this->request->getPost('nama_ayah'),
                    'nama_ibu' => $this->request->getPost('nama_ibu'),
                    'alamat' => $this->request->getPost('alamat'),
                    'tgl_kelahiran' => $this->request->getPost('tgl_kelahiran'),
                    'hari_kelahiran' => $this->request->getPost('hari_kelahiran'),
                    'tempat_kelahiran' => $this->request->getPost('tempat_kelahiran'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'pengantar_rt' => $nama_file,
                );
                $pengantar_rt->move('pengantar', $nama_file);
                $this->Model_kelahiran->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('kelahiran'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelahiran/edit_kelahiran/' . $id_kelahiran));
        }
    }


    public function status($id_kelahiran)
    {
        $data = [
            'title' => 'Status Surat Kelahiran',
            'kelahiran' => $this->Model_kelahiran->detail_kelahiran($id_kelahiran),
        ];
        return view('petugas/kelahiran/status', $data);
    }

    public function update_status($id_kelahiran)
    {
        if ($this->validate([
            'status_kelahiran' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi !'
                ]
            ],
        ])) {
            $no_surat = '';
            if ($this->request->getPost('status_kelahiran') == '2') { // jika diterima
                // format 474.5/2023/001
                $data_surat = $this->Model_kelahiran->select('RIGHT(no_surat, 3) AS no_surat')->where('YEAR(tanggal)', date('Y'))->where('no_surat IS NOT NULL')->orderBy('no_surat', 'DESC')->limit(1)->get()->getRowArray();
                if ($data_surat == null) {
                    $no_surat = '474.5/' . date('Y') . '/001';
                } else {
                    $no_surat = '474.5/' . date('Y') . '/' . sprintf('%03u', ($data_surat['no_surat'] + 1));
                }
            } else {
                $no_surat = null;
            }
            $data = [
                'id_kelahiran' => $id_kelahiran,
                'status_kelahiran' => $this->request->getPost('status_kelahiran'),
                'no_surat' => $no_surat,
            ];
            $this->Model_kelahiran->edit($data);
            session()->setFlashdata('pesan', 'Status Berhasil Ditambahkan');
            return redirect()->to(base_url('kelahiran'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelahiran/status/' . $id_kelahiran));
        }
    }

    public function upload($id_kelahiran)
    {
        $data = [
            'title' => 'Upload Surat Kelahiran',
            'kelahiran' => $this->Model_kelahiran->detail_kelahiran($id_kelahiran),
        ];
        return view('petugas/kelahiran/upload', $data);
    }

    public function update_surat($id_kelahiran)
    {
        if (!$this->validate([
            'surat_kelahiran' => [
                'label' => 'Surat Kelahiran',
                'rules' => 'uploaded[surat_kelahiran]|ext_in[surat_kelahiran,pdf]',
                'errors' => [
                    'uploaded' => '{field} harus diisi !',
                    'ext_in' => '{field} yang anda upload bukan PDF',
                ]
            ],
        ])) {
            $surat_kelahiran = $this->request->getFile('surat_kelahiran');
            if ($surat_kelahiran->getError() == 4) {
                $data = array(
                    'id_kelahiran' => $id_kelahiran,
                );
                $this->Model_kelahiran->edit($data);
            } else {
                $kelahiran = $this->Model_kelahiran->detail_kelahiran($id_kelahiran);
                if ($kelahiran['surat_kelahiran'] != "") {
                    unlink('surat/surat_kelahiran/' . $kelahiran['surat_kelahiran']);
                }
                $nama_kelahiran = $surat_kelahiran->getRandomName();
                $data = array(
                    'id_kelahiran' => $id_kelahiran,
                    'surat_kelahiran' => $nama_kelahiran,
                );
                $surat_kelahiran->move('surat/surat_kelahiran', $nama_kelahiran);
                $this->Model_kelahiran->edit($data);
            }
            session()->setFlashdata('pesan', 'Surat Kelahiran Berhasil Ditambahkan');
            return redirect()->to(base_url('kelahiran'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelahiran/upload/' . $id_kelahiran));
        }
    }

    public function unduh($id_kelahiran)
    {
        $filedata = $this->Model_kelahiran->detail_kelahiran($id_kelahiran);
        $file = 'surat/surat_kelahiran/' . $filedata['surat_kelahiran'];
        return response()->download($file, null);

        if (empty($file)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Surat Kelahiran Tidak Ditemukan');
        }
    }

    public function detail($id_kelahiran)
    {
        $data = [
            'title' => 'Detail Kelahiran',
            'kelahiran' => $this->Model_kelahiran->detail_kelahiran($id_kelahiran),
        ];
        return view('petugas/kelahiran/detail', $data);
    }

    public function belum_diproses()
    {
        $data = [
            'title' => 'LAMPID | Surat Kelahiran Belum Diverifikasi',
            'kelahiran' => $this->Model_kelahiran->belum_diproses(),
        ];
        return view('petugas/kelahiran/belum_diproses', $data);
    }

    public function terima_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Kelahiran Sudah Diterima',
            'kelahiran' => $this->Model_kelahiran->terima(),
        ];
        return view('petugas/kelahiran/terima_kelahiran', $data);
    }

    public function tolak_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Kelahiran Ditolak',
            'kelahiran' => $this->Model_kelahiran->tolak(),
        ];
        return view('petugas/kelahiran/tolak_kelahiran', $data);
    }
}
