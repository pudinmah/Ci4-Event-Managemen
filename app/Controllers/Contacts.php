<?php

namespace App\Controllers;



use App\Models\ContactModel;
use App\Models\GroupModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Contacts extends ResourceController
{

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

    // https://phpspreadsheet.readthedocs.io/en/latest/
    public function export()
    {
        // Menentukan nama file berdasarkan tanggal
        $filename = "contacts-" . date('ymd') . ".xlsx";

        // Ambil keyword dari parameter GET untuk pencarian
        $keyword = $this->request->getGet('keyword');

        // Query data dari database dengan join ke tabel groups
        $db = \Config\Database::connect();
        $builder = $db->table('contacts');
        $builder->join('groups', 'groups.id_group = contacts.id_group');

        // Jika ada keyword, lakukan filter data berdasarkan beberapa kolom
        if ($keyword != '') {
            $builder->like('name_contact', $keyword);
            $builder->orLike('name_alias', $keyword);
            $builder->orLike('address', $keyword);
            $builder->orLike('phone', $keyword);
            $builder->orLike('email', $keyword);
            $builder->orLike('name_group', $keyword);
            $filename = "contacts-filter-" . date('ymd') . ".xlsx";
        }

        // Jalankan query dan ambil hasil
        $query = $builder->get();
        $contacts = $query->getResult();

        // Buat file Excel dan set header kolom
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Alias');
        $sheet->setCellValue('D1', 'Telepon');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Alamat');
        $sheet->setCellValue('G1', 'Info');

        // Isi data kontak ke dalam sheet Excel
        $column = 2;
        foreach ($contacts as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->name_contact);
            $sheet->setCellValue('C' . $column, $value->name_alias);
            $sheet->setCellValue('D' . $column, $value->phone);
            $sheet->setCellValue('E' . $column, $value->email);
            $sheet->setCellValue('F' . $column, $value->address);
            $sheet->setCellValue('G' . $column, $value->info_contact);
            $column++;
        }

        // Atur style: header bold, background kuning, border tabel
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A1:G1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:G' . ($column - 1))->applyFromArray($styleArray);

        // Set lebar kolom otomatis
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        // Kirim file ke browser untuk didownload sebagai Excel
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename);
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }


    // https://phpspreadsheet.readthedocs.io/en/latest/topics/reading-and-writing-to-file/
    public function import()
    {
        // Ambil file Excel yang diupload
        $file = $this->request->getFile('file_excel');

        // Cek ekstensi file (harus xls atau xlsx)
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {

            // Tentukan reader yang sesuai berdasarkan ekstensi
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            // Baca file Excel dan konversi ke array
            $spreadsheet = $reader->load($file);
            $contacts = $spreadsheet->getActiveSheet()->toArray();

            // Looping data dari baris kedua
            foreach ($contacts as $key => $value) {
                if ($key == 0) {
                    continue; // Lewati baris header
                }

                // Siapkan data yang akan disimpan ke database
                $data = [
                    'name_contact' => $value[1],
                    'name_alias' => $value[2],
                    'phone' => $value[3],
                    'email' => $value[4],
                    'address' => $value[5],
                    'info_contact' => $value[6],
                    'id_group' => 1, // Default group
                ];

                // Simpan data ke tabel contacts
                $this->contact->insert($data);
            }

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Data Excel Berhasil Diimport');
        } else {
            // Jika format file tidak sesuai
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }
}
