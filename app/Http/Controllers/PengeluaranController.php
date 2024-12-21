<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\RiwayatPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    public function showPengeluaran(Request $request)
    {
        $jumlah = $request->input('jumlah', 5);
        $pengeluaran = Pengeluaran::paginate($jumlah);

        if ($request->ajax()) {
            return view('components.table-pengeluaran', compact('pengeluaran'))->render();
        }

        return view('pengeluaran', [
            'title' => 'Pengeluaran',
            'pengeluaran' => $pengeluaran
        ]);
    }

    public function filterPengeluaran(Request $request)
    {
        $query = Pengeluaran::query();

        if ($request->has('search') && $request->search !== '') {
            $query->where('jumlah_pengeluaran', 'like', '%' . $request->search . '%')
                ->orWhere('keterangan', 'like', '%' . $request->search . '%')
                ->orWhere('tanggal_pengeluaran', 'like', '%' . $request->search . '%');
        }

        $pengeluaran = $query->get();

        if ($request->ajax()) {
            return view('components.table-pengeluaran', compact('pengeluaran'))->render();
        }

        return view('pengeluaran', [
            'pengeluaran' => $pengeluaran,
            'title' => 'Pengeluaran'
        ]);
    }

    public function storePengeluaran(Request $request)
    {
        // Validasi input
        $request->validate([
            'jumlah_pengeluaran' => 'required|numeric|min:1|max:1000000',
            'keterangan' => 'required|string',
        ]);

        try {
            // Simpan pengeluaran sesuai user yang sedang login
            Pengeluaran::create([
                'id_user' => Auth::id(), // Mendapatkan ID pengguna yang sedang login
                'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
                'keterangan' => $request->keterangan,
                'tanggal_pengeluaran' => now(), // Mengisi tanggal_pengeluaran dengan waktu saat ini
            ]);

            // Simpan riwayat ke tabel 'riwayat_pengeluaran'
            RiwayatPengeluaran::create([
                'id_user' => Auth::id(), // ID pengguna yang sama
                'aksi' => "menambahkan pengeluaran: {$request->keterangan} dengan biaya Rp" . number_format($request->jumlah_pengeluaran, 0, ',', '.'),
                'tanggal' => now(), // Waktu saat ini
            ]);

            return response()->json(['success' => 'Pengeluaran berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function updatePengeluaran(Request $request, $id)
    {
        $request->validate([
            'jumlah_pengeluaran' => 'required|numeric',
            'keterangan' => 'required|string|max:255',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        $pengeluaran->update([
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'keterangan' => $request->keterangan,
        ]);
        return response()->json(['message' => 'Data pengeluaran berhasil diperbarui.']);
    }


    public function destroyPengeluaran($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        return response()->json(['message' => 'Pengeluaran berhasil dihapus.']);
    }
}
