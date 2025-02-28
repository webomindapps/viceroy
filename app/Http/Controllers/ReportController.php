<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Foreigners;
use Illuminate\Http\Request;
use App\Models\Registration;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;
use ZipArchive;
use Storage;


class ReportController extends Controller
{
    public function getreports()
    {
        return view('admin.reports');
    }


    public function generateForeignerReports(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        $foreigners = Foreigners::with('guest')
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->get();

        if ($foreigners->isEmpty()) {
            return redirect()->back()->with('error', 'No foreigner guests found in the selected date range.');
        }

        $zipFileName = 'foreigner_reports_' . now()->timestamp . '.zip';
        $zipPath = storage_path('app/' . $zipFileName);

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            foreach ($foreigners as $guest) { // Note: changed $guests to $guest for singular reference
                $pdf = FacadePdf::loadView('admin.pdfb', ['guests' => $guest]); // Ensure 'guests' matches the variable used in the Blade view
                $pdfPath = storage_path('app/temp/form_b_' . $guest->id . '.pdf');
                if (!file_exists(storage_path('app/temp'))) {
                    mkdir(storage_path('app/temp'), 0755, true);
                }

                $pdf->save($pdfPath);
                $zip->addFile($pdfPath, 'Form_B_' . $guest->id . '.pdf');
            }

            $zip->close();

            foreach ($foreigners as $guests) {
                unlink(storage_path('app/temp/form_b_' . $guests->id . '.pdf'));
            }

            return response()->download($zipPath)->deleteFileAfterSend(true);
        } else {
            return redirect()->back()->with('error', 'Failed to generate the zip file.');
        }
    }
}
