<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class InvoiceController extends BaseController
{
    public function invoice_list()
    {
        return view('pages/admin/invoice/invoice-list');
    }
    public function invoice_detail()
    {
        return view('pages/admin/invoice/invoice-details');
    }
    public function edit_invoice()
    {
        return view('pages/admin/invoice/invoice-edit');
    }
    public function add_invoice()
    {
        return view('pages/admin/invoice/invoice-add');
    }
}

