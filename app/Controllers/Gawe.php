<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Gawe extends BaseController
{
    public function index()
    {
        // https://codeigniter.com/user_guide/database/query_builder.html
        // cara 1 : query builder
        $builder = $this->db->table('gawe');
        $query   = $builder->get();

        // cara 2 : query manual
        // $query = $this->db->query("SELECT * FROM gawe");

        // cek value table gawe
        // echo "<pre>";
        // print_r($query->getResult());
        // echo "</pre>";

        $data = [
            'judul' => 'Gawe',
            'subjudul' => 'Data Gawe / Acara',
            'gawe' => $query->getResult()
        ];

        return view('pages/gawe/get.php', $data);
    }
}
