<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Tambahkan ini
use App\Models\LaporanProyekDetails;
use App\Models\LaporanPajakDetails;
use App\Models\LaporanAkuntansiDetails;
use App\Models\LaporanKeuanganDetails;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout.sidebar', function ($view) {
            $jumlahDitolakKeuangan = LaporanKeuanganDetails::where('status', 2)->count();
            $jumlahDitolakAkuntansi = LaporanAkuntansiDetails::where('status', 2)->count();
            $jumlahDitolakPajak = LaporanPajakDetails::where('status', 2)->count();
            $jumlahDitolakProyek = LaporanProyekDetails::where('status', 2)->count();
            $jumlahBelumDiverifikasiKeuangan = LaporanKeuanganDetails::where('status', 0)->count();
            $adaDokumenBelumDiverifikasiKeuangan = $jumlahBelumDiverifikasiKeuangan >= 1;
            $jumlahBelumDiverifikasiAkuntansi = LaporanAkuntansiDetails::where('status', 0)->count();
            $adaDokumenBelumDiverifikasiAkuntansi = $jumlahBelumDiverifikasiAkuntansi >= 1;
            $jumlahBelumDiverifikasiPajak = LaporanPajakDetails::where('status', 0)->count();
            $adaDokumenBelumDiverifikasiPajak = $jumlahBelumDiverifikasiPajak >= 1;
            $jumlahBelumDiverifikasiProyek = LaporanProyekDetails::where('status', 0)->count();
            $adaDokumenBelumDiverifikasiProyek = $jumlahBelumDiverifikasiProyek >= 1;

            $view->with([
                'jumlahDitolakKeuangan' => $jumlahDitolakKeuangan,
                'jumlahDitolakAkuntansi' => $jumlahDitolakAkuntansi,
                'jumlahDitolakPajak' => $jumlahDitolakPajak,
                'jumlahDitolakProyek' => $jumlahDitolakProyek,
                'jumlahBelumDiverifikasiKeuangan' => $jumlahBelumDiverifikasiKeuangan,
                'adaDokumenBelumDiverifikasiKeuangan' => $adaDokumenBelumDiverifikasiKeuangan,
                'jumlahBelumDiverifikasiAkuntansi' => $jumlahBelumDiverifikasiAkuntansi,
                'adaDokumenBelumDiverifikasiAkuntansi' => $adaDokumenBelumDiverifikasiAkuntansi,
                'jumlahBelumDiverifikasiPajak' => $jumlahBelumDiverifikasiPajak,
                'adaDokumenBelumDiverifikasiPajak' => $adaDokumenBelumDiverifikasiPajak,
                'jumlahBelumDiverifikasiProyek' => $jumlahBelumDiverifikasiProyek,
                'adaDokumenBelumDiverifikasiProyek' => $adaDokumenBelumDiverifikasiProyek,
            ]);
        });
    }
}
