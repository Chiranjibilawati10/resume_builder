@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Welcome to Resume Builder.</h2>
        <a class="btn btn-primary" href="{{ route('user-detail.create') }}" role="button">Build Now</a>
    </div>
    
@endsection