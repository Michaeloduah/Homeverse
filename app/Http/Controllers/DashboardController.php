<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.index');
    }

    public function profile() {
        return view('dashboard.setting');
    }

    public function editprofile() {
        $user = User::findOrFail(auth()->user()->id);
        return view('dashboard.editprofile', ['user' => $user]);
    }

    public function updateprofile(Request $request, $id) {
        $user = User::findOrFail($id);
        $valid = $request->validate([
            'fullname' => 'required',
            'username' => ['required', Rule::unique('users')->ignore($user)],
            'email' => ['required', Rule::unique('users')->ignore($user)],
            'phone' => ['required', Rule::unique('users')->ignore($user)],
            'address' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8',
            'image' => 'mimes:jpg,png,jpeg',
            'account_type' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $user->update(array_merge($valid, ['image' => $request->file('image')->store('user_images', 'public')]));
        }
        else {
            $user->update(array_merge($valid));
        }
        return redirect()->intended('dashboard')->with('dashboard')->withInput($request->input())->with('message', 'Profile Updated');
    }

    
}
