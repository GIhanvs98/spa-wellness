<!-- resources/views/feedback.blade.php -->
@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Your Complaint Here</h3>
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select name="rating" id="rating" class="form-select" required>
                <option value="5">issue 1</option>
                <option value="4">issue 2</option>
                <option value="3">issue 3</option>
                <option value="2">issue 4</option>
                <option value="1">issue 5</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Comments</label>
            <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Share your thoughts..." required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </div>
    </form>
</div>
@endsection
