@extends('layout.dashboard')

@section('title', 'User Management')

@section('content')

<div class="row">
    @foreach($users as $user)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ $user->avatar_url ?? asset('images/avatar-user.jpg') }}" 
                         alt="Avatar of {{ $user->name }}" 
                         class="rounded-circle mb-3" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text text-muted">{{ $user->email }}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('viewUser', $user) }}" class="btn btn-info btn-sm mx-1">View</a>
                        <a href="{{ route('editUser', $user) }}" class="btn btn-warning btn-sm mx-1">Edit</a>
                        <form action="{{ route('deleteUser', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
