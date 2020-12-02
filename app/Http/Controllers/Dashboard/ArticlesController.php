<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Image;
use App\Models\Article;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:articles_create'])->only('create');
        $this->middleware(['permission:articles_read'])->only('index');
        $this->middleware(['permission:articles_update'])->only('edit');
        $this->middleware(['permission:articles_delete'])->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('dashboard.articles.index', compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['writers'] = User::whereRoleIs('writer')->get();
        $data['editors'] = User::whereRoleIs('editor')->get();
        $data['parent_departs'] = Department::where('parent_id', null)->get();
        $data['child_departs'] = Department::where('parent_id', '!=', null)->get();

        return view('dashboard.articles.create', $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return redirect()->route('get-images', $article->id);
    }


    public function getImages($article_id)
    {
        return view('dashboard.articles.image', compact('article_id'));
    }


    public function saveImages(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        Image::create([
            'article_id' => $request->article_id,
            'image' => $imageName
        ]);

        return response()->json(['success' => $imageName]);
    }


    public function getGallery()
    {
        $images = Image::all();
        return view('dashboard.articles.images.gallery', compact('images'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $data = [];
        $data['article'] = $article;
        $data['writers'] = User::whereRoleIs('writer')->get();
        $data['editors'] = User::whereRoleIs('editor')->get();
        $data['parent_departs'] = Department::where('parent_id', null)->get();
        $data['child_departs'] = Department::where('parent_id', '!=', null)->get();

        return view('dashboard.articles.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('edit-article-image', $article->id);
    }


    public function editImage($article_id)
    {
         $images = Image::where('article_id', $article_id)->get();
        return view('dashboard.articles.images.editImages', compact(['images', 'article_id']));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $images = Image::where('article_id', $article->id)->get();
        Storage::disk('images')->delete($images);

        $article->delete();

        return redirect()->route('articles.index')->with(['success' => 'تم الحذف بنجاح']);
    }

}
