@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Education Details</h2>
    
    <div class="row">
        <div>
            @if(session()->has('errors'))
                @foreach ($errors->all() as $e)
                    <div class="alert alert-danger" role="alert">
                        <p>{{$e}}</p>
                    </div>
                @endforeach
            @endif
        </div>
        <form class="col-md-4 offset-md-4" action="{{ route('education.update', $education) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Schoolname input -->
            <div class="form-outline mb-4">
                <input type="text" name="school_name" class="form-control" value="{{$education->school_name}}"/>
                <label class="form-label">School Name</label>
              </div>

            <!-- School location input -->
            <div class="form-outline mb-4">
              <input type="text" name="school_location" class="form-control" value="{{$education->school_location}}" />
              <label class="form-label">School Location</label>
            </div>
          
            <!-- Degree input -->
            <div class="form-outline mb-4">
              <input type="text" name="degree" class="form-control" maxlength="10" value="{{$education->degree}}"/>
              <label class="form-label" >Degree</label>
            </div>
            
            <!-- Field of study input -->
            <div class="form-outline mb-4">
                <input type="text" name="field_of_study" class="form-control" value="{{$education->field_of_study}}"/>
                <label class="form-label" >Field of Study</label>
            </div>
            
            <!-- Graduation start date input -->
            <div class="form-outline mb-4">
                <input type="date" name="graduation_start_date" class="form-control" value="{{$education->graduation_start_date}}"/>
                <label class="form-label" >Graduation Start Date</label>
            </div>

            <!-- Graduation end date input -->
            <div class="form-outline mb-4">
                <input type="date" name="graduation_end_date" class="form-control" value="{{$education->graduation_end_date}}"  />
                <label class="form-label" >Graduation End Date</label>
            </div>
            
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" value="submit">Update Education</button>
          </form>
    </div>
</div>
  
   
@endsection