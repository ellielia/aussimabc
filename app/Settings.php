<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
    	'breaking_news_enabled', 'breaking_news_href', 'breaking_news_text'
    ];
}
