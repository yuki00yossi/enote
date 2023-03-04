<link rel="stylesheet" href="/css/modal.css">
<link rel="stylesheet" href="/css/note/add_note_modal.css">
<script src="/js/modal.js"></script>
<div id="addNoteModal" class="modal hidden">
    <div class="modal-title"><h2>Add Note</h2></div>
    <div class="modal-body">
        <form class="addNoteForm" action="" method="POST">
            <div><label for="noteName">Note Name</label></div>
            <div><input id="noteName" name="noteName" type="text"></div>
            <div class="submit"><input type="submit" value="Add"></div>
            <input type="hidden" name="game_id" value="{{$game->id}}">
        </form>
    </div>
</div>
<div id="bgModal" class="hidden"></div>