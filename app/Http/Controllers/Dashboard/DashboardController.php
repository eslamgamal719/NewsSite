<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;


class DashboardController extends Controller
{

    public function index()
    {

        $data = [];

        $data['writers'] = User::whereRoleIs('writer')->get();
        $data['editors'] = User::whereRoleIs('editor')->get();
        $data['supervisors'] = User::whereRoleIs('supervisor')->get();

        $data['articles'] = Article::get()->count();

     //   $data['audits'] = Department::find(6)->audits;

        return view('dashboard.dashboard', $data);
    }



    /*
    public function data()
    {

        $data = [];

        $data['departments'] = Department::all();

        return view('/home', $data);
    }*/

}
