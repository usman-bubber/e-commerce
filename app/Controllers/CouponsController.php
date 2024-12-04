<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class CouponsController extends BaseController
{
    public function coupon_list()
    {
        return view('pages/admin/coupon/coupons-list');
    }
    public function add_coupon()
    {
        return view('pages/admin/coupon/coupons-add');
    }
}
