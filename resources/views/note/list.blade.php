@extends('base')
@section('title', 'Notes')
@section('somehead')
<link rel="stylesheet" href="/css/note/list.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('contents')
{{-- メッセージアラート表示 --}}
@if(null !== session('msg'))
<script>
Swal.fire({
    icon: 'success',
    title: '{{ session('msg') }}',
    showConfirmButton: false,
    timer: 1500
});
</script>
@endif
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
            @if($errors->has('name'))
            <span class="error-msg">{{ $errors->first('name') }}</span>
            @endif 
        </form>
    </div>
    <div class="note-area">
        @foreach($notes as $note)
        <div class="note-item"><a href="">{{ $note->name }}</a></div>
        @endforeach
    </div>
</div>
@endsection

@section('endbody')
@endsection