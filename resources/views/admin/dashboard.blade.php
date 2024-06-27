@extends('mainLayout')

@section('admin-content')
<div class="container-fluid">
    People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius
    <p>
        <a href="{{ route('usertool') }}">Manage User Roles and Permissions</a>
    </p>
</div>
@endsection

