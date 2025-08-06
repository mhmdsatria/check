<?php

namespace App\Http\Controllers;

use App\Mail\KonsultasiStatusMail;
use App\Models\Divisi;
use App\Models\Konsultasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Halaman Admin Divisi
     */
    public function index()
    {
        $user = Auth::user();

        // ✅ Ambil konsultasi sesuai divisi admin login
        $konsultasis = Konsultasi::where('divisi_id', $user->divisi_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin', compact('konsultasis'));
    }

    /**
     * Halaman Super Admin Dashboard
     */
    public function superAdmin(Request $request)
    {
        $roleFilter = $request->query('role');
        $users = $roleFilter ? User::where('role', $roleFilter)->get() : User::all();

        $totalUsers = User::count();
        $roles = User::select('role')->distinct()->pluck('role');

        $totalKonsultasi = Konsultasi::count();
        $totalDiterima   = Konsultasi::where('status', 'diterima')->count();
        $totalDitolak    = Konsultasi::where('status', 'ditolak')->count();
        $totalRiwayat    = Konsultasi::where('status', 'pending')->count();

        $total = $totalKonsultasi > 0 ? $totalKonsultasi : 1;

        // Filter pencarian
        $search = $request->query('search');
        $status = $request->query('status');

        $konsultasiQuery = Konsultasi::query();

        if (!empty($search)) {
            $konsultasiQuery->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('instansi', 'like', "%$search%");
            });
        }

        if (!empty($status)) {
            $konsultasiQuery->where('status', $status);
        }

        $konsultasiTerbaru = $konsultasiQuery->orderBy('created_at', 'desc')->paginate(10);

        // Data untuk chart
        $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        $jumlahPerBulan = [];
        foreach (range(1, 12) as $i) {
            $jumlahPerBulan[] = Konsultasi::whereMonth('tanggal', $i)->count();
        }

        $activePage = $request->query('page', 'dashboard');

        // ✅ Tambahkan ini supaya tidak error
        $divisis = Divisi::all();

        if ($request->ajax()) {
            return view('partials.konsultasi-table', compact('konsultasiTerbaru'))->render();
        }

        return view('super-admin', compact(
            'users',
            'totalUsers',
            'roles',
            'roleFilter',
            'totalKonsultasi',
            'totalDiterima',
            'totalDitolak',
            'totalRiwayat',
            'konsultasiTerbaru',
            'bulan',
            'jumlahPerBulan',
            'total',
            'activePage',
            'divisis' // ✅ Sudah aman
        ));
    }


    /**
     * Verifikasi status konsultasi (Admin Divisi hanya untuk divisinya)
     */
    public function verifikasiKonsultasi($id, Request $request)
    {
        $status = $request->input('status'); // ✅ Ambil dari form POST

        $konsul = Konsultasi::findOrFail($id);

        if (Auth::user()->role === 'Admin' && $konsul->divisi_id !== Auth::user()->divisi_id) {
            return redirect()->back()->with('error', 'Anda tidak berhak memverifikasi konsultasi ini!');
        }

        $konsul->status = $status;
        $konsul->save();

        Mail::to($konsul->email)->send(new KonsultasiStatusMail($konsul, $status));
        $this->sendWhatsapp($konsul->no_wa, $this->formatWhatsappMessage($konsul, $status));

        return redirect()->back()->with('success', "Status konsultasi berhasil diubah!");
    }


    private function formatWhatsappMessage($konsul, $status)
    {
        if ($status === 'diterima') {
            return "Halo {$konsul->nama_lengkap},\n\nPengajuan konsultasi Anda *DITERIMA*.\n📅 {$konsul->tanggal}\n⏰ {$konsul->waktu}\n\nTerima kasih.";
        } elseif ($status === 'ditolak') {
            return "Halo {$konsul->nama_lengkap},\n\nMohon maaf, pengajuan konsultasi Anda *DITOLAK*.\n\nTerima kasih.";
        }
        return "Halo {$konsul->nama_lengkap},\n\nStatus konsultasi Anda telah diubah menjadi *" . strtoupper($status) . "*.";
    }

    private function sendWhatsapp($no_wa, $message)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.fonnte.com/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => [
                "target" => $no_wa,
                "message" => $message,
            ],
            CURLOPT_HTTPHEADER => ["Authorization: " . env('FONNTE_API_KEY')],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Form Tambah User
     */
    public function addUserForm()
    {
        $divisis = Divisi::all(); // ✅ Ambil semua divisi dari tabel
        return view('super-admin-add-user', compact('divisis'));
    }


    /**
     * Proses Tambah User (Super Admin)
     */
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:SuperAdmin,Admin',
            'divisi_id' => 'nullable|required_if:role,Admin|exists:divisis,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'divisi_id' => $request->role === 'Admin' ? $request->divisi_id : null,
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }
    public function listDivisi()
    {
        $divisis = Divisi::all();
        return view('super-admin-divisi', compact('divisis'));
    }

    public function storeDivisi(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required|string|max:255'
        ]);

        Divisi::create([
            'nama_divisi' => $request->nama_divisi
        ]);

        return redirect()->route('super-admin.divisi')->with('success', 'Divisi berhasil ditambahkan!');
    }
}
