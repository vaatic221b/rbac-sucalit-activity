<form action="{{ route('logout') }}" class="d-inline-block">
    @csrf
    <button type="submit" class="btn btn-sm btn-danger">
        Logout
    </button>
</form>
