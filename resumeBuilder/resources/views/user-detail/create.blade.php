@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tell us something about you.</h2>
    
    <div class="row">
        <form class="col-md-4 offset-md-4" action="/user-detail" method="POST">
        @csrf
            <x-form.text name="fullname"></x-form.text>
            <x-form.text name="email" type="email"></x-form.text>
            <x-form.text name="phone"></x-form.text>
            <x-form.text name="address"></x-form.text>
            <x-form.textarea name="summary"></x-form.textarea>
           
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" value="submit">Save Details</button>
          </form>
    </div>
</div>
  
   
@endsection