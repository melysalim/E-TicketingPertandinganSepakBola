<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login'); // Menampilkan halaman login
    }

    public function process()
    {
        $session = session();
        $model = new UserModel();

        // Mengambil variabel dari form login
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Ambil user berdasarkan username
        $user = $model->where('username', $username)->first();

        // Verifikasi username dan password
        if ($user && password_verify($password, $user['password'])) {
            // Set session jika login berhasil
            $session->set([
                'logged_in' => true,
                'id' => $user['id'], // Pastikan id user tersimpan
                'username' => $username,
                'role' => $user['role']
            ]);

            // Debugging session
            log_message('debug', 'Session Data: ' . json_encode($session->get()));

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin'); // Redirect ke dashboard admin
            } else {
                return redirect()->to('/customer'); // Redirect ke dashboard customer
            }
        } else {
            // Jika gagal, set flashdata untuk pesan error
            $session->setFlashdata('msg', 'Username atau Password salah');
            return redirect()->to('/login'); // Redirect kembali ke halaman login
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Hapus session
        return redirect()->to('/login'); // Redirect ke halaman login
    }

    public function register()
    {
        helper(['form']); // Memastikan helper form di-load
        return view('auth/register'); // Menampilkan halaman registrasi
    }

    public function registerProcess()
    {
        helper(['form']);
        $model = new UserModel();

        // Mengambil variabel dari form registrasi
        $username = $this->request->getVar('username');
        $email = $this->request->getVar('email');
        $no_telp = $this->request->getVar('no_telp'); // Menyimpan no_telp dari form
        $password = $this->request->getVar('password');
        $password_confirm = $this->request->getVar('password_confirm');

        // Debugging input
        log_message('debug', 'Input diterima: ' . json_encode($this->request->getVar()));

        // Validasi password
        if ($password !== $password_confirm) {
            session()->setFlashdata('msg', 'Password tidak cocok');
            return redirect()->to('/register')->withInput();
        }

        // Cek apakah username sudah ada
        if ($model->where('username', $username)->first()) {
            session()->setFlashdata('msg', 'Username sudah digunakan');
            return redirect()->to('/register')->withInput();
        }

        // Cek apakah email sudah ada
        if ($model->where('email', $email)->first()) {
            session()->setFlashdata('msg', 'Email sudah terdaftar');
            return redirect()->to('/register')->withInput();
        }

        // Hash password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data ke database
        $data = [
            'username' => $username,
            'email' => $email,
            'no_telp' => $no_telp,
            'password' => $password_hash,
            'role' => 'customer'
        ];

        if ($model->save($data)) {
            log_message('debug', 'Data berhasil disimpan: ' . json_encode($data));
            session()->setFlashdata('msg', 'Registrasi berhasil, silakan login');
            return redirect()->to('/login');
        } else {
            log_message('error', 'Data gagal disimpan: ' . json_encode($model->errors()));
            session()->setFlashdata('msg', 'Registrasi gagal, silakan coba lagi.');
            return redirect()->to('/register')->withInput();
        }
    }
}
