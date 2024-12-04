<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('pages/admin/index');
    }
    public function setting()
    {
        return view('pages/admin/setting/settings');
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        $session->setFlashdata('success', 'You have successfully logged out.');
        return redirect()->to(base_url('login'));
    }
}
