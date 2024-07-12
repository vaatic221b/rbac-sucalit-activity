@extends('mainLayout')

@section('page-content')
<div class="container-fluid text-center my-5">
    <blockquote class="blockquote">
        <p class="mb-0">You must be the change you wish to see in the world. - Mahatma Gandhi</p>
    </blockquote>
    <hr class="my-4">
    <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
