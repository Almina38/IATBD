<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Request as OppasRequest; // Alias toegevoegd om de naamclash met 'Request' te voorkomen

class AuthController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Specifieke controle voor admin login
        if ($credentials['email'] === 'admin@passenopjedier.nl' && $credentials['password'] === 'passenopjedier123') {
            if (Auth::attempt($credentials)) {
                // Authentication was successful...
                return redirect()->intended('/admin/dashboard');
            }
        }

        // Als inloggen niet lukt, terugsturen met foutmelding
        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    // Methode voor het uitloggen van de admin
    public function adminLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    // Methode voor het tonen van het admin dashboard
    public function adminDashboard()
    {
        $users = User::all(); // Haal alle gebruikers op
        $requests = OppasRequest::all(); // Haal alle oppasaanvragen op

        return view('admin.dashboard', compact('users', 'requests'));
    }

    // Methode voor het blokkeren van een gebruiker
    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->blocked = true;
        $user->save();

        return redirect()->back()->with('message', 'Gebruiker geblokkeerd.');
    }

    // Methode voor het verwijderen van een oppasaanvraag
    public function deleteRequest($id)
    {
        $request = OppasRequest::findOrFail($id);
        $request->delete();

        return redirect()->back()->with('message', 'Aanvraag verwijderd.');
    }
}
