@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Tell us something about you.</h2>
    
    <div class="row">
        <form class="col-md-4 offset-md-4" action="{{route('user-detail.update', $userDetail)}}" method="POST">
        @csrf
        @method('PUT')

          <x-form.text name="fullname" :value="$userDetail->fullname"></x-form.text>
          <x-form.text name="email" type="email" value="{{$userDetail->email}}"></x-form.text>
          <x-form.text name="phone" maxlength="10" value="{{$userDetail->phone}}"></x-form.text>
          <x-form.text name="address" :value="$userDetail->address"></x-form.text>
          <x-form.textarea name="summary" :value="$userDetail->summary"></x-form.textarea>
            
          <x-form.submit></x-form.submit>

          </form>
    </div>
</div>
  
   
@endsection