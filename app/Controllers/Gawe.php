<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Gawe extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Gawe',
            'subjudul' => 'Halaman Gawe',
        ];
        return view('pages/gawe/get.php', $data);
    }
}
