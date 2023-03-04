<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * タイムラベルのモデル
 * 
 * @author Yuki Yoshioka
 */
class NoteTimeLabel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'note_id',
        'play_time',
        'comment',
    ];

    /** 
     * 所属しているノート
     */
    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
