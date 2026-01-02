@extends('layouts.app')

@section('title', 'Edit Topic')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <div class="card shadow-sm mt-4">
            <div class="card-body">

                <h4 class="mb-4">Edit Topic</h4>

                <form method="POST" action="{{ route('topics.update', $topic->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Topic Title -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Topic Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $topic->title) }}" required>
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Parent Topic -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Parent Topic</label>
                        <select name="parent_id" class="form-select">
                            <option value="">— Main Topic —</option>
                            @foreach ($topics as $parent)
                                @if ($parent->id !== $topic->id)
                                    <option value="{{ $parent->id }}" {{ $topic->parent_id == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('parent_id')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">
                            ← Back
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Update Topic
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
