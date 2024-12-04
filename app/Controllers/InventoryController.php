<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class InventoryController extends BaseController
{
    public function inventory_warehouse()
    {
        return view('pages/admin/inventory/inventory-warehouse');
    }
    public function inventory_received_order()
    {
        return view('pages/admin/inventory/inventory-received-orders');
    }
}
