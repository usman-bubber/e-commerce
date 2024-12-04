<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class PermissionController extends BaseController
{
    public function permission_list()
    {
        return view('pages/admin/permission/permission-list');
    }
}

