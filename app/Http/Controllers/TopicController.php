<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        Topic::create([
            'title'     => $request->title,
            'parent_id'=> $request->parent_id,
            'user_id'  => auth()->id()
        ]);

        return back();
    }

    public function edit(Topic $topic){
        $this->authorize('update', $topic);
        $topics = Topic::whereNull('parent_id')->where('id', '!=', $topic->id)->get();
        return view('topics.edit', compact('topic', 'topics'));
    }


    public function update(Request $request, Topic $topic)
    {
        abort_if($topic->user_id !== auth()->id(), 403);
        $topic->update([
            'title'     => $request->title,
            'parent_id'=> $request->parent_id
        ]);
        return redirect()->back();
    }

    public function destroy(Topic $topic)
    {
        abort_if($topic->user_id !== auth()->id(), 403);
        $topic->delete();
        return back()->with('success', 'Topic deleted successfully');
    }

    public function show(Topic $topic)
    {
        return view('articles.index', [
            'articles' => $topic->articles()->latest()->get(),
            'currentTopic' => $topic
        ]);
    }
}
