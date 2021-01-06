@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit skill Details</h2>
    
    <div class="row">
        <form class="col-md-4 offset-md-4" action="{{ route('skill.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Skill name input -->
            <div class="form-outline mb-4">
                <input type="text" name="name" class="form-control" value="{{$skill->name}}"/>
                <label class="form-label">Skill name</label>
              </div>

            <!-- Skill rating input -->
            <div class="form-outline mb-4">
              <input type="text" name="rating" class="form-control" value="{{$skill->rating}}" />
              <label class="form-label">Rating</label>
            </div>
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" value="submit">Update Skill</button>
          </form>
    </div>
</div>
  
   
@endsection