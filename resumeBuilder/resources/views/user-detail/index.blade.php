@extends('layouts.app')
@section('content')
    <h2>User Detail</h2>
        <div class="card">
            <div class="card-body">
                @if(isset($details))
                    <h4 class="card-title">{{$details->fullname}}, {{$details->email}}, {{$details->phone}}</h4>
                    <a name="" class="btn btn-sm btn-primary" href="{{ route('user-detail.edit', $details) }}" role="button">Edit</a>

                    <form action="{{route('user-detail.destroy', $details)}}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                    </form>
                @else
                    <h4 class="card-title">No user created.Please create user.</h4>
                    <a name="" class="btn btn-sm btn-primary" href="{{ route('user-detail.create', $details) }}" role="button">Create</a>

                @endif
                   
               
            </div>
        </div>
    <a class="btn btn-primary mt-3" href="{{route('education.index')}}" role="button">Next Section</a>
@endsection