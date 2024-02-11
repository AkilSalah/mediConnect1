<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\User;
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
        return view('auth.register');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required',
            'specialty' => ['required_if:role,Médecin', 'exists:specialities,id'],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        if ($request->role == 'Patient') {
            $patient = Patient::create(['id_user' => $user->id]);
        } elseif ($request->role == 'Médecin') {
            $medecin = Medecin::create([
                'id_user' => $user->id,
                'id_spaciality' => $request->specialty,
            ]);
        }
        
        if ($user->role == 'Patient'){
            Auth::login($user);
        return redirect()->route('patient'); 
        }elseif ($user->role == 'Médecin'){
            Auth::login($user);
            return redirect()->route('doctor');
        }

        return redirect(RouteServiceProvider::HOME);
    }


}
