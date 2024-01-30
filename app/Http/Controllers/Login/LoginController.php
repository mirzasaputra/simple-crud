<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];

        return view('login.index', $data);
    }

    public function authenticate(Request $request) 
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        try {
            if(Auth::attempt($request->only(['username', 'password']))) {
                return redirect()->route('dashboard');
            } else {
                return back()->withErrors(['general_errors' => 'Username atau password tidak sesuai'])->withInput();
            }
        } catch(Exception $e) {
            return back()->withErrors(['general_errors' => $e->getMessage()]);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }

}
