<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\User;
use App\Notifications\MailingOfNews;
use Illuminate\Console\Command;

class MailingOfNewArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mailing {period}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Рассылка пользователям сообщений о новых статьях за указанный период';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $startDate = time() - ($this->argument('period') * 24 * 60 * 60);
        $filtered = Article::all()->where('created_at', '>=', date("Y-m-d H:i:s", $startDate));
        $users = User::all();
        $users->map->notify(new MailingOfNews($filtered));
        return Command::SUCCESS;
    }
}
