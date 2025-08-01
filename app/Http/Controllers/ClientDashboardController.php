<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function dashboard(){
        return view('admin.client_dashboard.dashboard');
    }
}
