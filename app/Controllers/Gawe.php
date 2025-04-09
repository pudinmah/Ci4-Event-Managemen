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
            'menu' => 'Gawe',
            'submenu' => 'Data Gawe / Acara',
            'title' => 'yukGawe',
            'gawe' => $query->getResult()
        ];

        return view('pages/gawe/get.php', $data);
    }


    public function create()
    {
        $data = [
            'menu' => 'Create Gawe',
            'submenu' => 'Data Gawe / Acara',
            'title' => 'yukGawe',
        ];
        return view('pages/gawe/add', $data);
    }


    public function store()
    {
        // https://codeigniter.com/user_guide/libraries/uploaded_files.html#id6
        $validate = $this->validate([
            'name_gawe' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama gawe tidak boleh kosong',
                    'min_length' => 'Nama gawe minimal 3 karakter',
                ],
            ],
            'date_gawe' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal gawe tidak boleh kosong',
                ],
            ],
            'place_gawe' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat gawe tidak boleh kosong',
                ],
            ],
            'image_gawe' => [
                'label' => 'Image file',
                'rules' => [
                    // 'uploaded[image_gawe]', // (Opsional) Wajib upload jika baris ini diaktifkan
                    'is_image[image_gawe]', // File harus bertipe gambar
                    'mime_in[image_gawe,image/jpg,image/jpeg,image/gif,image/png,image/webp]', // Format gambar yang diperbolehkan
                    'max_size[image_gawe,100]', // Ukuran maksimal file 100KB
                    'max_dims[image_gawe,1024,768]', // Dimensi maksimal gambar 1024x768 piksel
                ],
                'errors' => [
                    'uploaded'  => '{field} wajib diunggah.',
                    'is_image'  => '{field} harus berupa gambar yang valid.',
                    'mime_in'   => '{field} harus dalam format jpg, jpeg, gif, png, atau webp.',
                    'max_size'  => '{field} tidak boleh lebih dari 100KB.',
                    'max_dims'  => '{field} maksimal ukuran 1024x768 piksel.',
                ],
            ],


        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data');
        }

        // cara 1 : name sama
        $data = $this->request->getPost();

        if ($data['end_gawe'] == '') {
            $data['end_gawe'] = null;
        }

        $img = $this->request->getFile('image_gawe');
        if ($img != '') {
            $img->move(ROOTPATH . 'public/uploads/gawe/', $img->getRandomName());
            $data['image_gawe'] = $img->getName();
            if (!$img->hasMoved()) {
                // $filepath = WRITEPATH . 'uploads/' . $img->store();
                // $data = ['uploaded_fileinfo' => new File($filepath)];
                return redirect()->back()->withInput();
            }
        }

        $this->db->table('gawe')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Disimpan');
        }
    }



    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('gawe')->getWhere(['id_gawe' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'menu' => 'Edit Gawe',
                    'submenu' => 'Data Gawe / Acara',
                    'title' => 'yukGawe',
                    'gawe' => $query->getRow()
                ];

                return view('pages/gawe/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    public function update($id)
    {
        $validate = $this->validate([
            'name_gawe' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama gawe tidak boleh kosong',
                    'min_length' => 'Nama gawe minimal 3 karakter',
                ],
            ],
            'date_gawe' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal gawe tidak boleh kosong',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupdate data');
        }

        // cara 2 : name spesifik
        $data = [
            'name_gawe' => $this->request->getPost('name_gawe'),
            'date_gawe' => $this->request->getPost('date_gawe'),
            'info_gawe' => $this->request->getPost('info_gawe'),
        ];
        // unset($data['_method']);

        $this->db->table('gawe')->where(['id_gawe' => $id])->update($data);
        return redirect()->to(site_url('gawe'))->with('success', 'Data Berhasil Diupdate');
    }


    public function delete($id)
    {
        $delete = $this->db->table('gawe')->where(['id_gawe' => $id])->delete();

        if ($delete) {
            return redirect()->to(site_url('gawe'))->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->to(site_url('gawe'))->with('error', 'Data gagal dihapus!');
        }
    }
}
