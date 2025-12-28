<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        log_message('info', 'Login controller called, method: ' . $this->request->getMethod());

        if ($this->session->get('admin_logged_in')) {
            return redirect()->to(site_url('admin'));
        }

        if (strtolower($this->request->getMethod()) === 'post') {
            log_message('info', 'POST request detected');
            log_message('info', 'Raw POST data: ' . $this->request->getBody());
            log_message('info', 'POST data: ' . json_encode($this->request->getPost()));
            // Prevent CSRF issues and ensure proper redirects via site_url

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();
            log_message('info', 'Login attempt for: '.$username.' from IP '. $this->request->getIPAddress());

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    log_message('info', 'Login success for: '.$username.' session id: '. session_id());
                    $this->session->set([
                        'admin_logged_in' => true,
                        'user_id' => $user['id'],
                        'user_name' => $user['name']
                    ]);
                    $this->session->setFlashdata('success', 'Login berhasil. Selamat datang, '.esc($user['name']).'.');
                    return redirect()->to(site_url('admin'));
                } else {
                    log_message('warning', 'Password salah untuk: '.$username);
                    $this->session->setFlashdata('error', 'Password salah.');
                    return redirect()->to(site_url('login'));
                }
            } else {
                log_message('warning', 'User tidak ditemukan: '.$username);
                $this->session->setFlashdata('error', 'User tidak ditemukan.');
                return redirect()->to(site_url('login'));
            }
        }

        return view('login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('/'));
    }
}