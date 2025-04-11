<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
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
                throw PageNotFoundException::forPageNotFound();
            }
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }


    public function update($id)
    {
        // Pastikan data ada
        $gawe = $this->db->table('gawe')->where(['id_gawe' => $id])->get()->getRow();
        if (!$gawe) {
            return redirect()->to(site_url('gawe'))->with('error', 'Data tidak ditemukan');
        }
    
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
            'image_gawe' => [
                'label' => 'Gambar',
                'rules' => [
                    // 'uploaded[image_gawe]', // opsional jika gambar wajib diubah
                    'is_image[image_gawe]',
                    'mime_in[image_gawe,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[image_gawe,100]',
                    'max_dims[image_gawe,1024,768]',
                ],
                'errors' => [
                    'is_image' => 'File harus berupa gambar.',
                    'mime_in' => 'Format gambar tidak diperbolehkan.',
                    'max_size' => 'Ukuran gambar maksimal 100KB.',
                    'max_dims' => 'Ukuran dimensi maksimal 1024x768 px.',
                ],
            ],
        ]);
    
        if (!$validate) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal. Periksa input Anda.');
        }
    
        $data = [
            'name_gawe' => $this->request->getPost('name_gawe'),
            'title_gawe' => $this->request->getPost('title_gawe'),
            'place_gawe' => $this->request->getPost('place_gawe'),
            'address_gawe' => $this->request->getPost('address_gawe'),
            'date_gawe' => $this->request->getPost('date_gawe'),
            'end_gawe' => $this->request->getPost('end_gawe'),
            'info_gawe' => $this->request->getPost('info_gawe'),
        ];
    
        // Handle image jika di-upload
        $image = $this->request->getFile('image_gawe');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/gawe/', $newName);
    
            // Hapus file lama jika ada
            if (!empty($gawe->image_gawe) && file_exists('uploads/gawe/' . $gawe->image_gawe)) {
                unlink('uploads/gawe/' . $gawe->image_gawe);
            }
    
            $data['image_gawe'] = $newName;
        }
    
        // Simpan data
        $this->db->table('gawe')->where(['id_gawe' => $id])->update($data);
    
        return redirect()->to(site_url('gawe'))->with('success', 'Data berhasil diperbarui');
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
