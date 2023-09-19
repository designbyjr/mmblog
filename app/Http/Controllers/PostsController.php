<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ImportBlog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('create');
    }


    public function create(Request $request)
    {
        $request->validate([
           "title"=> 'required',
           "description"=> 'required'
        ]);
        $array = array_merge($request->input(),
            [
                "publication_date"=> Carbon::now()->toDateTimeString(),
                "user_id"=> Auth::user()->id
            ]
        );

        Blog::create($array);

        return redirect(route('dashboard'));
    }

    public function read(Request $request, string $model, int $id)
    {
        $model = 'App\\Models\\'.$model;
        $blogPost = (new $model())::find($id);
        return view('post',compact('blogPost'));
    }
}
