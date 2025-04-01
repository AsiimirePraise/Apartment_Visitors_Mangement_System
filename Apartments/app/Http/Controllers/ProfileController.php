<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit', [
            'activePage' => 'profile',
            'title' => 'My Profile'
        ]);
    }

    /**
     * Update the profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.auth()->id()
        ]);

        auth()->user()->update($request->all());

        return back()->with('status', __('Profile successfully updated.'));
    }

    /**
     * Show change password form
     *
     * @return \Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        return view('profile.change-password', [
            'activePage' => 'profile',
            'title' => 'Change Password'
        ]);
    }

    /**
     * Change the password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('status', __('Password successfully updated.'));
    }
}
