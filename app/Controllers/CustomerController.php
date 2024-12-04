<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class CustomerController extends BaseController
{
    public function customer_list()
    {
        return view('pages/admin/customers/customer-list');
    }
    public function customer_detail()
    {
        return view('pages/admin/customers/customer-detail');
    }
}

