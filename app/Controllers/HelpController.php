<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class HelpController extends BaseController
{
    public function help(): string
    {
        return view('pages/admin/help/help');
    }
}

