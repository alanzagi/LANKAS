<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\RiwayatPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        // Simpan pengeluaran sesuai user yang sedang login
        Pengeluaran::create([
            'id_user' => Auth::id(), // Mendapatkan ID pengguna yang sedang login
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'keterangan' => $request->keterangan,
            'tanggal_pengeluaran' => Carbon::now()->locale('id')->translatedFormat('d F Y'),
        ]);

        // Simpan riwayat ke tabel 'riwayat_pengeluaran'
        RiwayatPengeluaran::create([
            'id_user' => Auth::id(), // ID pengguna yang sama
            'aksi' => "Menambahkan pengeluaran: '{$request->keterangan}' dengan biaya Rp" . number_format($request->jumlah_pengeluaran, 0, ',', '.'),
            'tanggal' => Carbon::now()->locale('id')->translatedFormat('d F Y'),
        ]);

        return response()->json(['success' => 'Pengeluaran berhasil ditambahkan']);
    }

    public function updatePengeluaran(Request $request, $id)
    {
        $request->validate([
            'jumlah_pengeluaran' => 'required|numeric|min:1|max:1000000',
            'keterangan' => 'required|string|max:255',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);
        $jumlah_pengeluaran_lama = $pengeluaran->jumlah_pengeluaran;
        $keterangan_lama = $pengeluaran->keterangan;

        $pengeluaran->update([
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'keterangan' => $request->keterangan,
        ]);

        RiwayatPengeluaran::create([
            'id_user' => Auth::id(), // ID pengguna yang sedang login
            'aksi' => "Mengubah pengeluaran '{$keterangan_lama}' dari Rp. " . number_format($jumlah_pengeluaran_lama) .
                " menjadi '{$request->keterangan}' dengan biaya Rp. " . number_format($request->jumlah_pengeluaran),
        ]);

        return response()->json(['message' => 'Data pengeluaran berhasil diperbarui.']);
    }

    public function destroyPengeluaran($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        // Simpan detail pengeluaran sebelum dihapus
        $jumlah_pengeluaran = $pengeluaran->jumlah_pengeluaran;
        $keterangan = $pengeluaran->keterangan;

        // Hapus pengeluaran
        $pengeluaran->delete();

        // Tambahkan ke tabel riwayat (asumsi tabel `riwayat_pengeluaran` ada)
        RiwayatPengeluaran::create([
            'id_user' => Auth::id(), // ID pengguna yang sedang login
            'aksi' => "Menghapus pengeluaran '{$keterangan}' dengan biaya Rp. " . number_format($jumlah_pengeluaran),
        ]);

        return response()->json(['message' => 'Pengeluaran berhasil dihapus.']);
    }
}
