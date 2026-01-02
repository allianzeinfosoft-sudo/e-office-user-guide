<ul class="ms-3 list-unstyled">
@foreach ($children as $child)
    <li class="mb-1">

        <div class="d-flex justify-content-between align-items-center">
            <!-- LEFT: Child topic title -->
            <a href="{{ route('topics.show', $child->id) }}" class="child-topic-title text-decoration-none">
                {{ $child->title }}
            </a>

            <!-- RIGHT: Edit / Delete -->
            @auth
            @if($child->user_id === auth()->id())
                <div class="topic-actions d-flex gap-2">

                    <a href="{{ route('topics.edit', $child->id) }}"
                       class="text-decoration-none"
                       title="Edit"> ✏ </a>

                    <form method="POST"
                          action="{{ route('topics.destroy', $child->id) }}"
                          class="m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-link p-0 text-danger"
                                title="Delete"> 🗑
                        </button>
                    </form>

                </div>
            @endif
            @endauth
        </div>

        <!-- NESTED CHILDREN -->
        @if ($child->children->count())
            <div class="ms-3 mt-1">
                @include('partials.sidebar-children', [
                    'children' => $child->children
                ])
            </div>
        @endif

    </li>
@endforeach
</ul>
