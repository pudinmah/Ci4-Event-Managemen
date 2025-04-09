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
        $keyword = $this->request->getGet('keyword');
        $limit = $this->request->getGet('limit') ?? 4; // default 10 jika tidak di-set

        $pagination = $this->contact->getPaginated($limit, $keyword);

        $data = [
            'menu' => 'Contacts',
            'submenu' => 'Data Kontak Saya',
            'title' => 'yukGawe',
            'contacts' => $pagination['contacts'],
            'pager' => $pagination['pager'],
            'limit' => $limit, // untuk menjaga nilai limit di form
            'keyword' => $keyword, // untuk menjaga keyword di form
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
        $contact = $this->contact->find($id);
        if (is_object($contact)) {
            $data = [
                'menu' => 'Contacts',
                'submenu' => 'Update Contact',
                'title' => 'yukGawe',
                'contact' => $contact,
                'groups' => $this->group->findAll()
            ];
            return view('pages/contact/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
        $data = $this->request->getPost();
        $save = $this->contact->update($id, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->contact->errors());
        } else {
            return redirect()->to(site_url('contacts'))->with('success', 'Data Berhasil Diupdate');
        }
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
        $this->contact->delete($id);
        return redirect()->to(site_url('contacts'))->with('success', 'Data Berhasil Dihapus');
    }
}
