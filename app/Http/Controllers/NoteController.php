<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Note;
use App\Models\Page;

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

    /**
     * ノートの詳細ページを表示する
     * 
     * @param Request $request
     * @param Int $note ノートID
     */
    public function show(Request $request, $note)
    {
        $note = Note::find($note);
        if (null === $note) {
            abort(404);
        }
        // dd($m_note->pages->isEmpty() ? 'aaa' : 'bbgbb');


        return view('note/show', [
            'user' => $request->user(),
            'note' => $note,
            'service_types' => Page::SERVICE_TYPE,
        ]);
    }

    /**
     * ページを作成する
     */
    public function createPage(Request $request, $note)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'serviceType' => 'required',
            'videoId' => 'required',
            'content' => 'required'
        ]);
        
        Page::create([
            'note_id' => $note,
            'service_type' => $validated_data['serviceType'],
            'video_id' => $validated_data['videoId'],
            'title' => $validated_data['title'],
            'user_id' => $request->user()->id
        ]);

        return redirect()->route('note.show', ['note' => $note])->with('addPage', true);
    }

    /**
     * ページを削除する
     */
    public function deletePage(Request $request, $note ,$page)
    {
        $note = Note::find($note);
        $page = Page::find($page);

        if ($note->user_id === $request->user()->id &&
            $page->user_id === $request->user()->id 
        ) {
            $page->delete();
        }
        return false;
    }
}

