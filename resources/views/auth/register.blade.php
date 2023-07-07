@extends('layouts.homepage')

@section('content')
    <form class="login-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        
        <label class="login-label" for="fullname">Full Name:</label><br>
        <input name="fullname" class="login-input" id="fullname" type="text" value="{{ old('fullname') }}" {{--required --}}><br>
        @if ($errors->has('fullname'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('fullname') }}</span>
            </span>
        @endif


        <label class="login-label" for="username">Username:</label><br>
        <input name="username" class="login-input" id="username" type="text" value="{{ old('username') }}" {{--required --}}><br>
        @if ($errors->has('username'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('username') }}</span>
            </span>
        @endif


        <label class="login-label" for="email">Email Address:</label><br>
        <input name="email" class="login-input" id="email" type="email" value="{{ old('email') }}" {{--required --}}><br>
        @if ($errors->has('email'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('email') }}</span>
            </span>
        @endif


        <label class="login-label" for="phone">Phone Number:</label><br>
        <input name="phone" class="login-input" id="phone" type="number" value="{{ old('phone') }}" {{--required --}}><br>
        @if ($errors->has('phone'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('phone') }}</span>
            </span>
        @endif


        <label class="login-label" for="address">Address:</label><br>
        <input name="address" class="login-input" id="address" type="text" value="{{ old('address') }}" {{--required --}}><br>
        @if ($errors->has('address'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('address') }}</span>
            </span>
        @endif


        <label class="login-label" for="password">Password:</label><br>
        <input name="password" class="login-input" id="password" type="password" value="{{ old('password') }}" {{--required --}}><br>
        @if ($errors->has('password'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('password') }}</span>
            </span>
        @endif


        <label class="login-label" for="confirm_password">Confirm Password:</label><br>
        <input name="confirm_password" class="login-input" id="confirm_password" type="password" value="{{ old('confirm_password') }}" {{--required --}}><br>
        @if ($errors->has('confirm_password'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('confirm_password') }}</span>
            </span>
        @endif

        <label class="login-label" for="image">Image:</label><br>
        <input name="image" class="login-input" id="image" type="file"><br>
        @if ($errors->has('image'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('image') }}</span>
            </span>
        @endif

        <label class="login-label" for="account_type">Account Type:</label><br>
        <select name="account_type" class="login-input" id="account_type" value="{{ old('account_type') }}" {{--required --}}>
            <option value="">Select Your Account Type</option>
            <option value="Client">Client Account</option>
            <option value="Agent">Agent Account</option>
        </select>
        @if ($errors->has('account_type'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('account_type') }}</span>
            </span>
        @endif

        <button class="header-top-btn" type="submit">Register</button>
        
        <p>Already have an account <a class="section-subtitle" style="display: inline" href="{{ route('login') }}">Login</a></p>
    </form>
@endsection