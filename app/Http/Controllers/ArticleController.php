<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles.
     */
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(15);
        return view('master.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        $admins = User::where('role', 'admin')->get();
        return view('master.articles.create', compact('admins'));
    }

    /**
     * Store a newly created article.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'status' => 'required|in:draft,published',
        ]);

        Article::create($request->only([
            'user_id', 'title', 'content', 'category', 'status'
        ]));

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Display the specified article.
     */
    public function show(Article $article)
    {
        $article->load('user');
        return view('master.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article)
    {
        $admins = User::where('role', 'admin')->get();
        return view('master.articles.edit', compact('article', 'admins'));
    }

    /**
     * Update the specified article.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'status' => 'required|in:draft,published',
        ]);

        $article->update($request->only([
            'title', 'content', 'category', 'status'
        ]));

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified article.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete-permission', Auth::user());

        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
