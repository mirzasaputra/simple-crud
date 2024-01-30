<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Users',
            'users' => User::all()
        ];

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'action' => route('users.store')
        ];

        return view('user.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        try {
            $request->merge(['password' => Hash::make($request->password)]);
            User::create($request->only(['name', 'email', 'username', 'password']));

            return redirect()->route('users')->with('success', 'Berhasil menambahkan data');
        } catch(Exception $e) {
            return back()->withErrors(['general_errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'action' => route('users.update', $user->id)
        ];

        return view('user.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);

        try {
            $user->update($request->only('name', 'email', 'username'));

            return redirect()->route('users')->with('success', 'Berhasil mengubah data');
        } catch(Exception $e) {
            return back()->withErrors(['general_errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('users')->with('success', 'Berhasil menghapus data');;
        } catch(Exception $e) {
            return back()->withErrors(['general_errors' => $e->getMessage()]);
        }
    }
}
