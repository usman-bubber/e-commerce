<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class PrivacyPolicyController extends BaseController
{
    public function privacy_policy(): string
    {
        return view('pages/admin/privacy-policy/privacy-policy');
    }
}

