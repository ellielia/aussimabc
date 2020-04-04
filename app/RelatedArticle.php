<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedArticle extends Model
{
    protected $fillable = [
        'article_id', 'related_to'
    ];

    public function relation()
    {
        $article = Article::whereId($this->related_to)->firstOrFail();
        return $article;
    }
}
