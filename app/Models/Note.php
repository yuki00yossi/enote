<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * ノートのモデル
 * 
 * @author Yuki Yoshioka
 */
class Note extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'game_id',
    ];

    /** 
     * 関連するタイムラベル
     */
    public function note_time_label()
    {
        return $this->hasMany(NoteTimeLabel::class);
    }

    /** 
     * 所属しているゲーム
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /** 
     * 所属しているカテゴリ
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    /** 
     * 所属しているユーザー
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
