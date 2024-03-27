<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
<<<<<<< HEAD
=======
use App\Models\job;
use App\Models\specialization;
>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
<<<<<<< HEAD
        return view('profile.edit', [
            'user' => $request->user(),
=======
        $jobs =  job::all();
        $specializs =  specialization::all();

        return view('profile.edit', [
            'user' => $request->user(),
            'specializs' => $specializs,
            'jobs' => $jobs

>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
