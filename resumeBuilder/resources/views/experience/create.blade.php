@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Experience Details</h2>
    
    <div class="row">
        <form class="col-md-4 offset-md-4" action="/experience" method="POST">
        @csrf
            <!-- Job title input -->
            <div class="form-outline mb-4">
                <input type="text" name="job_title" class="form-control" />
                <label class="form-label">Job Title</label>
              </div>

            <!-- Employer input -->
            <div class="form-outline mb-4">
              <input type="text" name="employer" class="form-control" />
              <label class="form-label" >Employer</label>
            </div>
          
            <!-- City input -->
            <div class="form-outline mb-4">
              <input type="text" name="city" class="form-control"  />
              <label class="form-label" >city</label>
            </div>
            
            <!-- State input -->
            <div class="form-outline mb-4">
                <input type="text" name="state" class="form-control" />
                <label class="form-label" >State</label>
            </div>
            
            <!-- start date input -->
            <div class="form-outline mb-4">
                <input type="date" name="start_date" class="form-control" />
                <label class="form-label" >Start Date</label>
            </div>

            <!-- End date input -->
            <div class="form-outline mb-4">
                <input type="date" name="end_date" class="form-control" />
                <label class="form-label" >End Date</label>
            </div>
            
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" value="submit">Save Experience</button>
          </form>
    </div>
</div>
  
   
@endsection