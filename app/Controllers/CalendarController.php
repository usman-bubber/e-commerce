<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class CalendarController extends BaseController
{
    public function calendar(): string
    {
        return view('pages/admin/calendar/calendar');
    }
}

