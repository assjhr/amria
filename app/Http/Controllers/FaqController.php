<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Show the public FAQ page.
     */
    public function index(): View
    {
        $categories = FaqCategory::with('faqs')
            ->orderBy('name')
            ->get();

        return view('faq.index', compact('categories'));
    }
}
