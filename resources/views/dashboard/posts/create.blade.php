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

        <!-- Category Selection (Hard-Coded) -->
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select 
                name="category" 
                id="category" 
                class="form-select @error('category') is-invalid @enderror" 
                required
            >
                <option value="" disabled selected>Select a category</option>
                <option value="technology" {{ old('category') == 'technology' ? 'selected' : '' }}>Technology</option>
                <option value="health" {{ old('category') == 'health' ? 'selected' : '' }}>Health</option>
                <option value="education" {{ old('category') == 'education' ? 'selected' : '' }}>Education</option>
                <option value="lifestyle" {{ old('category') == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
            </select>
            @error('category')
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
<div class="container mt-4">
    <h1 class="mb-4">Create Post</h1>

    <!-- Posts Table -->
    <div class="mb-4">
        <h3>Existing Posts</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td> <!-- Display part of content -->
                    <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <!-- Add edit and delete buttons -->
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Form to Create Post -->
   

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
