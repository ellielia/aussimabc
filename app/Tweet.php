<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'handle', 'avatar', 'timestamp', 'content', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
