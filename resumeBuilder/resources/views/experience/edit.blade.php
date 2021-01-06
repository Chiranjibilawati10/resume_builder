@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Experience Details</h2>
    
    <div class="row">
        <form class="col-md-4 offset-md-4" action="{{ route('experience.update', $experience) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Job title input -->
            <div class="form-outline mb-4">
                <input type="text" name="job_title" class="form-control" value="{{$experience->job_title}}"/>
                <label class="form-label">Job Title</label>
              </div>

            <!-- Employer input -->
            <div class="form-outline mb-4">
              <input type="text" name="employer" class="form-control" value="{{$experience->employer}}" />
              <label class="form-label">Employer</label>
            </div>
          
            <!-- State input -->
            <div class="form-outline mb-4">
              <input type="text" name="state" class="form-control" value="{{$experience->state}}"/>
              <label class="form-label" >State</label>
            </div>
            
            <!-- City input -->
            <div class="form-outline mb-4">
                <input type="text" name="city" class="form-control" value="{{$experience->city}}"/>
                <label class="form-label" >City</label>
            </div>
            
            <!-- Start date input -->
            <div class="form-outline mb-4">
                <input type="date" name="start_date" class="form-control" value="{{$experience->start_date}}"/>
                <label class="form-label" >Start Date</label>
            </div>

            <!-- End date input -->
            <div class="form-outline mb-4">
                <input type="date" name="end_date" class="form-control" value="{{$experience->end_date}}"  />
                <label class="form-label" >End Date</label>
            </div>
            
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" value="submit">Update Experience</button>
          </form>
    </div>
</div>
  
   
@endsection