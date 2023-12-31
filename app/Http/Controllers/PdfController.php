<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;
use PDF;

class PdfController extends Controller
{

    // public function view_pdf(Request $request)
    // {
    //     $pdf = PDF::loadHtml('<h1>Coba Testing File</h1>');

    //     return $pdf->stream();
    // }

    public function bukti_pendaftaran_pdf(Pendaftaran $id)
    {
        $pendaftar = Pendaftaran::find($id);


        $imagePath = public_path('user/img/yyy.png');

        $pdf = PDF::loadView('pdf.bukti_pembayaran', compact('pendaftar', 'imagePath'));

        return $pdf->stream();
    }


    // public function laporan_keuangan($range)
    // {
    //     $currentDate = now();

    //     if ($range === 'week') {
    //         $startDate = $currentDate->startOfWeek()->format('Y-m-d H:i:s');
    //         $endDate = $currentDate->endOfWeek()->format('Y-m-d H:i:s');
    //         $orders = Order::whereBetween('return_date', [$startDate, $endDate])->get();
    //     } elseif ($range === 'month') {
    //         $startDate = $currentDate->startOfMonth()->format('Y-m-d H:i:s');
    //         $endDate = $currentDate->endOfMonth()->format('Y-m-d H:i:s');
    //         $orders = Order::whereBetween('return_date', [$startDate, $endDate])->get();
    //     } elseif ($range === 'year') {
    //         $startDate = $currentDate->startOfYear()->format('Y-m-d H:i:s');
    //         $endDate = $currentDate->endOfYear()->format('Y-m-d H:i:s');
    //         $orders = Order::whereBetween('return_date', [$startDate, $endDate])->get();
    //     }

    //     $imagePath = public_path('user/img/logo1_green.png');

    //     $pdf = PDF::loadView('pdf.laporan_keuangan', compact('orders', 'imagePath'));

    //     return $pdf->stream();
    // }
}
