<div class="sidebar">
    <h4 class="text-center">Dashboard</h4>
    <a href="{{ route('dashboard') }}" class="btn btn-link w-100 {{ request()->routeIs('dashboard') ? 'active' : '' }}">Home</a>
    <a href="{{ route('compliance') }}" class="btn btn-link w-100 {{ request()->routeIs('feedback') ? 'active' : '' }}">Submit Feedback</a>
    <a href="{{ route('accountSettings') }}" class="btn btn-link w-100 {{ request()->routeIs('accountSettings') ? 'active' : '' }}">Account Settings</a>
    <a href="{{ route('users') }}" class="btn btn-link w-100 {{ request()->routeIs('users') ? 'active' : '' }}">User Management</a>
    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="btn btn-danger w-100">Logout</button>
    </form>
</div>
