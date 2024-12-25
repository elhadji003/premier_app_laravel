<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ]);

        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Connexion réussie');
        }

        return back()->withErrors([
            "email" => "Les informations d'identification ne correspondent pas.",
        ])->onlyInput("email");
    }

    public function registerForm()
    {
        return view("auth.register");
    }

    public function register(Request $request)
    {
        $request->validate([
            "prenom" => "required|string|max:255",
            "nom" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "address" => "required|string|max:255",
            "phone" => "required|string|regex:/^[0-9+\(\)#\.\s\/ext-]+$/",
            "profession" => "required|string|max:255",
            "password" => "required|string|min:8|confirmed",
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'profession' => $request->profession,
            'password' => Hash::make($request->password), // Hachage du mot de passe
        ]);

        return redirect()->route('app_login_form')->with('success', 'Inscription réussie');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('app_login_form')->with('success', 'Vous êtes déconnecté avec succès');
    }


    public function showProfile()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }


    public function edit()
    {
        $user = Auth::user();
        return view('pages.editProfile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9+\(\)#\.\s\/ext-]+$/',
            'profession' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'profession' => $request->profession,
        ]);

        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès');
    }
}
