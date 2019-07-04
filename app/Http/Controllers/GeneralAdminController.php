<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralAdminController extends Controller
{
    public function showdashboard()
    {
        return view('generaladmin.index');
    }
}
