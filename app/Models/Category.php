<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * カテゴリのモデル
 * 
 * @author Yuki Yoshioka
 */
class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bg_color',
        'color',
    ];

    /** 
     * 関連するノート
     */
    public function note()
    {
        return $this->hasMany(Note::class);
    }
}
