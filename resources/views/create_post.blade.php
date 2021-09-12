@extends('layouts.layout')

@section('title', '記事作成')

@section('stylesheet')
  <link href="{{ asset('/css/create.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('main')
  <div class="title-h2"><h2>記事作成</h2></div>
  
  <!-- バリデーションエラーメッセージ -->
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
  @endif

  <form action="/post_submit" method="POST" class="forms">
    @csrf
    <span class="list">タイトル</span>
    <div class="title-div"><input type="text" name="title" class="title"></div>
    <span class="list">カテゴリー</span>
    <div class="category-div"><input type="text" name="category" class="category"></div>
    <span class="list">投稿内容</span>
    <div class="content-div">
      <textarea name="content" id="" cols="30" rows="10" class="content"></textarea>
    </div>
    <input type="submit" class="submit-btn">
  </form>
@endsection