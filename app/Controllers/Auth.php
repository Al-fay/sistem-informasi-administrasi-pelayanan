<?php

namespace App\Controllers;

use App\Models\Model_auth;
use App\Models\Model_pemohon;

class Auth extends BaseController
{
    protected $Model_auth;
    protected $Model_pemohon;

    public function __construct()
    {
        helper("form");
        $this->Model_auth = new Model_auth();
        $this->Model_pemohon = new Model_pemohon();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('v_login', $data);
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
        ])) {
            //valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->Model_pemohon->login($username, $password);
            if ($cek) {
                //jika login berhasil
                session()->set('log', true);
                session()->set('id_pemohon', $cek['id_pemohon']);
                session()->set('nama_pemohon', $cek['nama_pemohon']);
                session()->set('status_akun', $cek['status_akun']);
                if ($cek['status_akun'] == '1') {
                    session()->setFlashdata('gagal', 'akun belum diverifikasi');
                    return redirect()->to(base_url('Auth'));
                } else if ($cek['status_akun'] == '2') {
                    return redirect()->to(base_url('Pemohon'));
                } else {
                    session()->setFlashdata('gagal', 'akun belum ditolak silahkan registrasi ulang');
                    return redirect()->to(base_url('Auth'));
                }
            } else {
                //jika login gagal
                session()->setFlashdata('gagal', 'username dan password tidak valid');
                return redirect()->to(base_url('auth/index'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
    }

    public function pengguna()
    {
        $data = [
            'title' => 'Daftar Pemohon',
            'pengguna' => $this->Model_pemohon->all_data()
        ];
        return view('v_pengguna', $data);
    }

    public function tambah_pengguna(): string
    {
        $data = [
            'title' => 'Tambah Pemohon'
        ];
        return view('v_tambahpengguna', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_pemohon' => [
                'label' => 'Nama Pemohon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'jns_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat_pemohon' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tempat_lahir_pemohon' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tgl_lahir_pemohon' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_telepon' => [
                'label' => 'No. Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nik_pemohon' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[pemohon.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar, silahkan gunakan username yang lain'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $data = array(
                'tgl_daftar' => date('Y-m-d h:i:s'),
                'nama_pemohon' => $this->request->getPost('nama_pemohon'),
                'jns_kelamin' => $this->request->getPost('jns_kelamin'),
                'alamat_pemohon' => $this->request->getPost('alamat_pemohon'),
                'tempat_lahir_pemohon' => $this->request->getPost('tempat_lahir_pemohon'),
                'tgl_lahir_pemohon' => $this->request->getPost('tgl_lahir_pemohon'),
                'no_telepon' => $this->request->getPost('no_telepon'),
                'nik_pemohon' => $this->request->getPost('nik_pemohon'),
                'username' => $this->request->getPost('username'),
                'password' => sha1($this->request->getPost('password')),
            );
            $this->Model_pemohon->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('auth/pengguna'));
        } else {
            //jika tidak valid
            $validation = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $validation);
            return redirect()->to(base_url('auth/tambah_pengguna'))->withInput();
            // session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            // return redirect()->to(base_url('auth/tambah_pengguna'));
        }
    }

    public function edit_pengguna($id_pemohon)
    {
        $data = [
            'title' => 'Edit Pemohon',
            'pemohon' => $this->Model_pemohon->edit_user($id_pemohon),
        ];
        return view('v_editpengguna', $data);
    }

    public function update($id_pemohon)
    {
        $usernameLama = $this->Model_pemohon->all_data($this->request->getVar('id_auth'));
        if ($usernameLama['username'] = $this->request->getPost('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[auth.username]';
        }

        if ($this->validate([
            'nama_pemohon' => [
                'label' => 'Nama Pemohon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'jns_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat_pemohon' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tempat_lahir_pemohon' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tgl_lahir_pemohon' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_telepon' => [
                'label' => 'No. Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nik_pemohon' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => $rule_username,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar, silahkan gunakan username yang lain'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $data = array(
                'id_pemohon' => $id_pemohon,
                'nama_pemohon' => $this->request->getPost('nama_pemohon'),
                'jns_kelamin' => $this->request->getPost('jns_kelamin'),
                'alamat_pemohon' => $this->request->getPost('alamat_pemohon'),
                'tempat_lahir_pemohon' => $this->request->getPost('tempat_lahir_pemohon'),
                'tgl_lahir_pemohon' => $this->request->getPost('tgl_lahir_pemohon'),
                'no_telepon' => $this->request->getPost('no_telepon'),
                'nik_pemohon' => $this->request->getPost('nik_pemohon'),
                'username' => $this->request->getPost('username'),
                'password' => sha1($this->request->getPost('password')),
            );
            $this->Model_pemohon->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('auth/pengguna'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/edit_pengguna/' . $id_pemohon));
        }
    }

    public function status($id_pemohon)
    {
        $data = [
            'title' => 'Status Pemohon',
            'pemohon' => $this->Model_pemohon->edit_user($id_pemohon),
        ];
        return view('status_pengguna', $data);
    }

    public function update_status($id_pemohon)
    {
        if ($this->validate([
            'status_akun' => [
                'label' => 'Status Akun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $data = array(
                'id_pemohon' => $id_pemohon,
                'status_akun' => $this->request->getPost('status_akun'),
            );
            $this->Model_pemohon->edit($data);
            session()->setFlashdata('pesan', 'Status Berhasil Ditambahkan');
            return redirect()->to(base_url('auth/pengguna'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/status/' . $id_pemohon));
        }
    }

    public function registrasi(): string
    {
        session();
        $data = [
            'title' => 'Tambah Daftar Pemohon',
            'validation' => \Config\Services::validation()
        ];
        return view('v_registrasi', $data);
    }

    public function add_pemohon()
    {
        if ($this->validate([
            'nama_pemohon' => [
                'label' => 'Nama Pemohon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'jns_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat_pemohon' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tempat_lahir_pemohon' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tgl_lahir_pemohon' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_telepon' => [
                'label' => 'No. Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nik_pemohon' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[pemohon.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar, silahkan gunakan username yang lain'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $data = array(
                'tgl_daftar' => date('Y-m-d h:i:s'),
                'nama_pemohon' => $this->request->getPost('nama_pemohon'),
                'jns_kelamin' => $this->request->getPost('jns_kelamin'),
                'alamat_pemohon' => $this->request->getPost('alamat_pemohon'),
                'tempat_lahir_pemohon' => $this->request->getPost('tempat_lahir_pemohon'),
                'tgl_lahir_pemohon' => $this->request->getPost('tgl_lahir_pemohon'),
                'no_telepon' => $this->request->getPost('no_telepon'),
                'nik_pemohon' => $this->request->getPost('nik_pemohon'),
                'username' => $this->request->getPost('username'),
                'password' => sha1($this->request->getPost('password')),
            );
            $this->Model_pemohon->add($data);
            session()->setFlashdata('pesan', 'Registrasi Berhasil Ditambahkan, Tunggu Verifikasi Petugas Pelayanan');
            return redirect()->to(base_url('auth/'));
        } else {
            //jika tidak valid
            $validation = \Config\Services::validation()->getErrors();
            session()->setFlashdata('errors', $validation);
            return redirect()->to(base_url('auth/registrasi'))->withInput();
        }
    }

    public function belum_verifikasi()
    {
        $data = [
            'title' => 'Daftar Pemohon Yang Belum Diverifikasi',
            'pengguna' => $this->Model_pemohon->belum_verifikasi(),
        ];
        return view('verifikasi_diproses', $data);
    }

    public function terima_verifikasi()
    {
        $data = [
            'title' => 'Daftar Pemohon Yang Diterima',
            'pengguna' => $this->Model_pemohon->terima_verifikasi(),
        ];
        return view('verifikasi_terima', $data);
    }

    public function tolak_verifikasi()
    {
        $data = [
            'title' => 'Daftar Pemohon Yang Ditolak',
            'pengguna' => $this->Model_pemohon->tolak_verifikasi(),
        ];
        return view('verifikasi_tolak', $data);
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('id_pengguna');
        session()->remove('id_pemohon');
        session()->remove('nama_pemohon');
        session()->remove('role');
        session()->remove('status_akun');
        session()->remove('username');
        session()->remove('password');
        session()->setFlashdata('logout', 'Anda Berhasil LogOut');
        return redirect()->to(base_url('/auth'));
    }
}
