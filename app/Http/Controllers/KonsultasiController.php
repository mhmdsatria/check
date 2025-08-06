<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function create()
    {
    $divisis = Divisi::all();
    return view('konsultasi', compact('divisis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
            'instansi' => 'nullable|string|max:255',
            'email' => 'required|email',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'deskripsi' => 'required|string',
            'file' => 'nullable|file|max:2048|mimes:pdf,jpg,jpeg,png,doc,docx',
            'divisi_id' => 'required|exists:divisis,id',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('konsultasi_files', 'public');
        }

        Konsultasi::create([
            'nama_lengkap' => $request->nama_lengkap,
            'no_wa' => $request->no_wa,
            'instansi' => $request->instansi,
            'email' => $request->email,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'deskripsi' => $request->deskripsi,
            'file' => $filePath,
            'divisi_id' => $request->divisi_id,
        ]);

        return back()->with('success', 'Konsultasi berhasil dikirim!');
    }
}
