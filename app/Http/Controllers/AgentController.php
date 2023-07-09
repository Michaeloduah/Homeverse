<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    public function createproperty() {
        return view('dashboard.agent.create');
    }
    
    public function myproperty() {
        return view('dashboard.agent.property');
    }
    
    public function orders() {
        return view('dashboard.agent.orders');
    }

    public function storeProperty(Request $request) {
        $property = $request->validate([
            'name' => 'required',
            'property_type' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
            'description' => 'required|min:50',
            'location' => 'required',
            'price' => 'required',
            'contact' => 'required',
            'confirm_password' => 'required_with:password|same:password|min:8',
            'account_type' => 'required'
        ]);

        $user_id = auth()->user()->id;
        $img_dir = $request->file('image')->store('property', 'public' );
        $status = "For Sale";
        $verification = "Pending";

        $property = Property::create([
            'user_id' => $user_id,
            'name' => $request->input('name'),
            'image' => $img_dir,
            'property_type' => $request->input('property_type'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'contact' => $request->input('contact'),
            'status' => $status,
            'verification' => $verification,
        ]);
    }

}
