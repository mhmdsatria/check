<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\LogStatus;
use Illuminate\Support\Facades\Http;

class AdminBidangController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $konsultasis = Konsultasi::where('admin_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.dashboard', compact('konsultasis'));
    }


    public function show($id)
    {
        $k = Konsultasi::findOrFail($id);

        abort_unless(auth()->id() === $k->admin_id, 403);

        return view('admin.show', compact('k'));
    }

    public function verify(Request $request, $id)
    {
        $k = Konsultasi::findOrFail($id);
        abort_unless(auth()->id() === $k->admin_id, 403);

        $request->validate([
            'action' => 'required|in:accept,reschedule',
            // waktu_konfirmasi wajib kalau action accept atau reschedule
            'waktu_konfirmasi' => 'required_if:action,accept,reschedule|date',
            'catatan' => 'nullable|string'
        ], [
            'waktu_konfirmasi.required_if' => 'Waktu konfirmasi harus diisi jika status diterima atau reschedule.',
            'waktu_konfirmasi.date' => 'Format waktu konfirmasi tidak valid.',
        ]);

        $oldStatus = $k->status;

        if ($request->action === 'accept') {
            $k->status = 'diterima';
            // pakai waktu_konfirmasi dari input (karena wajib)
            $k->waktu_konfirmasi = $request->waktu_konfirmasi;
        } else {
            $k->status = 'reschedule';
            $k->waktu_konfirmasi = $request->waktu_konfirmasi;
        }

        $k->save();

        LogStatus::create([
            'konsultasi_id' => $k->id,
            'user_id' => auth()->id(),
            'status_awal' => $oldStatus,
            'status_akhir' => $k->status,
            'catatan' => $request->catatan,
            'waktu_perubahan' => now()
        ]);

        // Kirim notifikasi WhatsApp
        try {
            $payload = [
                'to' => $k->no_wa,
                'message' => $k->status === 'diterima'
                    ? "Konfirmasi: konsultasi Anda telah dijadwalkan pada " . $k->waktu_konfirmasi
                    : "Permintaan reschedule. Usulan waktu: " . $k->waktu_konfirmasi
            ];

            $waUrl = config('app.wa_api_url') ?? env('WA_API_URL');
            $apiKey = env('WA_API_KEY');

            if ($waUrl && $apiKey) {
                Http::withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey
                ])->post($waUrl, $payload);
            }
        } catch (\Exception $e) {
            \Log::error('WA send failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Status konsultasi diperbarui dan notifikasi dikirim.');
    }
}
