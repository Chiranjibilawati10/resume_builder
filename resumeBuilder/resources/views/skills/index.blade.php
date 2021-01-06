@extends('layouts.app')
@section('content')
    <h2>Skill Summary</h2>
    @foreach($skill as $e)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$e->name}} ({{$e->rating}}) </h4>
                   
                <a name="" class="btn btn-sm btn-primary" href="{{ route('skill.edit', $e) }}" role="button">Edit</a>

                <form action="{{route('skill.destroy', $e)}}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                </form>
            </div>
        </div>
    @endforeach

    <a name="" class="btn btn-primary mt-4" href="{{ route('skill.create') }}" role="button">Add Another Skill</a>
    
@endsection