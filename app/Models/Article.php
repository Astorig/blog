<?php

namespace App\Models;

use App\Events\ArticleCreated;
use App\Events\ArticleDestroyed;
use App\Events\ArticleUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Model;

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
