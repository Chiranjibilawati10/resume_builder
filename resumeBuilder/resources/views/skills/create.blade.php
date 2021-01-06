@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Skills Details</h2>
    
    <div class="row">
        <form class="col-md-4 offset-md-4" action="/skill" method="POST">
        @csrf
            <!-- Skill name input -->
            <div class="form-outline mb-4">
                <input type="text" name="name" class="form-control" />
                <label class="form-label">Skill name</label>
              </div>

            <!-- Skill rating input -->
            <div class="form-outline mb-4">
              <input type="text" name="rating" class="form-control" />
              <label class="form-label" >Rating</label>
            </div>
            
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" value="submit">Save Skill</button>
            <a class="btn btn-primary mt-8" href="{{ route('skill.index')}}" role="button">Skills</a>
            
          </form>
         
    </div>
</div>
  
   
@endsection