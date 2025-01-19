@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">

        <div class="row">
            @include('includes.sidebar')
            <div class="col-md-9 col-md-offset-4 border border-primary">
                <h2>Правый блок</h2>
                <p>...</p>
            </div>
        </div>
    </div>
@endsection
