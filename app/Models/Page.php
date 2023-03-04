<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * ページのモデル
 * 
 * @author Yuki Yoshioka
 */
class Page extends Model
{
    use HasFactory;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'note_id',
        'video_id',
        'service_type',
        'title',
        'user_id',
    ];


    /** 
     * 所属しているノート
     */
    public function note()
    {
        return $this->belongsTo(Note::class);
    }

    /**
     * 紐づいているタイムラベル一覧
     */
    public function timelabels()
    {
        return $this->hasMany(TimeLabel::class);
    }
}
