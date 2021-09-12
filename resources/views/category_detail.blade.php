@extends('layouts.layout')

@section('title', 'カテゴリ一別記事')

@section('stylesheet')
  <link href="{{ asset('/css/search_result.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('main')
  <h3 class="title">"{{ $selected_category }}"に関する記事</h3>
  @foreach($datas as $data)
  <div>
    <h5 class="title-result"><a href="./?id={{ $data->id }}">{{ $data->title }}</a></h5>
    <div>
      <div class="content-result">{{ $data->content }}</div>
    </div>
  </div>
  <hr>
  @endforeach
@endsection