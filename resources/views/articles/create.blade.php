@extends('layouts.app')


@section('content')

<div class="row justify-content-center">
    <div class="col-lg-9 col-md-10">

        <h2 class="mb-4 mt-4">Create New Article</h2>

        <form method="POST" action="{{ route('articles.store') }}">
            @csrf

            <input name="title"
                   class="form-control mb-3"
                   placeholder="Article title"
                   required>

            <h6>Topic</h6>
            <select name="topic_id" class="form-select mb-3" required>
            <option value="">— Select Topic —</option>

            @foreach ($topics as $topic)
                <!-- Parent topic -->
                <option value="{{ $topic->id }}">
                    {{ $topic->title }}
                </option>

                <!-- Child topics -->
                @foreach ($topic->children as $child)
                    <option value="{{ $child->id }}">
                        &nbsp;&nbsp;↳ {{ $child->title }}
                    </option>
                @endforeach
            @endforeach
        </select>

            <textarea name="content"
                      id="editor"
                      class="form-control"
                      rows="10"
                      placeholder="Article content"></textarea>

            <button class="btn btn-success mt-3">
                Save Article
            </button>
        </form>

    </div>
</div>


@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace('editor', {
    height: 600,

    // Upload endpoint
    filebrowserUploadUrl:
        "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}",

    filebrowserUploadMethod: 'form',

    // Prevent GET-based image URL usage
    removeDialogTabs: 'image:Link;image:advanced'
});
</script>

@endpush