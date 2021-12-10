<?php

namespace App\Jobs;

use App\Notifications\MailingOfTotalReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class CountTotalReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $requestKeys;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($requestKeys)
    {
        $this->requestKeys = $requestKeys;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $resultRequest = [];
        foreach ($this->requestKeys as $item) {
            switch ($item) {
                case 'news':
                    $resultRequest['news'] = DB::table('news')->count();
                    break;
                case 'articles':
                    $resultRequest['articles'] = DB::table('articles')->count();
                    break;
                case 'comments':
                    $resultRequest['comments'] = DB::table('comments')->count();
                    break;
                case 'tags':
                    $resultRequest['tags'] = DB::table('tags')->count();
                    break;
                case 'users':
                    $resultRequest['users'] = DB::table('users')->count();
                    break;
            }
        }
        Notification::route('mail', config('mail.for.address'))->notify(new MailingOfTotalReport($resultRequest));
    }
}
