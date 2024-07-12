@extends('mainLayout')

@section('page-content')
<div class="container-fluid text-center my-5">
    <blockquote class="blockquote">
        <p class="mb-0">Simplicity is the ultimate sophistication. - Leonardo da Vinci</p>
    </blockquote>
    <hr class="my-4">
    <div class="d-flex justify-content-center">
        <div class="mx-3">
            @can('create')
                <a href="{{ url('acctg/new') }}" class="btn btn-primary">Add New Ledger Entry</a>
            @elsecan('viewAll')
                <a href="{{ url('acctg/view/all') }}" class="btn btn-secondary">View All Ledgers</a>
            @endcan
        </div>
    </div>
    <br>
    <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
