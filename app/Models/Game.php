<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * ゲームのモデル
 * 
 * @author Yuki Yoshioka
 */
class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'img_path',
    ];

    /** 
     * 関連するノート
     */
    public function note()
    {
        return $this->hasMany(Note::class);
    }
}
