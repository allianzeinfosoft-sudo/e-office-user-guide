@extends('layouts.app')

@section('content')

<div class="container">
    @auth
        <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">
            + New Article
        </a>
    @endauth

    @foreach ($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">{{ $article->title }}</h5>

                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('articles.pdf.view', $article) }}"
                        target="_blank"
                        class="btn btn-outline-secondary">
                            View PDF
                        </a>

                        <a href="{{ route('articles.pdf.download', $article) }}"
                        class="btn btn-outline-primary">
                            Download PDF
                        </a>
                    </div>
                </div>
                
                <div class="article-content">
                    {!! $article->content !!}
                </div>

                <small class="text-muted">By {{ $article->user->name }}</small>

                @can('update', $article)
                    <div class="mt-2">
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('articles.destroy', $article) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this article?')">
                                Delete
                            </button>
                        </form>
                    </div>
                @endcan
            </div>
        </div>
    @endforeach
</div>
@endsection
