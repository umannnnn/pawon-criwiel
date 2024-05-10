<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(7);

        return view('dashboard.users.index', [
            'title' => 'Pengguna',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Tambahkan 'is_admin' ke dalam data yang divalidasi
        $validatedData['is_admin'] = 1;

        // Hash password sebelum menyimpan ke database
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Buat pengguna baru dengan data yang telah divalidasi
        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'Admin baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'Admin berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $user = User::find($id);

        // admin terakhir tidak bisa dihapus
        if ($user->is_admin && User::where('is_admin', 1)->count() === 1) {
            return redirect('/dashboard/users')->with('error', 'Admin tersebut tidak bisa dihapus karena dia adalah admin terakhir.');
        }

        $user->delete();

        return redirect('/dashboard/users')->with('success', 'Admin berhasil dihapus.');
    }
}
