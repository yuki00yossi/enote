@extends('base')
@section('title', 'Notes')
@section('somehead')
<link rel="stylesheet" href="/css/note/list.css">
@endsection
@section('contents')
<div class="choose-game">
    <h2>Note List</h2>
    <div class="addNoteFormArea">
        <form id="addNoteForm" method="POST" action="{{ route('note.create', ['game' => $game->id,]) }}">
            <input type="hidden" name="gameCategory" value="{{ $game->id }}">
            @csrf
            <div>
                <label for="inputName">Name</label>
                <input id="inputName" class="text-input" type="text" name="name" placeholder="note name">
                <input class="btn-submit" type="submit" value="New Note">
            </div>
        </form>
    </div>
    <div class="note-area">
        @foreach($notes as $note)
        <div>{{ $note->name }}</div>
        @endforeach
    </div>
</div>
@endsection

@section('endbody')
@endsection