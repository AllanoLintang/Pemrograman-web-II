<?php 
namespace App\Controllers;
use App\Models\BukuModel;

class Buku extends BaseController{
    protected $bukuModel; 

    public function __construct() {
        $this->bukuModel = new BukuModel(); 
    }
    
    public function index() {
        $data['buku'] = $this->bukuModel->findAll();
        return view('layout/navbar').view('buku/index', $data);
    }
    
    public function create() {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('layout/navbar').view('buku/create', $data);
    }
    
    public function save(){
        helper(['form', 'session']);
        $rules = [
            'judul' => [
                'rules' => 'required|regex_match[/^[\w\s\-.,]+$/]',
                'errors' => [
                    'required' => 'Judul Buku Harus Diisi',
                    'regex_match' => 'Judul Buku Harus String'
                ]
            ],
            'penulis' => [
                'rules' => 'required|regex_match[/^[\w\s\-.,]+$/]',
                'errors' => [
                    'required' => 'Penulis Buku Harus Diisi',
                    'regex_match' => 'Penulis Buku Harus String'
                ]
            ],
            'penerbit' => [
                'rules' => 'required|regex_match[/^[\w\s\-.,]+$/]',
                'errors' => [
                    'required' => 'Penerbit Buku Harus Diisi',
                    'regex_match' => 'Penerbit Buku Harus String'
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun Terbit Buku Harus Diisi',
                    'numeric' => 'Tahun Terbit Harus Angka',
                    'greater_than' => 'Tahun Terbit Harus Lebih Dari 1800',
                    'less_than' => 'Tahun Terbit Harus Kurang Dari 2024'
                ]
            ]
            ];
            if(!$this->validate($rules)){
                return redirect()->to('buku/create')->withInput()->with('errors', $this->validator->getErrors());
            }

        $this->bukuModel->save([
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);

        session()->setFlashdata('success', 'Data Buku Berhasil Ditambahkan');

        return redirect()->to('/');
    }

    public function delete($id){
        $this->bukuModel->delete($id);
        return redirect()->to('/');
    }

    public function edit($id){
        $data = [
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->find($id)
        ];
        return view('layout/navbar').view('buku/edit', $data);
    }

    public function update($id){
        helper(['form', 'session']);
        $rules = [
            'judul' => [
                'rules' => 'required|regex_match[/^[\w\s\-.,]+$/]',
                'errors' => [
                    'required' => 'Judul Buku Harus Diisi',
                    'regex_match' => 'Judul Buku Harus String'
                ]
            ],
            'penulis' => [
                'rules' => 'required|regex_match[/^[\w\s\-.,]+$/]',
                'errors' => [
                    'required' => 'Penulis Buku Harus Diisi',
                    'regex_match' => 'Penulis Buku Harus String'
                ]
            ],
            'penerbit' => [
                'rules' => 'required|regex_match[/^[\w\s\-.,]+$/]',
                'errors' => [
                    'required' => 'Penerbit Buku Harus Diisi',
                    'regex_match' => 'Penerbit Buku Harus String'
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
                'errors' => [
                    'required' => 'Tahun Terbit Buku Harus Diisi',
                    'numeric' => 'Tahun Terbit Harus Angka',
                    'greater_than' => 'Tahun Terbit Harus Lebih Dari 1800',
                    'less_than' => 'Tahun Terbit Harus Kurang Dari 2024'
                ]
            ]
            ];
            if(!$this->validate($rules)){
                return redirect()->to('buku/edit')->withInput()->with('errors', $this->validator->getErrors());
            }
        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);

        session()->setFlashdata('success', 'Data Buku Berhasil Diubah');

        return redirect()->to('/');
    }
}

?>