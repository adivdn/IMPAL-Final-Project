<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
class dashboard extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }
}
