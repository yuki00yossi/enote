@extends('base')
@section('title', 'note')
@section('somehead')
<link rel="stylesheet" href="/css/player/player.css">
<link rel="stylesheet" href="/css/modal.css">
<script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
@endsection
@section('contents')
<div class="title-area">
    <h2 id="pageTitle" class=""></h2>
</div>
<!-- ページ一覧 -->
<div id="sidebar">
    <div>
        <button data-micromodal-trigger="addPageModal" role="button">モーダルを開く</button>
    </div>
    @foreach ($note->pages as $page)
    <div class="page-area" data-page-id="{{ $page->id }}" data-page-title="{{ $page->title }}" data-video-id="{{ $page->video_id }}">
        <div class="page-title text-overflow">{{ $page->title }}</div>
        <div class="page-updated"><small>{{ $page->updated_at }}</small></div>
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
@include('note.modal.add_page_modal')

@endsection

@section('endbody')
<script src="/js/api/Api.js"></script>
<script src="/js/player/youtube_api.js"></script>
<script src="/js/player/sidebar.js"></script>
<script src="/js/player/comment.js"></script>
<script src="/js/player/comment_area.js"></script>

<script>
MicroModal.init({
  awaitCloseAnimation: true,
  awaitOpenAnimation: true,
  disableScroll: true
});
</script>

@endsection

