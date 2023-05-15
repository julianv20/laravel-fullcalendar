<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest'])->except('logout');
    }

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('events.index');
        }
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->get('name'));

        $this->validate($request, [
            'name' => 'required | max:30',
            'email' => 'required | max:100 | min:3 | unique:users',
            'password' => 'required | max:30 | min: 8 | confirmed',
        ]);



        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email', 'password'));
        $request->session()->regenerate();

        return redirect()->route('events.index');
    }
}
