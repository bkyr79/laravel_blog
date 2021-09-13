<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class EditAndDeleteController extends Controller
{
    public function delete() 
    {
        $latest_post = Post::latest('updated_at')->first();
        
        if($_GET){
            $selected_post_id = $_GET['id'];
        }
        else{
            $selected_post_id = $latest_post->id;
        }

        Post::where('id', $selected_post_id)->delete();
        return redirect('/');
    }

    public function edit(Request $request) 
    {
        $latest_post   = Post::latest('updated_at')->first();
        $selected_post = $request->session()->get('selected_post');

        $old_post     = $selected_post;
        $old_title    = $old_post->title;
        $old_category = $old_post->category;
        $old_content  = $old_post->content;

        $request->session()->put('old_title', $old_title);
        $request->session()->put('old_category', $old_category);
        $request->session()->put('old_content', $old_content);

        return view('edit', [
            "old_title"    => $old_title,
            "old_category" => $old_category,
            "old_content"  => $old_content,
        ]);
    }

    // 編集内容をDBに反映(=更新)させる
    public function editDone(Request $request) 
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
        
        $selected_post = $request->session()->get('selected_post');
        
        $selected_post->title    = $request->input('title');
        $selected_post->category = $request->input('category');
        $selected_post->content  = $request->input('content');
        $selected_post->save();
        return redirect('/');
    }
}
