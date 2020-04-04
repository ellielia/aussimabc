<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'category_id', 'title', 'caption', 'author', 'publication_tag', 'published_at', 'last_edited_at',
        'image_url', 'youtube_url', 'image_video_caption', 'content', 'key_points', 'topics', 'views', 'private', 'slug'
    ];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }

    public function related()
    {
        return $this->hasMany(RelatedArticle::class);
    }
}
