<?php

namespace App\Controllers;

use App\Models\Model_pengantar;

class SuratPengantar extends BaseController
{
    protected $Model_pengantar;

    public function __construct()
    {
        $this->Model_pengantar = new Model_pengantar();
    }
    public function index(): string
    {
        $data = [
            'title' => 'Daftar Surat Pengantar',
            'pengantar' => $this->Model_pengantar->all_data(),
            'pengantar_user' => $this->Model_pengantar->user_pengantar(),
        ];
        return view('petugas/pengantar/index', $data);
    }

    public function tambah_pengantar()
    {
        $data = [
            'title' => 'Tambah Surat Pengantar',
        ];
        return view('petugas/pengantar/tambah', $data);
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
                    'required' => '{field} harus diisi'
                ]
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'agama' => [
                'label' => 'Agama',
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
            'no_ktp' => [
                'label' => 'Surat Bukti Diri',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'keperluan' => [
                'label' => 'Keperluan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan Lain-Lain',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
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
            $this->Model_pengantar->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('suratpengantar'));
        } else {
            //jika tidak valid
            $validation = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $validation);
            return redirect()->to(base_url('suratpengantar/tambah_pengantar'))->withInput();
        }
    }

    public function edit_pengantar($id_pengantar)
    {
        $data = [
            'title' => 'Edit Surat Pengantar',
            'pengantar' => $this->Model_pengantar->detail_pengantar($id_pengantar)
        ];
        return view('petugas/pengantar/edit', $data);
    }

    public function update_pengantar($id_pengantar)
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
                    'required' => '{field} harus diisi'
                ]
            ],
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'agama' => [
                'label' => 'Agama',
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
            'no_ktp' => [
                'label' => 'Surat Bukti Diri',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'keperluan' => [
                'label' => 'Keperluan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan Lain-Lain',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
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
                    'id_pengantar' => $id_pengantar,
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
                );
                $this->Model_pengantar->edit($data);
            } else {
                //file diganti
                $pengantar = $this->Model_pengantar->detail_pengantar($id_pengantar);
                if ($pengantar['pengantar_rt'] != "") {
                    unlink('pengantar/' . $pengantar['pengantar_rt']);
                }
                $nama_file = $pengantar_rt->getRandomName();
                //jika valid
                $data = array(
                    'id_pengantar' => $id_pengantar,
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
                    'pengantar_rt' => $nama_file,
                );
                $pengantar_rt->move('pengantar', $nama_file);
                $this->Model_pengantar->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('suratpengantar'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('suratpengantar/edit_pengantar/' . $id_pengantar));
        }
    }

    public function status($id_pengantar)
    {
        $data = [
            'title' => 'Status Surat Pengantar',
            'pengantar' => $this->Model_pengantar->detail_pengantar($id_pengantar),
        ];
        return view('petugas/pengantar/status', $data);
    }

    public function update_status($id_pengantar)
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
            $no_surat = '';
            if ($this->request->getPost('status') == '2') { // jika diterima
                // format 475.2/2023/001
                $data_surat = $this->Model_pengantar->select('RIGHT(no_surat, 3) AS no_surat')->where('YEAR(tanggal)', date('Y'))->where('no_surat IS NOT NULL')->orderBy('no_surat', 'DESC')->limit(1)->get()->getRowArray();
                if ($data_surat == null) {
                    $no_surat = '475.2/' . date('Y') . '/001';
                } else {
                    $no_surat = '475.2/' . date('Y') . '/' . sprintf('%03u', ($data_surat['no_surat'] + 1));
                }
            } else {
                $no_surat = null;
            }
            $data = array(
                'id_pengantar' => $id_pengantar,
                'status' => $this->request->getPost('status'),
                'no_surat' => $no_surat,
            );
            $this->Model_pengantar->edit($data);
            session()->setFlashdata('pesan', 'Status Berhasil Ditambahkan');
            return redirect()->to(base_url('suratpengantar'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('suratpengantar/status/' . $id_pengantar));
        }
    }

    public function upload($id_pengantar)
    {
        $data = [
            'title' => 'Upload Surat Pengantar',
            'pengantar' => $this->Model_pengantar->detail_pengantar($id_pengantar),
        ];
        return view('petugas/pengantar/upload', $data);
    }

    public function update_surat($id_pengantar)
    {
        if (!$this->validate([
            'surat_pengantar' => [
                'label' => 'Surat Pengantar',
                'rules' => 'uploaded[surat_pengantar]|ext_in[surat_pengantar,pdf]',
                'errors' => [
                    'uploaded' => '{field} harus diisi',
                    'ext_in' => '{field} yang anda upload bukan PDF',
                ]
            ],
        ])) {
            $surat_pengantar = $this->request->getFile('surat_pengantar');
            if ($surat_pengantar->getError() == 4) {
                $data = array(
                    'id_pengantar' => $id_pengantar,
                );
                $this->Model_pengantar->edit($data);
            } else {
                //file diganti
                $pengantar = $this->Model_pengantar->detail_pengantar($id_pengantar);
                if ($pengantar['surat_pengantar'] != "") {
                    unlink('surat/surat_pengantar/' . $pengantar['surat_pengantar']);
                }
                $nama_pengantar = $surat_pengantar->getRandomName();
                //jika valid
                $data = array(
                    'id_pengantar' => $id_pengantar,
                    'surat_pengantar' => $nama_pengantar,
                );
                $surat_pengantar->move('surat/surat_pengantar', $nama_pengantar);
                $this->Model_pengantar->edit($data);
            }
            session()->setFlashdata('pesan', 'Surat Pengantar Berhasil Ditambahkan');
            return redirect()->to(base_url('suratpengantar'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('suratpengantar/upload/' . $id_pengantar));
        }
    }

    public function unduh($id_pengantar)
    {
        $filedata = $this->Model_pengantar->detail_pengantar($id_pengantar);
        $file = 'surat/surat_pengantar/' . $filedata['surat_pengantar'];
        return response()->download($file, null);
    }

    public function detail($id_pengantar)
    {
        $data = [
            'title' => 'Detail Surat Pengantar',
            'pengantar' => $this->Model_pengantar->detail_pengantar($id_pengantar),
        ];
        return view('petugas/pengantar/detail', $data);
    }

    public function belum_diproses()
    {
        $data = [
            'title' => 'LAMPID | Surat Pengantar Belum Diverifikasi',
            'pengantar' => $this->Model_pengantar->belum_diproses(),
        ];
        return view('petugas/pengantar/belum_diproses', $data);
    }

    public function terima_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Pengantar Sudah Diterima',
            'pengantar' => $this->Model_pengantar->terima(),
        ];
        return view('petugas/pengantar/terima_pengantar', $data);
    }

    public function tolak_surat()
    {
        $data = [
            'title' => 'LAMPID | Surat Pengantar Ditolak',
            'pengantar' => $this->Model_pengantar->tolak(),
        ];
        return view('petugas/pengantar/tolak_pengantar', $data);
    }
}
