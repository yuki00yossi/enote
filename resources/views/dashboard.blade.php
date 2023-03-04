@extends('base')
@section('title', 'dashboard')
@section('somehead')
<link rel="stylesheet" href="/css/dashboard.css">
@endsection
@section('contents')
<div class="choose-game">
    <h2>Choose Game</h2>
    <div class="game-icon-area">
    @foreach ($games as $game)
        <div class="game-icon">
            <a href="{{ route('note.list', $game->id) }}">
            <img src="{{ $game->img_path }}">
            </a>
        </div>
    @endforeach
    </div>
</div>
{{-- <div id="player"></div>
    <div id="sidebar">
        <section class="comment">
            <div class="comment-title" data-comment-no="1">ノック原因タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル</div>
            <div><small>再生時間：<a href="#" class="seekTimeLink" data-time="10">00:10</a></small></div>
            <div id="comment1" class="comment-body"><small>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</small></div>
        </section>
        <section class="comment">
            <div class="comment-title" data-comment-no="2">ノック原因2</div>
            <div><small>再生時間：<a href="#" class="seekTimeLink" data-time="610">10:10</a></small></div>
            <div id="comment2" class="comment-body"><small>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</small></div>
        </section>
    </div>
    <div>
        <button onclick="slide(-10)">１０秒戻る</button>
        <button onclick="slide(10);">１０秒進む</button>
    </div> --}}
    
@endsection

@section('endbody')
@endsection