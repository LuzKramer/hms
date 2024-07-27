<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Job;
use App\Models\specialization;
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
        $jobs =  Job::all();
        $specializs =  specialization::all();

        return view('auth.register', [

            'specializs' => $specializs,
            'jobs' => $jobs
        ]);
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cpf' => ['required', 'string', 'max:11', 'unique:' . User::class],
            'job' => ['required', 'integer'],
            'specialization' => ['required', 'integer'],
            'fone' => ['required', 'string', 'max:15'],
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ]);

        if ($request->hasFile('img')) {

            $file = $request->file('img');
            $filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('imgdb'), $filename);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'job' => $request->job,
            'specialization' => $request->specialization,
            'fone' => $request->fone,
            'img' => $filename,

        ]);

        event(new Registered($user));


        return redirect(RouteServiceProvider::HOME);
    }
}
