<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FrontController extends Controller
{

    public function index()
    {
        $data = [];
        $data['departments'] = Department::select('name', 'id')->get();
        $data['article'] = Article::where('status', 1)->first();
        $data['articles'] = Article::paginate(4);
        return view('front.index', $data);
    }



    public function getContent($article_id)
    {
        $data = [];
        $data['departments'] = Department::select('name', 'id')->get();
        $data['article'] = Article::find($article_id);
        $data['articles'] = Article::paginate(4);

        return view('front.content', $data);
    }



    public function getDepartment($depart_id) {
         $data = [];
         $data['departments'] = Department::select('name', 'id')->get();
         $data['department'] = Department::find($depart_id);
         $data['depart_articles'] = Article::where('department_id', $depart_id)->get();
         return view('front.department', $data);
    }
}
