<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUser extends Controller
{
    public function index(){
        return view('dashboard_user.index', [
            'pageTitle' => 'User | Dashboard'
        ]);
    }
}
