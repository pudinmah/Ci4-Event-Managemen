<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;

class Groups extends ResourcePresenter
{
    // function __construct() {
    // 	$this->group = new GroupModel();
    // }
    protected $modelName = 'App\Models\GroupModel';
    protected $helpers = ['custom'];

    /**
     * Present a view of resource objects.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = [
            'menu' => 'Groups',
            'submenu' => 'Data Group Kontak',
            'title' => 'yukGawe',
            'groups' => $this->model->findAll()
        ];

        return view('pages/group/index', $data);
    }

    /**
     * Present a view to present a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $data = [
            'menu' => 'Groups',
            'submenu' => 'Create Groups',
            'title' => 'yukGawe',
        ];
        return view('pages/group/new', $data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $validate = $this->validate([
            'name_group' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama grup tidak boleh kosong',
                    'min_length' => 'Nama grup minimal 3 karakter',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $this->model->insert($data);
        return redirect()->to(site_url('groups'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Present a view to edit the properties of a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        // Cek apakah data group dengan id tersebut ada
        $group = $this->model->where('id_group', $id)->first();

        if ($group) {
            $data = [
                'menu' => 'Groups',
                'submenu' => 'Edit Groups',
                'title' => 'yukGawe',
                'group' => $group
            ];
            return view('pages/group/edit', $data);
        } else {
            // Jika data tidak ditemukan, tampilkan halaman 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Group dengan ID $id tidak ditemukan.");
        }
    }


    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $validate = $this->validate([
            'name_group' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama grup tidak boleh kosong',
                    'min_length' => 'Nama grup minimal 3 karakter',
                ],
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $this->model->update($id, $data);
        return redirect()->to(site_url('groups'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Present a view to confirm the deletion of a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function remove($id = null)
    {
        //
    }

    /**
     * Process the deletion of a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
