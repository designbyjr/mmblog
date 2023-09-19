<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
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

        return redirect(route('home'));
    }
}
