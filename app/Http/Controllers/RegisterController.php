<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Daftar Akun Baru' 
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'min:5|max:255'
        ]);

        // Create a new user
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        // Redirect to login page
        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan login.');

    }
}
