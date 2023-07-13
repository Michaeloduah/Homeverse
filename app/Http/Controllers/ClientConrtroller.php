<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ClientConrtroller extends Controller
{
    //
    public function houseforsale() {
        $properties = Property::where('status', 'For Sale')->paginate(1);
        return view('dashboard.client.houseforsale', compact('properties'));
    }
    public function houseforrent() {
        $properties = Property::where('status', 'Rent')->paginate(1);
        return view('dashboard.client.houseforsale', compact('properties'));
    }
}
