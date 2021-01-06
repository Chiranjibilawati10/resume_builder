@extends('layouts.app')
@section('content')
    <h2>Work Summary</h2>
    @foreach($experiences as $e)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$e->job_title}} ({{$e->start_date}}, {{$e->end_date}}) </h4>
                    <ul>
                        <li>{{ $e->employer }}</li>
                        <li>{{ $e->city }}</li>
                        <li>{{ $e->state }}</li>

                    </ul>
                <a name="" class="btn btn-sm btn-primary" href="{{ route('experience.edit', $e) }}" role="button">Edit</a>

                <form action="{{route('experience.destroy', $e)}}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                </form>
            </div>
        </div>
    @endforeach

    <a name="" class="btn btn-primary mt-3" href="{{ route('experience.create') }}" role="button">Add Another Experience</a>
    <a name="" class="btn btn-primary mt-3 ml-auto" href="{{ route('skill.index') }}" role="button">Skills</a>
    
@endsection