<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * タイムラベルのモデル
 * 
 * @author Yuki Yoshioka
 */
class TimeLabel extends Model
{
    use HasFactory;

    protected $table = 'time_labels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'page_id',
        'play_time',
        'title',
        'comment',
        'user_id',
    ];


    /** 
     * 所属しているノート
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
