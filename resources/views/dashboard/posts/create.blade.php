@extends('layout.dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Create Post</h1>

    <form id="create-post-form" method="POST" action="{{ route('posts.store') }}" class="needs-validation" novalidate>
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
            <div class="invalid-feedback" id="error-title"></div>
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
                <option value="" disabled selected>Select a category</option>
                <option value="technology" {{ old('category') == 'technology' ? 'selected' : '' }}>Technology</option>
                <option value="health" {{ old('category') == 'health' ? 'selected' : '' }}>Health</option>
                <option value="education" {{ old('category') == 'education' ? 'selected' : '' }}>Education</option>
                <option value="lifestyle" {{ old('category') == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
            </select>
            <div class="invalid-feedback" id="error-category"></div>
        </div>

        <!-- Content Section -->
        <div id="paragraph-section">
            <label class="form-label">Content Paragraphs</label>
            <div class="paragraph mb-3">
                <textarea 
                    name="content[]" 
                    class="form-control" 
                    rows="3" 
                    placeholder="Write a paragraph..." 
                    required
                >{{ old('content.0') }}</textarea>
                <div class="invalid-feedback" id="error-content-0"></div>
            </div>
        </div>

        <!-- Add Paragraph Button -->
        <div class="mb-3">
            <button type="button" class="btn btn-secondary" id="add-paragraph">Add Paragraph</button>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>

    <!-- Posts Table -->
    <h2 class="mt-5">All Posts</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form 
                            action="{{ route('posts.destroy', $post->id) }}" 
                            method="POST" 
                            class="d-inline-block"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="4">No posts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
     document.addEventListener('DOMContentLoaded', () => {
        const paragraphSection = document.getElementById('paragraph-section');
        const addParagraphBtn = document.getElementById('add-paragraph');
        const form = document.getElementById('create-post-form');

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
                <div class="invalid-feedback" id="error-content-${newIndex}"></div>
            `;
            paragraphSection.appendChild(newParagraph);
        });

        // Form validation (optional client-side)
        form.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(form);
            fetch('{{ route('posts.store') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    // Display validation errors
                    for (const [field, messages] of Object.entries(data.errors)) {
                        if (field.startsWith('content')) {
                            const index = field.match(/\d+/)[0];
                            document.getElementById(`error-content-${index}`).textContent = messages[0];
                            paragraphSection.querySelectorAll('textarea')[index].classList.add('is-invalid');
                        } else {
                            document.getElementById(`error-${field}`).textContent = messages[0];
                            document.querySelector(`[name="${field}"]`).classList.add('is-invalid');
                        }
                    }
                } else {
                    // Success: Clear the form or show success message
                    form.reset();
                    alert('Post created successfully!');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
@endsection
