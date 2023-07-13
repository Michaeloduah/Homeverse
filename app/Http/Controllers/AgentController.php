<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class AgentController extends Controller
{
    //
    public function createproperty() {
        return view('dashboard.agent.create');
    }
    
    public function myproperty() {
        $user = auth()->user();
        $totals = Property::all()->where('user_id', $user->id);
        $properties = Property::where('user_id', $user->id)->paginate(1);
        $total = count($totals);

        return view('dashboard.agent.property', compact('user', 'properties', 'total'));
    }
    
    public function orders() {
        return view('dashboard.agent.orders');
    }
    
    public function editproperty($id) {
        try {
            // Find the record by ID
            $property = Property::findOrFail($id);
            
            // Check if the record belongs to the authenticated user
            if ($property->user_id !== auth()->user()->id) {
                abort(403); // Return a forbidden response if the record doesn't belong to the user
            }
            
            // Continue with displaying the record
            return view('dashboard.agent.editproperty', compact('property'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            // The record was not found
            // Handle the exception or display an error message
        }
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
            $imageName = $image->hashName();
            $image->store('property', 'public');
            $fileNames[] = $imageName;
        }
        
        $images = $fileNames;

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
        
        return redirect()->intended('dashboard/agent/myproperty')->with('Property created successfully');
    }

    public function updateproperty(Request $request, $id) {
        $property = Property::findOrFail($id);
        $valid = $request->validate([
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
        if ($request->hasFile('image[]')) {
            
            foreach ($request->file('image') as $image) {
                $imageName = $image->hashName();
                $image->store('property', 'public');
                $fileNames[] = $imageName;
            }
            
            $images = $fileNames;
        } else {
            $images = $property->images;
        };

        $update = [
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
        ];

        $property->update($update);
        
        return redirect()->intended('dashboard/agent/myproperty')->with('Property update successfully');
    }

    public function deleteproperty(Property $property, $id) {
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect()->intended('dashboard/agent/myproperty')->with('message', 'Property deleted Successfully');
    }

}
