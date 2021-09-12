@extends('layouts.layout')

@section('title', '検索結果')

@section('stylesheet')
  <link href="{{ asset('/css/search_result.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('main')
  <h3 class="title">検索結果</h3>
  @if(count($datas) == 0)
    <h5 class="title">"該当の検索結果はありません"</h5>
  @endif
  @foreach($datas as $data)
    <div>
      <h5 class="title-result"><a href="./?id={{ $data->id }}">{{ $data->title }}</a></h5>
      <div>
        <div class="content-result">{{ $data->content }}</div>
      </div>
    </div>
    <hr>
  @endforeach
  {{ $datas->links() }}
@endsection