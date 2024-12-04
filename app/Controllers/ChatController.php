<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class ChatController extends BaseController
{
    public function chat(): string
    {
        return view('pages/admin/chat/chat');
    }
}

