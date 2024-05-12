<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Users;
use App\Models\Posts;

class DashboardAdmin extends Controller
{
    public function index(){

        $gejala = Gejala::count();
        $penyakit = Penyakit::count();
        $users = Users::count();
        $posts = Posts::count();

        return view('dashboard_admin.index', [
            'pageTitle' => 'Admin | Dashboard',
            'gejala' => $gejala,
            'penyakit' => $penyakit,
            'users' => $users,
            'posts' => $posts,
        ]);
    }
}
