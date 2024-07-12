@extends('mainLayout')

@section('page-content')
<div class="container-fluid text-center my-5">
    <blockquote class="blockquote">
        <p class="mb-0">People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius</p>
    </blockquote>
    <hr class="my-4">
    <div class="d-flex flex-column align-items-center">
        <p class="my-2">
            <a href="{{ route('usertool') }}" class="btn btn-primary">Manage User Roles and Permissions</a>
        </p>
        <p class="my-2">
            <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
        </p>
    </div>
</div>
@endsection
