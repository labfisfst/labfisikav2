<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataFisika extends Seeder
{
    public function run()
    {
        // 1. Matikan cek foreign key agar bisa hapus data lama
        $this->db->disableForeignKeyChecks();
        $this->db->table('alat')->truncate();
        $this->db->table('labs')->truncate();
        $this->db->enableForeignKeyChecks();

        // 2. Input Data Laboratorium (Sesuai PDF Halaman 2-8)
        $dataLabs = [
            [
                'id' => 1, 
                'nama_lab' => 'Laboratorium Basic Physics', 
                'deskripsi' => 'Praktikum fisika dasar untuk jurusan fisika dan umum.'
            ],
            [
                'id' => 2, 
                'nama_lab' => 'Laboratorium Advance Physics', 
                'deskripsi' => 'Praktikum fisika lanjut, elektronika dasar dan lanjut.'
            ],
            [
                'id' => 3, 
                'nama_lab' => 'Laboratorium Modeling', 
                'deskripsi' => 'Fisika komputasi dan penelitian simulasi.'
            ],
            [
                'id' => 4, 
                'nama_lab' => 'Laboratorium Astrophysics', 
                'deskripsi' => 'Penelitian sifat fisik benda langit dan simulasi.'
            ],
            [
                'id' => 5, 
                'nama_lab' => 'Laboratorium Characteristic', 
                'deskripsi' => 'Fisika material, sifat fisik bahan dengan pendekatan citra.'
            ],
            [
                'id' => 6, 
                'nama_lab' => 'Laboratorium Instrumentation', 
                'deskripsi' => 'Penelitian alat ukur, sensor, dan robotika.'
            ],
            [
                'id' => 7, 
                'nama_lab' => 'Laboratorium Nuclear & Energi', 
                'deskripsi' => 'Fisika nuklir medis dan zat radioaktif radiasi kecil.'
            ],
            [
                'id' => 8, 
                'nama_lab' => 'Laboratorium Geophysics', 
                'deskripsi' => 'Fisika bumi, seismik, dan eksplorasi bumi.'
            ],
            [
                'id' => 9, 
                'nama_lab' => 'Laboratorium Fisika Material (Fismatel)', 
                'deskripsi' => 'Bahan, nano material, dan nanoteknologi.'
            ],
            [
                'id' => 10, 
                'nama_lab' => 'Mechanical Workshop', 
                'deskripsi' => 'Perbengkelan, project mahasiswa, dan rancang bangun instrumen.'
            ],
        ];
        $this->db->table('labs')->insertBatch($dataLabs);


        // 3. Input Data Alat (Sesuai PDF Halaman 9-12)
        $dataAlat = [
            // --- Lab Advance Physics (ID: 2) ---
            ['lab_id' => 2, 'nama_alat' => 'Kit Efek Hall', 'tahun' => '2015', 'fungsi' => 'Mengukur tegangan Hall sebagai fungsi arus dan medan magnet', 'kondisi' => 'Baik'],
            ['lab_id' => 2, 'nama_alat' => 'Kit Spektrometer Kisi', 'tahun' => '2015', 'fungsi' => 'Mengamati dan mengukur sudut deviasi cahaya', 'kondisi' => 'Baik'],
            ['lab_id' => 2, 'nama_alat' => 'Kit Solar Sel', 'tahun' => '2015', 'fungsi' => 'Mengamati dan mengukur peristiwa sel surya', 'kondisi' => 'Baik'],
            ['lab_id' => 2, 'nama_alat' => 'Kit Interferometer Michelson', 'tahun' => '2015', 'fungsi' => 'Eksperimen interferensi dua gelombang cahaya', 'kondisi' => 'Baik'],
            ['lab_id' => 2, 'nama_alat' => 'Bernoulli Tube', 'tahun' => '2016', 'fungsi' => 'Percobaan dinamika fluida, tekanan, dan kecepatan', 'kondisi' => 'Baik'],

            // --- Lab Astrophysics (ID: 4) ---
            ['lab_id' => 4, 'nama_alat' => 'Teleskop Sc 280/2800', 'tahun' => '2015', 'fungsi' => 'Mengamati benda langit', 'kondisi' => 'Baik'],
            ['lab_id' => 4, 'nama_alat' => 'Kamera Astronomi', 'tahun' => '2018', 'fungsi' => 'Penangkap gambar objek astronomi', 'kondisi' => 'Baik'],
            ['lab_id' => 4, 'nama_alat' => 'Sky Quality Meter', 'tahun' => '2018', 'fungsi' => 'Mengamati kecerahan langit', 'kondisi' => 'Baik'],
            ['lab_id' => 4, 'nama_alat' => 'Solar Filter', 'tahun' => '2018', 'fungsi' => 'Melindungi mata/kamera dari sengatan matahari', 'kondisi' => 'Baik'],

            // --- Lab Basic Physics (ID: 1) ---
            ['lab_id' => 1, 'nama_alat' => 'Neraca Empat Lengan', 'tahun' => '2017', 'fungsi' => 'Alat ukur massa', 'kondisi' => 'Baik'],
            ['lab_id' => 1, 'nama_alat' => 'Audio Generator', 'tahun' => '2017', 'fungsi' => 'Pembangkit gelombang', 'kondisi' => 'Baik'],
            ['lab_id' => 1, 'nama_alat' => 'Kit Optik', 'tahun' => '2017', 'fungsi' => 'Mempelajari sifat cahaya, lensa, dan cermin', 'kondisi' => 'Baik'],
            ['lab_id' => 1, 'nama_alat' => 'Kit Mekanika', 'tahun' => '2017', 'fungsi' => 'Percobaan dan demonstrasi mekanika', 'kondisi' => 'Baik'],
            ['lab_id' => 1, 'nama_alat' => 'Basic Meter', 'tahun' => '2016', 'fungsi' => 'Alat ukur tegangan dan kuat arus listrik', 'kondisi' => 'Baik'],
            ['lab_id' => 1, 'nama_alat' => 'Jangka Sorong', 'tahun' => '2013', 'fungsi' => 'Mengukur diameter luar/dalam benda presisi', 'kondisi' => 'Baik'],
            ['lab_id' => 1, 'nama_alat' => 'Pesawat Atwood', 'tahun' => '2007', 'fungsi' => 'Mengamati hukum mekanika gerak', 'kondisi' => 'Baik'],
            ['lab_id' => 1, 'nama_alat' => 'Tabung Resonansi', 'tahun' => '2012', 'fungsi' => 'Percobaan dan demonstrasi bunyi', 'kondisi' => 'Baik'],

            // --- Lab Characteristic (ID: 5) ---
            ['lab_id' => 5, 'nama_alat' => 'SEM (Scanning Electron Microscope)', 'tahun' => '2015', 'fungsi' => 'Mengkaji struktur morfologi permukaan bahan', 'kondisi' => 'Baik'],
            ['lab_id' => 5, 'nama_alat' => 'Fluorescence Spectrophotometer', 'tahun' => '2015', 'fungsi' => 'Pengukuran intensitas cahaya fluoresensi', 'kondisi' => 'Baik'],

            // --- Lab Nuclear & Energi (ID: 7) ---
            ['lab_id' => 7, 'nama_alat' => 'Scintillation Counter', 'tahun' => '2015', 'fungsi' => 'Mendeteksi dan mengukur radiasi pengion', 'kondisi' => 'Baik'],
            ['lab_id' => 7, 'nama_alat' => 'Detecting Radioactivity Kit', 'tahun' => '2015', 'fungsi' => 'Mendeteksi radioaktivitas', 'kondisi' => 'Baik'],

            // --- Lab Fismatel (ID: 9) ---
            ['lab_id' => 9, 'nama_alat' => 'Furnace', 'tahun' => '2016', 'fungsi' => 'Memanaskan zat dengan suhu tinggi', 'kondisi' => 'Baik'],
            ['lab_id' => 9, 'nama_alat' => 'Microwave', 'tahun' => '2019', 'fungsi' => 'Memanaskan zat dengan gelombang mikro', 'kondisi' => 'Baik'],
            ['lab_id' => 9, 'nama_alat' => 'Magnetic Stirrer', 'tahun' => '2017', 'fungsi' => 'Mengaduk dan memanaskan larutan', 'kondisi' => 'Baik'],

            // --- Lab Geophysics (ID: 8) ---
            ['lab_id' => 8, 'nama_alat' => 'GPR (Ground Penetrating Radar)', 'tahun' => '2015', 'fungsi' => 'Deteksi benda terkubur di bawah tanah', 'kondisi' => 'Baik'],
            ['lab_id' => 8, 'nama_alat' => 'GPS Geodetik', 'tahun' => '2015', 'fungsi' => 'Alat panduan navigasi presisi tinggi', 'kondisi' => 'Baik'],
            ['lab_id' => 8, 'nama_alat' => 'Proton Precision Magnetometer', 'tahun' => '2015', 'fungsi' => 'Mengetahui jenis permukaan bawah tanah', 'kondisi' => 'Baik'],

            // --- Lab Instrumentation (ID: 6) ---
            ['lab_id' => 6, 'nama_alat' => 'Humanoid Robotic', 'tahun' => '2015', 'fungsi' => 'Percobaan dan demonstrasi robotika', 'kondisi' => 'Baik'],
            ['lab_id' => 6, 'nama_alat' => 'Printer 3D', 'tahun' => '2019', 'fungsi' => 'Membuat objek tiga dimensi', 'kondisi' => 'Baik'],
            ['lab_id' => 6, 'nama_alat' => 'CNC Engraving', 'tahun' => '2019', 'fungsi' => 'Memotong, menggrafir, dan memberi marka', 'kondisi' => 'Baik'],
            ['lab_id' => 6, 'nama_alat' => 'Raspberry Pi 3', 'tahun' => '2019', 'fungsi' => 'Mini PC untuk kontrol instrumen', 'kondisi' => 'Baik'],
            ['lab_id' => 6, 'nama_alat' => 'Osiloskop Digital', 'tahun' => '2019', 'fungsi' => 'Mengamati bentuk gelombang sinyal listrik', 'kondisi' => 'Baik'],

            // --- Lab Modeling (ID: 3) ---
            ['lab_id' => 3, 'nama_alat' => 'Server High Performance', 'tahun' => '2018', 'fungsi' => 'Running pemodelan fisika dan simulasi', 'kondisi' => 'Baik'],
            ['lab_id' => 3, 'nama_alat' => 'Workstation CPU', 'tahun' => '2019', 'fungsi' => 'Media pembelajaran dan komputasi', 'kondisi' => 'Baik'],

            // --- Mechanical Workshop (ID: 10) ---
            ['lab_id' => 10, 'nama_alat' => 'Lathe Machine (Mesin Bubut)', 'tahun' => '2015', 'fungsi' => 'Pembubutan benda kerja', 'kondisi' => 'Baik'],
            ['lab_id' => 10, 'nama_alat' => 'Milling Machine', 'tahun' => '2015', 'fungsi' => 'Pengeboran dan pemotongan material presisi', 'kondisi' => 'Baik'],
            ['lab_id' => 10, 'nama_alat' => 'Welding Point', 'tahun' => '2015', 'fungsi' => 'Penyambung dua komponen logam (Las)', 'kondisi' => 'Baik'],
            ['lab_id' => 10, 'nama_alat' => 'Drilling Machine', 'tahun' => '2015', 'fungsi' => 'Membuat lubang silinder pada benda kerja', 'kondisi' => 'Baik'],
        ];

        $this->db->table('alat')->insertBatch($dataAlat);
    }
}