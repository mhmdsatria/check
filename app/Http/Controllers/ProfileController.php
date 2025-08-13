<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // Proses update profil di sini
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        // Proses hapus akun di sini
        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }
}
