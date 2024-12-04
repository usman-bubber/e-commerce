<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class ChangePasswordController extends BaseController
{
    public function change_password(): string
    {
        return view('pages/admin/change-password/change-password');
    }
}

