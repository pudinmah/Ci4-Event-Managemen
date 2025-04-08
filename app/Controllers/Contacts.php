<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\GroupModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Contacts extends ResourceController
{
    protected $helpers = ['custom'];


    function __construct()
    {
        $this->group = new GroupModel();
        $this->contact = new ContactModel();
    }

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = [
            'menu' => 'Contacts',
            'submenu' => 'Data Kontak Saya',
            'title' => 'yukGawe',
            'contacts' => $this->contact->getAll()
        ];

        return view('pages/contact/index', $data);
    }

    /**
     * Return the properties of a resource object.
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
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $data = [
            'menu' => 'Contacts',
            'submenu' => 'Data Kontak Saya',
            'title' => 'yukGawe',
            'groups' => $this->group->findAll()
        ];
        return view('pages/contact/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = $this->request->getPost();
        $save = $this->contact->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->contact->errors());
        } else {
            return redirect()->to(site_url('contacts'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
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
