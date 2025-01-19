@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Reading Area</h1>

    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p> <!-- Show preview of content -->
                    <p><strong>Category:</strong> {{ $post->category }}</p>

                    <!-- Read More Button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal" data-post-id="{{ $post->id }}">
                        Read More
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modal-post-content"></p> <!-- Content will be inserted dynamically -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Fetch and display full content in the modal when "Read More" button is clicked
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('postModal');
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget; // Button that triggered the modal
            const postId = button.getAttribute('data-post-id'); // Get post ID

            // Fetch post data
            fetch(`/posts/${postId}`)
                .then(response => response.json())
                .then(data => {
                    // Insert post title and full content into the modal
                    modal.querySelector('.modal-title').textContent = data.post.title;
                    modal.querySelector('#modal-post-content').textContent = data.post.content;
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
@endsection
