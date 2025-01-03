<?php

namespace App\Observers;


use App\Models\UangKas;
use App\Models\BulanPembayaran;
use App\Models\Siswa;

class SiswaObserver
{
    /**
     * Handle the Siswa "created" event.
     */

    public function created(Siswa $siswa)
    {
        $bulanPembayaran = BulanPembayaran::all();

        foreach ($bulanPembayaran as $bulan) {
            $existingUangKas = UangKas::where('id_siswa', $siswa->id)
                ->where('id_bulan_pembayaran', $bulan->id)
                ->first();

            // Jika belum ada, baru buat data UangKas
            if (!$existingUangKas) {
                UangKas::create([
                    'id_siswa' => $siswa->id,
                    'id_bulan_pembayaran' => $bulan->id,
                    'minggu_ke_1' => 0,
                    'minggu_ke_2' => 0,
                    'minggu_ke_3' => 0,
                    'minggu_ke_4' => 0,
                    'status_lunas' => 0,
                ]);
            } else {
                // Jika entri sudah ada, perbarui jika perlu
                $existingUangKas->update([
                    'minggu_ke_1' => 0,
                    'minggu_ke_2' => 0,
                    'minggu_ke_3' => 0,
                    'minggu_ke_4' => 0,
                ]);
            }
        }
    }


    /**
     * Handle the Siswa "updated" event.
     */
    public function updated(Siswa $siswa): void
    {
        //
    }

    /**
     * Handle the Siswa "deleted" event.
     */
    public function deleted(Siswa $siswa): void
    {
        //
    }

    /**
     * Handle the Siswa "restored" event.
     */
    public function restored(Siswa $siswa): void
    {
        //
    }

    /**
     * Handle the Siswa "force deleted" event.
     */
    public function forceDeleted(Siswa $siswa): void
    {
        //
    }
}
