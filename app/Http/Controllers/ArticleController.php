<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('articles.index', [
            'articles' => Article::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $topics = Topic::with('children')->whereNull('parent_id')->get();
        return view('articles.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'topic_id' => 'required|exists:topics,id',
        ]);

        Article::create([
            'title'    => $request->title,
            'content'  => $request->content,
            'user_id'  => auth()->id(),
            'topic_id' => $request->topic_id,
        ]);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
         $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
         $this->authorize('update', $article);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article->update($request->only('title', 'content'));

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();

        return back()->with('success', 'Article deleted successfully');
    }

    public function view(Article $article)
    {
        Pdf::setOption([
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true,
        ]);
        $filename = Str::slug($article->title) . '.pdf';
        return Pdf::loadView('articles.pdf', compact('article'))
            ->stream($filename);
    }


    public function download(Article $article)
    {
        Pdf::setOption([
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true,
        ]);
        $filename = Str::slug($article->title) . '.pdf';
        
        $pdf = Pdf::loadView('articles.pdf', compact('article'));
        return $pdf->download($filename);
    }
}
