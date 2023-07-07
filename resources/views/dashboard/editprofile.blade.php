@extends('layouts.dashboard')

@section('content')
<h1>{{$user->fullname}}</h1>
    <main>
        <form class="login-form" method="POST" action="{{ route('dashboard.updateprofile',auth()->user()->id) }}" enctype="multipart/form-data">
            @csrf
            
            <label class="login-label" for="fullname">Full Name:</label><br>
            <input name="fullname" class="login-input1" id="fullname" type="text" placeholder="{{$user->fullname}}" value="{{ old('fullname') }}"><br>
            @if ($errors->has('fullname'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('fullname') }}</span>
                </span>
            @endif
    
    
            <label class="login-label" for="username">Username:</label><br>
            <input name="username" class="login-input1" id="username" type="text" placeholder="{{$user->username}}" value="{{ old('username') }}"><br>
            @if ($errors->has('username'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('username') }}</span>
                </span>
            @endif
    
    
            <label class="login-label" for="email">Email Address:</label><br>
            <input name="email" class="login-input1" id="email" type="email" placeholder="{{$user->email}}" value="{{ old('email') }}"><br>
            @if ($errors->has('email'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('email') }}</span>
                </span>
            @endif
    
    
            <label class="login-label" for="phone">Phone Number:</label><br>
            <input name="phone" class="login-input1" id="phone" type="number" placeholder="{{$user->phone}}" value="{{ old('phone') }}"><br>
            @if ($errors->has('phone'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('phone') }}</span>
                </span>
            @endif
    
    
            <label class="login-label" for="address">Address:</label><br>
            <input name="address" class="login-input1" id="address" type="text" placeholder="{{$user->address}}" value="{{ old('address') }}"><br>
            @if ($errors->has('address'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('address') }}</span>
                </span>
            @endif
    
    
            <label class="login-label" for="password">Password:</label><br>
            <input name="password" class="login-input1" id="password" type="password" value="{{ old('password') }}"><br>
            @if ($errors->has('password'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('password') }}</span>
                </span>
            @endif
    
    
            <label class="login-label" for="confirm_password">Confirm Password:</label><br>
            <input name="confirm_password" class="login-input1" id="confirm_password" type="password" value="{{ old('confirm_password') }}"><br>
            @if ($errors->has('confirm_password'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('confirm_password') }}</span>
                </span>
            @endif
    
            <label class="login-label" for="image">Image:</label><br>
            <input name="image" class="login-input1" id="image" type="file"><br>
            @if ($errors->has('image'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('image') }}</span>
                </span>
            @endif
    
            {{-- <label class="login-label" for="account_type">Account Type:</label><br> --}}
            <select name="account_type" class="login-input1" id="account_type" value="{{ $user->account_type }}">
                <option value="">Select Your Account Type</option>
                <option value="Client">Client Account</option>
                <option value="Agent">Agent Account</option>
            </select>
            @if ($errors->has('account_type'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('account_type') }}</span>
                </span>
            @endif
    
            <button class="btn-edit" type="submit">Update Profile</button>
            
        </form>
    </main>
@endsection