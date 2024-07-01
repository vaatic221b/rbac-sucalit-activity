@extends('mainLayout')

@section('title', 'Edit User Roles')

@section('page-content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="{{ route('usertool') }}" class="link-dark">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2>Edit User Roles</h2>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select class="form-control" id="roles" name="roles[]" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if($user->roles->contains($role->id)) selected @endif>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update Roles</button>
            </form>
        </div>
    </div>
</div>
@endsection
