@extends('layout.dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Create Post</h1>

    <form method="POST" action="{{ route('posts.store') }}" class="needs-validation" novalidate>
        @csrf

        <!-- Title Field -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title') }}" 
                required
            >
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Category Selection -->
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select 
                name="category_id" 
                id="category" 
                class="form-select @error('category_id') is-invalid @enderror" 
                required
            >
                <option value="" disabled selected>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Paragraph Content -->
        <div id="paragraph-section">
            <label class="form-label">Content Paragraphs</label>
            <div class="paragraph mb-3">
                <textarea 
                    name="content[]" 
                    class="form-control @error('content.*') is-invalid @enderror" 
                    rows="3" 
                    placeholder="Write a paragraph..." 
                    required
                >{{ old('content.0') }}</textarea>
                @error('content.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Add Paragraph Button -->
        <div class="mb-3">
            <button type="button" class="btn btn-secondary" id="add-paragraph">Add Paragraph</button>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
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
                <textarea 
                    name="content[]" 
                    class="form-control" 
                    rows="3" 
                    placeholder="Write a paragraph..." 
                    required
                ></textarea>
            `;
            paragraphSection.appendChild(newParagraph);
        });
    });
</script>
@endsection
