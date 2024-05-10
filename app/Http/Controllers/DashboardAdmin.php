<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdmin extends Controller
{
    public function index(){
        return view('dashboard_admin.index', [
            'pageTitle' => 'Admin | Dashboard'
        ]);
    }
}
