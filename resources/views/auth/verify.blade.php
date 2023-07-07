@extends('layouts.homepage')

@section('content')
    <div class="container">
        <h2 style="margin: 15px">Verify Your Email Address</h2>
        <h3 style="margin: 15px">Before proceeding, please check your email for a verification link. <br> If you did not receive the email</h3>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                <h3 style="margin: 15px">A fresh verification link has been sent to your email address.</h3>
            </div>
        @endif
        <form style="margin: 15px" class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="header-top-btn">Click here to request another</button>.
        </form>
        {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
