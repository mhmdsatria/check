<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\User;
use App\Models\Bidang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    // Dashboard menampilkan data konsultasi terbaru
    public function dashboard()
    {
        $konsultasis = Konsultasi::orderBy('created_at', 'desc')->get();
        return view('superadmin.dashboard', compact('konsultasis'));
    }

    // List akun admin bidang + data bidang untuk form
    public function accounts()
    {
        $admins = User::where('role', 'admin_bidang')->with('bidang')->get();
        $bidangs = Bidang::all();
        return view('superadmin.accounts', compact('admins', 'bidangs'));
    }

    // Simpan akun admin bidang baru
    public function storeAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'bidang_id' => 'nullable|exists:bidangs,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin_bidang',
            'bidang_id' => $request->bidang_id,
        ]);

        return redirect()->route('superadmin.accounts')->with('success', 'Akun admin bidang berhasil dibuat.');
    }

    // Form edit akun admin bidang
    public function editAccount($id)
    {
        $admin = User::where('role', 'admin_bidang')->findOrFail($id);
        $bidangs = Bidang::all();
        return view('superadmin.edit_account', compact('admin', 'bidangs'));
    }

    // Update data akun admin bidang
    public function updateAccount(Request $request, $id)
    {
        $admin = User::where('role', 'admin_bidang')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:6|confirmed',
            'bidang_id' => 'nullable|exists:bidangs,id',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->bidang_id = $request->bidang_id;
        $admin->save();

        return redirect()->route('superadmin.accounts')->with('success', 'Akun admin bidang berhasil diperbarui.');
    }

    // Hapus akun admin bidang
    public function destroyAccount($id)
    {
        $admin = User::where('role', 'admin_bidang')->findOrFail($id);
        $admin->delete();

        return redirect()->route('superadmin.accounts')->with('success', 'Akun admin bidang berhasil dihapus.');
    }

    // Teruskan konsultasi ke admin bidang
    public function assign(Request $request, $id)
    {
        $k = Konsultasi::findOrFail($id);

        $request->validate(['admin_id' => 'required|exists:users,id']);

        $admin = User::findOrFail($request->admin_id);
        $k->admin_id = $admin->id;
        $k->bidang_id = $admin->bidang_id; // bidang mengikuti admin yang ditugaskan
        $k->status = 'assigned';
        $k->save();

        // TODO: notifikasi ke admin yang ditugaskan

        return redirect()->back()->with('success', 'Konsultasi diteruskan ke admin bidang.');
    }
    public function bidangIndex()
    {
        $bidangs = Bidang::all();
        return view('superadmin.bidang.index', compact('bidangs'));
    }

    public function bidangCreate()
    {
        return view('superadmin.bidang.create');
    }

    public function bidangStore(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);

        Bidang::create([
            'nama_bidang' => $request->nama_bidang,
        ]);

        return redirect()->route('superadmin.bidang.index')->with('success', 'Bidang berhasil ditambah');
    }

    public function bidangEdit($id)
    {
        $bidang = Bidang::findOrFail($id);
        return view('superadmin.bidang.edit', compact('bidang'));
    }

    public function bidangUpdate(Request $request, $id)
    {
        $bidang = Bidang::findOrFail($id);
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);
        $bidang->nama_bidang = $request->nama_bidang;
        $bidang->save();

        return redirect()->route('superadmin.bidang.index')->with('success', 'Bidang berhasil diperbarui');
    }

    public function bidangDestroy($id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->delete();

        return redirect()->route('superadmin.bidang.index')->with('success', 'Bidang berhasil dihapus');
    }
    public function listKonsultasi()
    {
        $konsultasis = Konsultasi::orderBy('created_at', 'desc')->get();
        return view('superadmin.konsultasi.index', compact('konsultasis'));
    }
    
    // Fungsi baru untuk export PDF
    public function exportPdf()
    {
        $konsultasis = Konsultasi::orderBy('created_at', 'desc')->get();
        $pdf = Pdf::loadView('superadmin.konsultasi.export_pdf', compact('konsultasis'));

        return $pdf->download('laporan_konsultasi_publik.pdf');
    }
}
