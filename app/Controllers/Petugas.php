<?php

namespace App\Controllers;

class Petugas extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('petugas/home', $data);
    }
}
