<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, Model $model)
    {
        $modelTags = $model->tags->keyBy('name');
        $tagsRequest = $tags->keyBy(function ($item) { return $item; });
        $syncIds = $modelTags->intersectByKeys($tagsRequest)->pluck('id')->toArray();
        $tagsToAttach = $tagsRequest->diffKeys($modelTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }
        $model->tags()->sync($syncIds);
    }
}
