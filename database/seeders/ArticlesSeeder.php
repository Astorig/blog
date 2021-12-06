<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = User::factory()->count(2)
            ->has(Article::factory() ->count(5)
                ->has(Tag::factory()->count(2))
            )
            ->create();
    }
}
