<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class PassportController extends Controller
{
    public function GET_index()
    {
        $params = array();
        return view('passport.index', $params);
    }
}
