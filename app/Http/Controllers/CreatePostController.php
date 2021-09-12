<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class CreatePostController extends Controller
{
    public function index() 
    {
        return view('create_post');
    }

    public function postSubmit(Request $request)
    { 
		$request->validate([
            'title'    => 'required | max:20',
            'category' => 'required | max:10',
        ],
        [
            'title.required'    => 'タイトルを入力してください',
            'category.required' => 'カテゴリーを入力してください',
            'title.max:20'      => 'タイトルは20文字以内で入力してください',
            'category.max:10'   => 'カテゴリーは10文字以内で入力してください',
        ]);

        $title    = $request->input('title');
        $category = $request->input('category');
        $content  = $request->input('content');

        Post::create(compact('title', 'content', 'category'));
        return redirect('/');
    }
}