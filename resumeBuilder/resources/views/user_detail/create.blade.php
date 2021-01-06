@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tell us something about you.</h2>
    
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
        <form class="col-md-4 offset-md-4" action="/user-detail" method="POST">
        @csrf
            <!-- Fullname input -->
            <div class="form-outline mb-4">
                <input type="fullname" name="fullname" class="form-control" />
                <label class="form-label">Full Name</label>
              </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email" class="form-control" />
              <label class="form-label" >Email address</label>
            </div>
          
            <!-- Phone input -->
            <div class="form-outline mb-4">
              <input type="text" name="phone" class="form-control" maxlength="10" />
              <label class="form-label" >Phone</label>
            </div>
            
            <!-- Address input -->
            <div class="form-outline mb-4">
                <input type="text" name="address" class="form-control" />
                <label class="form-label" >Address</label>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" value="submit">Save Details</button>
          </form>
    </div>
</div>
  
   
@endsection