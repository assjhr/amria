<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $newsItems = News::with('user')
            ->orderByDesc('published_at')
            ->get();

        return view('admin.news.index', compact('newsItems'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('news', 'public');
        }

        $validated['user_id'] = Auth::id();

        News::create($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem succesvol toegevoegd.');
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(
        UpdateNewsRequest $request,
        News $news
    ): RedirectResponse {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $validated['image'] = $request->file('image')
                ->store('news', 'public');
        }

        $news->update($validated);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem succesvol aangepast.');
    }

    public function destroy(News $news): RedirectResponse
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Nieuwsitem succesvol verwijderd.');
    }
}
