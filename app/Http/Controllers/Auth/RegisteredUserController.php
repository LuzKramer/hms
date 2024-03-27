<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
<<<<<<< HEAD
=======
use App\Models\job;
use App\Models\specialization;
>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
<<<<<<< HEAD
        return view('auth.register');
=======
        $jobs =  job::all();
        $specializs =  specialization::all();

        return view('auth.register', [

            'specializs' => $specializs,
            'jobs' => $jobs
        ]);
>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
<<<<<<< HEAD
=======
            'cpf' => ['required', 'string', 'max:11', 'unique:'.User::class],
            'job' => ['required', 'integer'],
            'specialization' => ['required', 'integer'],
            'fone' => ['required', 'string', 'max:15']
>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
<<<<<<< HEAD
=======
            'cpf' => $request->cpf,
            'job' => $request->job,
            'specialization' => $request->specialization,
            'fone' => $request->fone

>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
        ]);

        event(new Registered($user));

<<<<<<< HEAD
        Auth::login($user);
=======

>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386

        return redirect(RouteServiceProvider::HOME);
    }
}
