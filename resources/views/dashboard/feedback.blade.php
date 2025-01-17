@extends('layout.dashboard')

@section('title', 'Compliance')

@section('content')
    <h2 class="mb-4">Compliance</h2>
    <div class="row">
        @foreach($feedbacks as $feedback)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Feedback #{{ $feedback->id }}</h5>
                        <p class="card-text"><strong>Name:</strong> {{ $feedback->name }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $feedback->email }}</p>
                        <p class="card-text"><strong>Rating:</strong> {{ $feedback->rating }}/5</p>
                        <p class="card-text"><strong>Comments:</strong> {{ $feedback->comments }}</p>
                        <p class="text-muted small">
                            <strong>Submitted:</strong> {{ $feedback->created_at->format('d M Y, H:i') }}<br>
                            <strong>Updated:</strong> {{ $feedback->updated_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
