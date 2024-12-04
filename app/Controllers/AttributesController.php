<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AttributesController extends BaseController
{
    public function attributes_list()
    {
        return view('pages/admin/attributes/attributes-list');
    }
    public function attributes_detail()
    {
        return view('pages/admin/attributes/attributes-detail');
    }
    public function edit_attributes()
    {
        return view('pages/admin/attributes/attributes-edit');
    }
    public function add_attributes()
    {
        return view('pages/admin/attributes/attributes-add');
    }
}

