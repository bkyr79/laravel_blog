@extends('layouts.layout')

@section('title', 'ホーム')

@section('stylesheet')
<link href="{{ asset('/css/home.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('main')
<header>
  <div class="app-title"><h1>〇〇ブログ</h1></div>
  <div class="search-form">
    <form action="/search">
      @csrf
      <input id="sbox"  id="s" name="keyword" value="{{$keyword}}" type="text" placeholder="キーワードを入力" />
      <input id="sbtn" type="submit" value="検索" />
    </form>
  </div>
  <div class="links">
    <a href="/category_list">カテゴリ別</a>
    <a href="/create">記事作成</a>
    <a href="/edit">編集</a>

    @if(isset($selected_post))
      <a href="/delete?id={{ $selected_post->id }}" onclick="return confirm('この記事を削除してもよろしいですか？')">削除</a>
    @else
      <a href="/delete" onclick="return confirm('この記事を削除してもよろしいですか？')">削除</a>
    @endif

  </div>
  <hr>
</header>
<main>
  <div class="post-detail">
    <h2>
    @if(isset($selected_post))
      {{ $selected_post->title }}
    @else
      {{ $latest_post->title }}
    @endif
    </h2>
    <h4 class="category">
    @if(isset($selected_post))
      {{ $selected_post->category }}
    @else
      {{ $latest_post->category }}
    @endif
    </h4>
    <hr>
    @if(isset($selected_post))
      {!!  nl2br(e($selected_post->content)) !!}
    @else
      {!! nl2br(e($latest_post->content)) !!}
    @endif
  </div>
  <div class="post-list">
  <div class="post-list-title"><h3>投稿一覧</h3></div>
  @foreach($posts as $post)
  <h5 class="post-title"><a href="?id={{ $post->id }}">{{ $post->title }}</a></h5>
  <hr>
  @endforeach
  </div>
</main>
@endsection