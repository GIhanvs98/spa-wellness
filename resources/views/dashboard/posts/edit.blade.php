@extends('layout.dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Post</h1>

    <!-- Check if $post is available -->
    @if ($post)
        <!-- Form to edit post -->
        <form method="POST" action="{{ route('posts.update', $post->id) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Category Field -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
                    <option value="" disabled>Select a category</option>
                    <option value="technology" {{ old('category', $post->category) == 'technology' ? 'selected' : '' }}>Technology</option>
                    <option value="health" {{ old('category', $post->category) == 'health' ? 'selected' : '' }}>Health</option>
                    <option value="education" {{ old('category', $post->category) == 'education' ? 'selected' : '' }}>Education</option>
                    <option value="lifestyle" {{ old('category', $post->category) == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                </select>
                @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Content Paragraphs -->
            <div id="paragraph-section">
                <label class="form-label">Content Paragraphs</label>
                @foreach (explode("\n", $post->content) as $index => $content)
                    <div class="paragraph mb-3">
                        <textarea name="content[]" class="form-control @error('content.*') is-invalid @enderror" rows="3" required>{{ old('content.' . $index, $content) }}</textarea>
                        @error('content.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                @endforeach
            </div>

            <!-- Add Paragraph Button -->
            <div class="mb-3">
                <button type="button" class="btn btn-secondary" id="add-paragraph">Add Paragraph</button>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    @else
        <div class="alert alert-danger">
            <strong>Error!</strong> The post you are trying to edit was not found.
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const paragraphSection = document.getElementById('paragraph-section');
        const addParagraphBtn = document.getElementById('add-paragraph');

        // Add new paragraph textarea
        addParagraphBtn.addEventListener('click', () => {
            const newParagraph = document.createElement('div');
            newParagraph.classList.add('paragraph', 'mb-3');
            newParagraph.innerHTML = `
                <textarea name="content[]" class="form-control" rows="3" placeholder="Write a paragraph..." required></textarea>
            `;
            paragraphSection.appendChild(newParagraph);
        });
    });
</script>
@endsection
