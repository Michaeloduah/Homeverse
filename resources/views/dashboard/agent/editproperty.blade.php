@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Add Property</a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- <h1>{{ $property->id }}</h1> --}}

        <form method="POST" class="login-form" action="{{ route('dashboard.agent.updateproperty',$property->id) }}" enctype="multipart/form-data">
            @csrf
            <label for="name" class="login-label">Name:</label><br>
            <input class="login-input1" type="text" name="name" id="name" value="{{ old('name') }}"><br>
            @if ($errors->has('name'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('name') }}</span>
                </span><br>
            @endif
            
            <label for="property_type" class="login-label">Property Type:</label><br>
            <select name="property_type" class="login-input1" id="property_type" value="{{ old('property_type') }}">
                <option value="">Select Your Property Type</option>
                <option value="House">House</option>
                <option value="Land">Land</option>
                <option value="Shop">Shop</option>
            </select><br>
            @if ($errors->has('property_type'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('property_type') }}</span>
                </span><br>
            @endif

            <label class="login-label" for="image[]">Image:</label>
            {{-- <small>Select multiple images for your properties</small> --}}
            <br>
            <input name="image[]" class="login-input1" id="image[]" type="file" multiple><br>
            @if ($errors->has('image[]'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('image[]') }}</span>
                </span><br>
            @endif
            
            <label class="login-label" for="description">Description:</label><br>
            <textarea name="description" class="login-input1" id="description" type="text" value="{{ old('description') }}" rows="5" cols="5"></textarea><br>
            @if ($errors->has('description'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('description') }}</span>
                </span><br>
            @endif
            
            <label class="login-label" for="location">Location:</label><br>
            <input name="location" class="login-input1" id="location" type="text" value="{{ old('location') }}"><br>
            @if ($errors->has('location'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('location') }}</span>
                </span><br>
            @endif
            
            <label class="login-label" for="price">Price:</label><br>
            <input name="price" class="login-input1" id="price" type="number" value="{{ old('price') }}"><br>
            @if ($errors->has('price'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('price') }}</span>
                </span><br>
            @endif
            
            <label class="login-label" for="contact">Contact:</label><br>
            <input name="contact" class="login-input1" id="contact" type="text" value="{{ old('contact') }}"><br>
            @if ($errors->has('contact'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('contact') }}</span>
                </span><br>
            @endif
            
            <button class="btn-edit" type="submit">Add Property</button>

        </form>
    </main>
@endsection