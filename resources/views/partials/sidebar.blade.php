<ul class="list-unstyled">
@foreach ($topics as $topic)
    <li class="mb-1">

        <div class="d-flex justify-content-between align-items-center">
            <!-- LEFT: Topic title -->
            <a href="{{ route('topics.show', $topic->id) }}" class="topic-title text-decoration-none fw-bold">
                {{ $topic->title }}
            </a>

            <!-- RIGHT: Action buttons -->
            @auth
            @if($topic->user_id === auth()->id())
                <div class="topic-actions d-flex gap-2">
                    <a href="{{ route('topics.edit', $topic->id) }}" class="text-decoration-none" title="Edit">
                        ✏
                    </a>

                    <form method="POST" action="{{ route('topics.destroy', $topic->id) }}"class="m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link p-0 text-danger" title="Delete">
                            🗑
                        </button>
                    </form>

                </div>
            @endif
            @endauth
        </div>

        <!-- CHILD TOPICS -->
        @if ($topic->children->count())
            <div class="ms-3 mt-1">
                @include('partials.sidebar-children', [
                    'children' => $topic->children
                ])
            </div>
        @endif

    </li>
@endforeach
</ul>