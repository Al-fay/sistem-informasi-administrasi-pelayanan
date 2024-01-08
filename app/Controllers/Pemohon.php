<?php

namespace App\Controllers;

class Pemohon extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('pemohon/home', $data);
    }
}
