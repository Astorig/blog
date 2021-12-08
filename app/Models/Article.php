<?php

namespace App\Models;

use App\Events\ArticleCreated;
use App\Events\ArticleDestroyed;
use App\Events\ArticleUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Model;
use Illuminate\Support\Arr;

class Article extends Model
{
    use HasFactory;

    protected $casts = [
        'published' => 'boolean'
    ];

    protected $dispatchesEvents = [
      'created' => ArticleCreated::class,
      'updated' => ArticleUpdated::class,
      'deleted' => ArticleDestroyed::class
    ];

    protected static function boot()
    {
        parent::boot();
        static::updating(function (Article $article) {
            $after = $article->getDirty();
            $article->history()->attach(auth()->id(), [
                'before' => json_encode(Arr::only($article->fresh()->toArray(), array_keys($after))),
                'after' => json_encode($after)
            ]);
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'article_histories')
            ->withPivot(['before', 'after'])->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isPublished()
    {
        return (bool) $this->published;
    }

    public function isNotPublished()
    {
        return ! $this->isPublished();
    }
}
