@extends('layouts.app')


@section('content')
<h3>To accept the invitation</h3>
<div class="text-muted font-weight-bold">Update your password</div>
    <form class="form" method="POST" action="{{ route('invitation.accept', $user->id) }}" id="kt_login_signin_form">
        @csrf
        <div class="form-group mb-5">
            <input class="form-control  @error('password') is-invalid @enderror" type="password" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password"/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-5">
            <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation"  required autocomplete="new-password"/>
        </div>
        <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold ">Update</button>
    </form>
		
@endsection
