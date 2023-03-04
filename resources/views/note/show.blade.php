@extends('base')
@section('title', 'note')
@section('somehead')
<link rel="stylesheet" href="/css/player/player.css">
<link rel="stylesheet" href="/css/modal.css">
@endsection
@section('contents')
<div class="title-area">
    <h2 id="noteTitle" class=""></h2>
</div>
<!-- ノート一覧 -->
<div id="sidebar">
    @foreach ($notes as $note)
    <div class="note-area" data-note-id="{{ $note->id }}" data-note-title="{{ $note->title }}" data-video-id="{{ $note->video_id }}">
        <div class="note-title text-overflow">{{ $note->title }}</div>
        <div class="note-updated"><small>{{ $note->created_at }}2020/11/03 10:30:23</small></div>
    </div>
    @endforeach
    
</div>
<div id="player"></div>
<div id="comment_area">
    <section class="comment">
        <div class="comment-header">
            <div class="comment-title" data-comment-no="1">aaa</div>    
            <div><small>再生時間：<a href="#" class="seekTimeLink" data-time="10">00:10</a></small></div>
            <div id="comment1" class="comment-body"><small>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</small></div>
        </div>
    </section>
</div>
<div class="control_area">
    <button onclick="slide(-10);">１０秒戻る</button>
    <button onclick="openAddCommentModal();">Add Time Label</button>
    <button onclick="slide(10);">１０秒進む</button>
</div>
@include('note.modal.add_note_modal')
<div class="modal-add-comment text-center">
    <h2>Add Time Label</h2>
    <div>
        <label for="input_commentTitle">Time Label</label>
    </div>
    <div>
        <input id="input_commentTitle" type="text">
    </div>
    <div>
        <label for="input_commentBody">Comment</label>
    </div>
    <div>
        <textarea id="input_commentBody" rows="20" cols="60"></textarea>
    </div>
</div>
    
@endsection

@section('endbody')
<script src="/js/api/Api.js"></script>

<script src="/js/player/comment.js"></script>
<script src="/js/player/youtube_api.js"></script>
<script src="/js/player/sidebar.js"></script>
<script src="/js/player/comment_area.js"></script>
@endsection

