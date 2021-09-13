<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CategoryController extends Controller
{
    // カテゴリ一覧を表示させる
    public function categoryList()
    {
        $posts = Post::latest('updated_at')->distinct()->get('category');

        return view('category_list', [
            "posts" => $posts,
        ]);
    }
    // カテゴリ一ごとの記事を表示させる
    public function categoryDetail()
    {
        if($_GET){
            $selected_category = Post::where('category', '=', $_GET['id'])->first('category');
        }
        else{
            $selected_category = NULL;
        }

        $datas = Post::orderBy('updated_at','desc')
            ->where('category', '=', $selected_category['category'])->get();

        return view('category_detail', [
            "datas"             => $datas,
            "selected_category" => $selected_category['category'],
        ]);
    }
}
