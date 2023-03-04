<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * ノートの一覧を表示する
     * @param Request $request
     * @param Int $game ゲームID
     */
    public function list(Request $request, $game)
    {
        $notes = $request->user()->note()->where('game_id', $game)->get();
        $o_game = Game::find($game);
        return view('note/list', [
            'user' => $request->user(),
            'notes' => $notes,
            'game' => $o_game
        ]);
    }

    /**
     * ノートを作成する
     * @param Request $request
     * @param Int $game ゲームID
     */
    public function create(Request $request, $game)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:256|',
        ]);
        $note = Note::create([
            'name' => $validated_data['name'],
            'user_id' => $request->user()->id,
            'game_id' => $game,
        ]);
        $note->save();

        return redirect()->route('note.list', ['game' => $game])
            ->with('msg', 'Created Note Successfuly.');
    }

    public function get_comment(Request $request, $note)
    {
        $o_note = Note::find($note);
        $comments = $o_note->note_time_label()->get();

        return response()->json($comments);
    }
}
