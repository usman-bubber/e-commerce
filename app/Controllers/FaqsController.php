<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class FaqsController extends BaseController
{
    public function faqs(): string
    {
        return view('pages/admin/faqs/faqs');
    }
}

