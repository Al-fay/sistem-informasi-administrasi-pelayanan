<?php

namespace App\Controllers;

use App\Models\Model_auth;

class Admin extends BaseController
{
    protected $Model_auth;

    public function __construct()
    {
        helper("form");
        $this->Model_auth = new Model_auth();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Login Admin'
        ];
        return view('login_admin', $data);
    }

    public function login_admin()
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
            $cek = $this->Model_auth->login($username, $password);
            if ($cek) {
                //jika login berhasil
                session()->set('log', true);
                session()->set('id_pengguna', $cek['id_pengguna']);
                session()->set('role', $cek['role']);
                if ($cek['role'] == 'petugas') {
                    return redirect()->to(base_url('Petugas'));
                } else {
                    return redirect()->to(base_url('Laporan'));
                }
            } else {
                //jika login gagal
                session()->setFlashdata('gagal', 'username dan password tidak valid');
                return redirect()->to(base_url('/admin'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/admin'));
        }
    }
}
