<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
    *   Method      : adminDashboard
    *   Description : This is for admin dashboard.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/

    public function adminDashboard()
    {
         return view('admin.admin_dashboard');
    }
}
