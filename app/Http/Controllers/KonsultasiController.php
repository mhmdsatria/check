<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\Bidang;
use Illuminate\Support\Facades\Storage;

class KonsultasiController extends Controller
{
    
    public function index()
    {
        // Public form (no bidang select shown because user doesn't know bidang)
        return view('welcome');
    }

    public function create()
    {
        // Public form (no bidang select shown because user doesn't know bidang)
        return view('public.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:191',
            'email' => 'required|email',
            'no_wa' => 'required',
            'deskripsi' => 'required|string',
            'tanggal_permohonan' => 'nullable|date',
            'waktu_permohonan' => 'nullable',
            'lampiran' => 'nullable|file|max:5120'
        ]);

        if($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('lampiran');
            $data['lampiran'] = $path;
        }

        $data['status'] = 'pending';
        $k = Konsultasi::create($data);

        // TODO: notify superadmin by email/notification

        return redirect()->back()->with('success', 'Konsultasi berhasil dikirim. Silakan tunggu konfirmasi via WhatsApp.');
    }
}
