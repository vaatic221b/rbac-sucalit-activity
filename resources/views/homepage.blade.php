@extends('mainLayout')

@section('page-title','Main Landing Page')

@section('page-content')
<div class="container-fluid text-center my-5">
    <h1 class="display-4">Welcome to the Site</h1>
    <hr class="my-4">
    <div class="d-flex justify-content-center">
        <div class="mx-3">
            <a href="{{ route('acctg') }}"
                @unless(Auth::user()->hasRole('admin') || Auth::user()->hasRole('bookeeper') || Auth::user()->hasRole('auditor') || Auth::user()->hasRole('audasst'))
                    class="btn btn-secondary disabled"
                @else
                    class="btn btn-primary"
                @endunless
            >Accounting</a>
        </div>
        <div class="mx-3">
            <a href="{{ route('prod') }}"
                @unless(Auth::user()->hasRole('admin') || Auth::user()->hasRole('assembler'))
                    class="btn btn-secondary disabled"
                @else
                    class="btn btn-primary"
                @endunless
            >Production</a>
        </div>
        @if(Auth::user()->hasRole('admin'))
            <div class="mx-3">
                <a href="{{ route('dash') }}" class="btn btn-primary">Dashboard</a>
            </div>
        @endif
    </div>
</div>
@endsection
