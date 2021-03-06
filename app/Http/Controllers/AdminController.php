<?php

namespace App\Http\Controllers;

use App\Jobs\CountTotalReport;
use App\Models\Article;
use App\Models\Contact;
use App\Models\News;
use App\Services\PortalStatistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function show(Article $article)
    {
        return view('admin.articles_show', compact('article'));
    }

    public function feedback()
    {
        $contacts = Contact::latest()->get();

        return view('admin.feedback', compact('contacts'));
    }

    public function articles()
    {
        $articles = Article::with('tags')->latest()->simplePaginate(20);

        return view('admin.articles', compact('articles'));
    }

    public function news(News $news)
    {
        $news = Cache::tags(['news'])->remember('users_news|' . auth()->id(), 3600, function () {
            return News::latest()->simplePaginate(20);
        });

        return view('admin.news', compact('news'));
    }

    public function statistics(PortalStatistics $statistics)
    {
        Cache::tags('statistics')->flush();

        $resultStatistics = Cache::tags(['reports', 'statistics'])->remember('statistics_portal', 3600, function () use ($statistics) {
            return $statistics->resultPortalStatistics()->toArray();
        });

        return view('admin.reports.statistics', compact('resultStatistics'));
    }

    public function totalReport()
    {
        return view('admin.reports.total');
    }

    public function storeTotalReport(Request $request)
    {
        CountTotalReport::dispatch($request->keys());

        return redirect()->route('admin');
    }
}
