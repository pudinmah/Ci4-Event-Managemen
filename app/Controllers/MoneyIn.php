<?php

namespace App\Controllers;

use App\Models\MoneyModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class MoneyIn extends ResourceController
{
    public function __construct()
    {
        $this->moneyModel = model('MoneyModel');
        $this->db = db_connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pemasukan',
            'money' => $this->moneyModel->getAll('in'),
            'gawe' => $this->db->table('gawe')->get()->getResult(),
        ];
        return view('pages/money/in/index', $data);
    }


    public function create()
    {
        $post = $this->request->getPost();
        $post['type_money'] = 'in';
        $this->moneyModel->insert($post);
        return redirect()->to('moneyin')->with('success', 'Data Berhasil Disimpan');
    }


    public function update($id = null)
    {
        // Ambil semua data yang dikirim lewat POST
        $post = $this->request->getPost();
        $update = $this->moneyModel->update($id, $post);

        // Cek apakah proses update berhasil
        if ($update) {
            return redirect()->to(site_url('moneyin'))->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->to(site_url('moneyin'))->with('error', 'Data gagal diperbarui!');
        }
    }



    public function delete($id = null)
    {
        $delete = $this->moneyModel->delete($id);

        if ($delete) {
            return redirect()->to(site_url('moneyin'))->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->to(site_url('moneyin'))->with('error', 'Data gagal dihapus!');
        }
    }
}
