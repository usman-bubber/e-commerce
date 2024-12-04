<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class SellersController extends BaseController
{
    public function seller_list()
    {
        return view('pages/admin/seller/seller-list');
    }
    public function add_seller()
    {
        return view('pages/admin/seller/seller-add');
    }
    public function seller_detail()
    {
        return view('pages/admin/seller/seller-details');
    }
    public function edit_seller()
    {
        return view('pages/admin/seller/seller-edit');
    }
}
