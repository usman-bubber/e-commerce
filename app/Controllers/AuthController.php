<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index(): string
    {
        return view('pages/auth/login');
    }
    public function admin_login()
    {
        $validation = \Config\Services::validation();
        $session = \Config\Services::session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];
        $errors = [
            'email' => [
                'required' => 'Please provide an email.',
                'valid_email' => 'Please provide a valid email address.',
            ],
            'password' => [
                'required' => 'Please provide a password.',
                'min_length' => 'Password must be at least 6 characters long.',
            ],
        ];
        // Set validation rules and check validation
        $validation->setRules($rules, $errors);
        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $userModel = new UserModel();
        $check_user = $userModel->where('email', $email)->first();
        if ($check_user) {
            // Compare plain text password
            if (password_verify($password, $check_user['password'])) {
                // Set session data including role_id
                $session->set([
                    'isUserLoggedIn' => true,
                    'role_id' => $check_user['role_id'],
                ]);
                return redirect()->to('admin/dashboard');
            } else {
                $session->setFlashdata('fail', 'Password does not match.');
                return redirect()->back()->withInput();
            }
        } else {
            $session->setFlashdata('fail', 'Email not found.');
            return redirect()->back()->withInput();
        }
    }
}
