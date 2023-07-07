@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Profile</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="profile-card">
            <div class="info1">
                @if (auth()->user()->image == NULL)
                    <img width="70%" height="60%" style="border-radius: 50%" src="{{ asset('assets/images/no-profile.png') }}" alt="">
                @else
                    <img width="70%" height="60%" style="border-radius: 50%" src="{{asset('storage/'.auth()->user()->image)}}">
                @endif

                <h2>{{auth()->user()->fullname}}</h2>
                <p>{{auth()->user()->account_type}} Account</p>
                <hr>
            
                <a class="btn-edit" href="{{ route('dashboard.editprofile') }}">Edit Profile</a>
            
            </div>

            <div class="info2">
                <label class="login-label" for="fullname">Fullname:</label>
                <input class="login-input" type="text" value="{{auth()->user()->fullname}}" readonly><br>

                <label class="login-label" for="username">Username:</label>
                <input class="login-input" type="text" value="{{auth()->user()->username}}" readonly><br>

                <label class="login-label" for="phone">Phone Number:</label>
                <input class="login-input" type="text" value="{{auth()->user()->phone}}" readonly><br>

                <label class="login-label" for="email">Email:</label>
                <input class="login-input" type="text" value="{{auth()->user()->email}}" readonly><br>

                <label class="login-label" for="address">Address:</label>
                <input class="login-input" type="text" value="{{auth()->user()->address}}" readonly><br>
                
                <a class="btn-edit" href="{{ route('dashboard.editprofile') }}">Edit Profile</a>    
            </div>

        </div>
    </main>
@endsection