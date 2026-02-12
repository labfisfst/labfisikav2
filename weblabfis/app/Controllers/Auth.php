<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        // Jika user sudah login, arahkan ke halaman utama
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        return view('login');
    }

    public function process()
    {
        $db = \Config\Database::connect();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user di tabel users
        $user = $db->table('users')->where('username', $username)->get()->getRowArray();

        if ($user) {
            // Cek apakah password cocok
            if (password_verify($password, $user['password'])) {
                // Set Session
                session()->set([
                    'username'  => $user['username'],
                    'nama'      => $user['nama_lengkap'],
                    'logged_in' => true
                ]);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('error', 'Password Salah!');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('error', 'Username Tidak Ditemukan!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}