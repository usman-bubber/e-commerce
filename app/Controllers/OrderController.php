<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class OrderController extends BaseController
{
    public function order_list()
    {
        return view('pages/admin/order/orders-list');
    }
    public function order_detail()
    {
        return view('pages/admin/order/order-detail');
    }
    public function edit_order()
    {
        return view('pages/admin/order/order-edit');
    }

}

