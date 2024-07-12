@extends('mainLayout')

@section('title', 'Edit User Roles')

@section('page-content')
<div class="container-fluid my-5">
    <div class="row mb-4">
        <div class="col">
            <a href="{{ route('usertool') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2 class="mb-4">Edit User Roles</h2>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                </div>
                <div class="form-group mb-4">
                    <label for="roles" class="form-label">Roles</label>
                    <select class="form-control" id="roles" name="roles[]" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if($user->roles->contains($role->id)) selected @endif>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="permissions" class="form-label">Permissions for Selected Roles</label>
                    <div id="permissions"></div>
                </div>
                <button type="submit" class="btn btn-success">Update Roles</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const roles = @json($roles);

    function updatePermissions() {
        const selectedRoles = $('#roles').val();
        const permissionsDiv = $('#permissions');
        permissionsDiv.empty();

        selectedRoles.forEach(roleId => {
            const role = roles.find(r => r.id == roleId);
            if (role) {
                permissionsDiv.append('<div class="mb-2"><strong>' + role.name + ':</strong><ul></ul></div>');
                const ul = permissionsDiv.find('ul').last();
                role.permissions.forEach(permission => {
                    ul.append('<li>' + permission.name + '</li>');
                });
            }
        });
    }

    $(document).ready(function() {
        updatePermissions();
        $('#roles').change(updatePermissions);
    });
</script>
@endsection
