<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Article;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

    public function index()
    {

        $data = [];

        $data['writers'] = User::whereRoleIs('writer')->get();
        $data['editors'] = User::whereRoleIs('editor')->get();
        $data['supervisors'] = User::whereRoleIs('supervisor')->get();

        $data['articles'] = Article::get()->count();

        return view('dashboard.dashboard', $data);
    }


}
