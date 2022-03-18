<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'user_id', 'nickname', 'message',
    ];

    public function user()
    {
        return $this->belongsTo('App\User'); // usersテーブルと紐づけ
    }
}
