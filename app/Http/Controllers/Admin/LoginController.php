<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\GuestExport;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class LoginController extends Controller
{

    public function index()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return to_route('admin.dashboard')->with('success', 'You have successfully logged in.');
        }
        return back()->with('error', 'We did not find any admin with these credentials.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    public function dashboard(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        $nationalities = DB::table('nationalities')->get();

        if ($from_date && $to_date) {
            $guests = Registration::whereBetween('created_at', [$from_date . ' 00:00:00', $to_date . ' 23:59:59'])
                ->latest()
                ->paginate(20);
        } else {
            $guests = Registration::latest()->paginate(20);
        }

        return view('admin.dashboard', compact('guests', 'from_date', 'to_date'));
    }



    public function exports(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $query = Registration::query();

        if ($from_date && $to_date) {
            $query->whereBetween('created_at', [
                $from_date . ' 00:00:00',
                $to_date . ' 23:59:59'
            ]);
        }

        $customers = $query->get();

        return Excel::download(new GuestExport($customers), 'guests.xlsx');
    }

    public function getdetails($id)
    {
        $guest = Registration::with('documents')->findOrFail($id);

        return view('admin.guestdetails', compact('guest'));
    }

    public function editguests($id)
    {
        $guest = Registration::with('documents')->findOrFail($id);
        return view('admin.edit-guests', compact('guest'));
    }
    public function updateguests(Request $request, $id)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'arrivingfrom' => 'required|string|max:255',
            'datetime' => 'required|date',
            'purposeofvisit' => 'required|string|max:255',
            'depaturedate' => 'required|date',
            'proceedingto' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'nationality' => 'required|string|max:255',
            'image_url.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'signature_image_url' => 'nullable',
            'vipdetails' => 'nullable|string',
        ]);

        $guest = Registration::findOrFail($id);

        $guest->update([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'dob' => $validated['dob'],
            'address' => $validated['address'],
            'arrivingfrom' => $validated['arrivingfrom'],
            'datetime' => $validated['datetime'],
            'purposeofvisit' => $validated['purposeofvisit'],
            'depaturedate' => $validated['depaturedate'],
            'proceedingto' => $validated['proceedingto'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'nationality' => $validated['nationality'],
            'roomno' => $request->roomno,
            'packno' => $request->packno,
            'mealplan' => $request->mealplan,
            'passportno' => $request->passportno,
            'dateofissue' => $request->dateofissue,
            'placeofissue' => $request->placeofissue,
            'dateofexpiry' => $request->dateofexpiry,
            'dateofarrival' => $request->dateofarrival,
            'visano' => $request->visano,
            'placeofvisaissue' => $request->placeofvisaissue,
            'durationofstay' => $request->durationofstay,
            'employeed' => $request->employeed,
            'isvip' => $request->has('isvip') ? 1 : 0,


        ]);

        if ($request->hasFile('image_url')) {
            foreach ($request->file('image_url') as $file) {
                $filePath = $file->store('guest_images', 'public');
                Document::create([
                    'guest_id' => $guest->id,
                    'image_url' => $filePath,
                ]);
            }
        }

        if ($request->filled('vipdetails')) {
            if ($guest->vipdetails) {
                Storage::disk('public')->delete($guest->vipdetails);
            }

            $imageData = $request->input('vipdetails');
            $fileName = 'vip_signature_' . time() . '.png';
            $filePath = 'vip_signatures/' . $fileName;

            Storage::disk('public')->put($filePath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData)));

            $guest->update([
                'vipdetails' => $filePath,
            ]);
        }


        return redirect()->route('admin.dashboard')->with('success', 'Guest details updated successfully!');
    }
    public function deleteDocument($id)
    {
        $document = Document::findOrFail($id);

        Storage::delete('public/' . $document->image_url);

        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

    public function deleteguests($id)
    {
        $guest = Registration::findOrFail($id);
        $guest->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Guest Deleted Sucessfully');
    }
    public function filterGuests(Request $request)
    {

        $days = $request->input('days');
        $nationality = $request->input('nationality');
        $isvip = $request->input('isvip') === '1';

        $query = Registration::query();

        if (!is_null($days)) {
            $startDate = now()->subDays($days);
            $query->where('created_at', '>=', $startDate);
        }

        if ($nationality === 'Foreigner') {
            $query->where('nationality', '!=', 'India');
        } elseif ($nationality && $nationality !== 'All') {
            $query->where('nationality', $nationality);
        }

        if ($isvip) {

            $query->whereNotNull('isvip')->where('isvip', '!=', '');
        }

        $guests = $query->latest()->get();

        return response()->json($guests);
    }
    public function downloadpdf($id)
    {
        $guests = Registration::with('documents')->find($id);

        $pdf = Pdf::loadView('admin.pdf', [
            'guests' => $guests,
        ]);

        return $pdf->stream('Guests.pdf');
    }
}
