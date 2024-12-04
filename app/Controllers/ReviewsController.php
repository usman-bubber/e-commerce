<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class ReviewsController extends BaseController
{
    public function review_list()
    {
        return view('pages/admin/review/review-list');
    }
    public function review_detail()
    {
        return view('pages/admin/review/review-detail');
    }
    public function add_review()
    {
        return view('pages/admin/review/review-add');
    }
    public function edit_review()
    {
        return view('pages/admin/review/review-edit');
    }
}

