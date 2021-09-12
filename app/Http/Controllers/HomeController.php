<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        $request->session()->forget('selected_post');
        $posts         = Post::latest('updated_at')->get();
        $latest_post   = Post::latest('updated_at')->first();
        $keyword       = '';
        
        if($_GET){
            $selected_post = Post::find($_GET['id']);
            $request->session()->put('selected_post', $selected_post);
        }
        else{
            $selected_post = NULL;
            $request->session()->put('selected_post', $latest_post);
        }

        return view('home', [
            "posts"         => $posts,
            "latest_post"   => $latest_post,
            "selected_post" => $selected_post,
            "keyword"       => $keyword,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');        
        $query   = Post::query();
        
        if(!empty($keyword))
        {
            $query->where('title','like','%'.$keyword.'%')
                ->orWhere('category','like','%'.$keyword.'%')
                ->orWhere('content','like','%'.$keyword.'%');
        }
        
        $datas = $query->orderBy('updated_at','desc')->paginate(10);

        return view('search_result')->with('datas',$datas)
            ->with('keyword',$keyword);
    }
}