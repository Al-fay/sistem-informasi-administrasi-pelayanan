<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Administrasi Pelayanan Kelurahan Kedungwuni Barat',
        ];
        return view('pages/index', $data);
    }
}
