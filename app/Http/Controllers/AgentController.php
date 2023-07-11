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

    public function storeproperty(Request $request) {
        $property = $request->validate([
            'name' => 'required',
            'property_type' => 'required',
            'image[]' => 'mimes:jpg,png,jpeg,svg',
            'description' => 'required',
            'location' => 'required',
            'price' => 'required',
            'contact' => 'required'
        ]);

        $user_id = auth()->user()->id;
        $status = "For Sale";
        $verification = "Pending";

        $fileNames = [];
        foreach ($request->file('image') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->store('property', 'public');
            $fileNames[] = $imageName;
        }

        $images = json_encode($fileNames);

        $property = Property::create([
            'user_id' => $user_id,
            'name' => $request->input('name'),
            'images' => $images,
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
