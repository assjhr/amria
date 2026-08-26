<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Show all published news articles.
     */
    public function index(): View
    {
        $newsItems = News::with(['user', 'tags'])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->get();

        return view('news.index', compact('newsItems'));
    }

    /**
     * Show a published news article.
     */
    public function show(News $news): View
    {
        abort_if(
            $news->published_at === null || $news->published_at->isFuture(),
            404
        );

        $news->load(['user', 'tags']);

        return view('news.show', compact('news'));
    }
}
