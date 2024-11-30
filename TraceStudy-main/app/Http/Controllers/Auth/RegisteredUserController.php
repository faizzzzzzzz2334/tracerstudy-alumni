<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|in:mahasiswa,dosen',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photo = $request->file('photo');
        $namafile = $request->email . $photo->getClientOriginalName();
        $path = 'photo/' . $namafile;
        Storage::disk('public')->put($path, file_get_contents($photo));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'photo' => $path,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function createDosen()
    {
        return view('auth.register_dosen');
    }

    public function storeDosen(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan foto
        $photo = $request->file('photo');
        $namafile = $request->email . $photo->getClientOriginalName();
        $path = 'photo/' . $namafile;
        Storage::disk('public')->put($path, file_get_contents($photo));

        // Buat user dosen
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dosen',
            'photo' => $path,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function createMahasiswa()
    {
        return view('auth.register_mahasiswa');
    }

    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan foto
        $photo = $request->file('photo');
        $namafile = $request->email . $photo->getClientOriginalName();
        $path = 'photo/' . $namafile;
        Storage::disk('public')->put($path, file_get_contents($photo));

        // Buat user mahasiswa
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
            'photo' => $path,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
}
