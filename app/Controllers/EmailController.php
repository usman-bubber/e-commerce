<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class EmailController extends BaseController
{
    public function email(): string
    {
        return view('pages/admin/email/email');
    }
}

