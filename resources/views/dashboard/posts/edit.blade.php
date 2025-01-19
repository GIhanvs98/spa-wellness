@extends('layout.dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')

        <!-- Title Field -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $post->title) }}" 
                required
            >
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
        </div>

        <!-- Category Selection -->
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select 
                name="category" 
                id="category" 
                class="form-select @error('category') is-invalid @enderror"
                required
            >
                <option value="" disabled>Select a category</option>
                <option value="technology" {{ old('category', $post->category) == 'technology' ? 'selected' : '' }}>Technology</option>
                <option value="health" {{ old('category', $post->category) == 'health' ? 'selected' : '' }}>Health</option>
                <option value="education" {{ old('category', $post->category) == 'education' ? 'selected' : '' }}>Education</option>
                <option value="lifestyle" {{ old('category', $post->category) == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
            </select>
            <div class="invalid-feedback">{{ $errors->first('category') }}</div>
        </div>

        <!-- Content Section -->
        <div id="paragraph-section">
            <label class="form-label">Content Paragraphs</label>
            @foreach($content as $index => $paragraph)
                <div class="paragraph mb-3">
                    <textarea 
                        name="content[]" 
                        class="form-control" 
                        rows="3" 
                        placeholder="Write a paragraph..."
                        required
                    >{{ old('content.' . $index, $paragraph) }}</textarea>
                    <div class="invalid-feedback">{{ $errors->first('content.' . $index) }}</div>
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const paragraphSection = document.getElementById('paragraph-section');
        const addParagraphBtn = document.getElementById('add-paragraph');

        // Add new paragraph textarea
        addParagraphBtn.addEventListener('click', () => {
            const newIndex = paragraphSection.querySelectorAll('textarea').length;
            const newParagraph = document.createElement('div');
            newParagraph.classList.add('paragraph', 'mb-3');
            newParagraph.innerHTML = `
                <textarea 
                    name="content[]" 
                    class="form-control" 
                    rows="3" 
                    placeholder="Write a paragraph..." 
                    required
                ></textarea>
                <div class="invalid-feedback"></div>
            `;
            paragraphSection.appendChild(newParagraph);
        });
    });
</script>
@endsection
