<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ImportBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashIndex(Request $request)
    {
        $blogs = (Auth::user())->blogs;
        $blogs = $blogs->sortByDesc('publication_date');
        if($request->input('sort') === "desc"){
             $blogs = $blogs->sortBy('publication_date');
        }

        return view('dashboard',compact('blogs'));
    }

    public function index(Request $request)
    {
        $iblog = (new ImportBlog)->get();
        $blogs = (new Blog)->get();
        $collection = collect([$iblog,$blogs]);
        $collection =  $collection->flatten(1);
        $collection = $collection->sortByDesc('publication_date');

        if($request->input('sort') === "desc"){
            $collection = $collection->sortBy('publication_date');
        }
        return view('home',compact('collection'));
    }
}
