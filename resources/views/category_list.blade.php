@extends('layouts.layout')

@section('title', 'カテゴリ一覧')

@section('stylesheet')
  <link href="{{ asset('/css/search_result.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('main')
  <h3 class="title">カテゴリ一覧</h3>
  @foreach($posts as $post)
  <div>
    <h5 class="title-result"><a href="./category_detail?id={{ $post->category }}">{{ $post->category }}</a></h5>
  </div>
  <hr>
  @endforeach
@endsection