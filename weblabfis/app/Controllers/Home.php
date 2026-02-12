<?php

namespace App\Controllers;

use App\Models\AlatModel;
use App\Models\LabsModel;

class Home extends BaseController
{
    public function __construct()
    {
        $uri = service('uri');
        $method = ($uri->getTotalSegments() >= 2) ? $uri->getSegment(2) : ''; 

        $fiturAdmin = ['tambah', 'simpan', 'update', 'hapus'];

        if (in_array($method, $fiturAdmin) && !session()->get('logged_in')) {
            header('Location: ' . base_url('/login'));
            exit();
        }
    }

    // --- 1. Dashboard ---
    public function index()
    {
        $labModel = new LabsModel(); 
        
        $data = [
            'title' => 'Dashboard Laboratorium Fisika',
            'labs'  => $labModel->findAll()
        ];

        return view('beranda', $data);
    }

    // --- 2. Detail Lab ---
    public function detailLab($id)
    {
        $labModel = new LabsModel(); 
        $alatModel = new AlatModel();

        $lab = $labModel->find($id);

        $keyword = $this->request->getGet('keyword');
        $perPage = $this->request->getGet('per_page') ?? 20; 
        $currentPage = $this->request->getVar('page_alat') ? $this->request->getVar('page_alat') : 1;

        $alatModel->where('lab_id', $id); 

        if ($keyword) {
            $alatModel->groupStart()
                      ->like('nama_alat', $keyword)
                      ->orLike('merek', $keyword)
                      ->orLike('kode_barang', $keyword)
                      ->orLike('kondisi', $keyword)
                      ->groupEnd();
        }

        $dataAlat = $alatModel->orderBy('nama_alat', 'ASC')->paginate($perPage, 'alat');
        $pager = $alatModel->pager;

        $total = $pager->getTotal('alat');
        $start = ($total == 0) ? 0 : ($currentPage - 1) * $perPage + 1;
        $end   = ($total == 0) ? 0 : min($start + $perPage - 1, $total);

        $data = [
            'title'   => 'Inventaris: ' . $lab['nama_lab'],
            'lab'     => $lab,
            'alat'    => $dataAlat,
            'pager'   => $pager,
            'keyword' => $keyword,
            'perPage' => $perPage,
            'start'   => $start,
            'end'     => $end,
            'total'   => $total,
            'nomor'   => $start 
        ];

        return view('detail_lab', $data);
    }

    // --- 3. Form Tambah ---
    public function tambah()
    {
        $labModel = new LabsModel(); 
        $selectedLab = $this->request->getGet('lab_id');

        $data = [
            'title' => 'Tambah Alat Baru',
            'labs'  => $labModel->findAll(),
            'selectedLab' => $selectedLab
        ];
        return view('tambah_alat', $data);
    }

    // --- 4. Proses Simpan (DENGAN KOLOM BARU) ---
    public function simpan()
    {
        $alatModel = new AlatModel();
        
        $fileGambar = $this->request->getFile('gambar');

        // Cek apakah ada gambar yang diupload
        if ($fileGambar && $fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg'; 
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
        }
        
        $data = [
            'nama_alat'   => $this->request->getPost('nama_alat'),
            'merek'       => $this->request->getPost('merek'),
            'kode_barang' => $this->request->getPost('kode_barang'),
            'lab_id'      => $this->request->getPost('lab_id'),
            'tahun'       => $this->request->getPost('tahun'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'satuan'      => $this->request->getPost('satuan'),
            'kondisi'     => $this->request->getPost('kondisi'),
            'fungsi'      => $this->request->getPost('fungsi'),
            'gambar'      => $namaGambar 
        ];

        $alatModel->save($data);
        return redirect()->to('/lab/' . $data['lab_id'])->with('pesan', 'Data berhasil ditambahkan!');
    }

    // --- 5. Semua Alat ---
    public function semuaAlat()
    {
        $alatModel = new AlatModel();
        
        $keyword = $this->request->getGet('keyword');
        $perPage = $this->request->getGet('per_page') ?? 20; 
        $currentPage = $this->request->getVar('page_alat') ? $this->request->getVar('page_alat') : 1;

        $alatModel->select('alat.*, labs.nama_lab')
                  ->join('labs', 'labs.id = alat.lab_id');

        if ($keyword) {
            $alatModel->groupStart()
                      ->like('nama_alat', $keyword)
                      ->orLike('merek', $keyword)
                      ->orLike('kode_barang', $keyword)
                      ->orLike('labs.nama_lab', $keyword)
                      ->orLike('kondisi', $keyword)
                      ->groupEnd();
        }

        $dataAlat = $alatModel->orderBy('labs.nama_lab', 'ASC')->paginate($perPage, 'alat');
        $pager = $alatModel->pager;

        $total = $pager->getTotal('alat');
        $start = ($total == 0) ? 0 : ($currentPage - 1) * $perPage + 1;
        $end   = ($total == 0) ? 0 : min($start + $perPage - 1, $total);

        $data = [
            'title'   => 'Semua Daftar Alat',
            'keyword' => $keyword,
            'perPage' => $perPage,
            'alat'    => $dataAlat,
            'pager'   => $pager,
            'start'   => $start,
            'end'     => $end,
            'total'   => $total,
            'nomor'   => $start
        ];

        return view('semua_alat', $data);
    }

    // --- 6. Form Edit ---
    public function edit($id)
    {
        $alatModel = new AlatModel();
        $labModel = new LabsModel(); 

        $data = [
            'title' => 'Edit Data Alat',
            'alat'  => $alatModel->find($id),
            'labs'  => $labModel->findAll()
        ];

        return view('edit_alat', $data);
    }

    // --- 7. Proses Update (DENGAN KOLOM BARU) ---
    public function update($id)
    {
        $alatModel = new AlatModel();
        $alatLama = $alatModel->find($id);
        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar && $fileGambar->getError() == 4) {
            $namaGambar = $alatLama['gambar'];
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);

            if ($alatLama['gambar'] != 'default.jpg' && !empty($alatLama['gambar'])) {
                $pathLama = 'img/' . $alatLama['gambar'];
                if (file_exists($pathLama)) {
                    unlink($pathLama);
                }
            }
        }

        $data = [
            'nama_alat'   => $this->request->getPost('nama_alat'),
            'merek'       => $this->request->getPost('merek'),
            'kode_barang' => $this->request->getPost('kode_barang'),
            'lab_id'      => $this->request->getPost('lab_id'),
            'tahun'       => $this->request->getPost('tahun'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'satuan'      => $this->request->getPost('satuan'),
            'fungsi'      => $this->request->getPost('fungsi'),
            'kondisi'     => $this->request->getPost('kondisi'),
            'gambar'      => $namaGambar 
        ];

        $alatModel->update($id, $data);

        return redirect()->to('/lab/' . $data['lab_id'])->with('pesan', 'Data berhasil diperbarui!');
    }

    // --- 8. Proses Hapus ---
    public function hapus($id)
    {
        $alatModel = new AlatModel();
        $alat = $alatModel->find($id);
        
        if($alat) {
            $lab_id = $alat['lab_id']; 

            if ($alat['gambar'] != 'default.jpg' && !empty($alat['gambar'])) {
                $path = 'img/' . $alat['gambar'];
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $alatModel->delete($id);
            return redirect()->to('/lab/' . $lab_id)->with('pesan', 'Data berhasil dihapus!'); 
        }
        
        return redirect()->back();
    }

    public function setupDb()
    {
        $db = \Config\Database::connect();
        $query1 = "CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(100) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL, nama_lengkap VARCHAR(100), created_at DATETIME DEFAULT CURRENT_TIMESTAMP)";
        $db->query($query1);

        $cek = $db->query("SELECT * FROM users WHERE username = 'admin'")->getRow();
        if (!$cek) {
            $passwordHash = password_hash('admin123', PASSWORD_DEFAULT);
            $db->query("INSERT INTO users (username, password, nama_lengkap) VALUES ('admin', '$passwordHash', 'Administrator Lab')");
        }
        
        echo "✅ Setup Berhasil. <a href='/login'>Login Sekarang</a>";
    }
    public function simpan_booking()

}