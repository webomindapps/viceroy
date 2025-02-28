<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Document;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Foreigners;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('components.admin.staff_login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return to_route('welcome');
        }
        return back()->with('danger', 'Invalid Credentials');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('staff_login');
    }
    public function welcome(Request $request)
    {
        $nationalities = DB::table('nationalities')->distinct()->get();
        $registrations = DB::table('guest_registration');

        if ($request->has('days')) {
            $days = $request->input('days');
            $date = Carbon::today()->subDays($days);
            $registrations->where('created_at', '>=', $date);
        }

        if ($request->has('nationality')) {
            $nationality = $request->input('nationality');

            if ($nationality === 'India') {
                $registrations->where('nationality', '=', 'India');
            }

            if ($nationality === 'Foreigner') {
                $registrations->where('nationality', '!=', 'India');
            }
        }

        if ($request->has('isvip') && $request->input('isvip') === '1') {
            $registrations->whereNotNull('isvip')->where('isvip', '!=', '');
        }

        $registrations = $registrations->orderBy('created_at', 'desc')->limit(5)->get();

        if ($request->ajax()) {
            return response()->json($registrations);
        }

        return view('welcome', compact('nationalities', 'registrations'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'nationality' => 'required|string|max:255',

        ]);
        $lastGuest = Registration::latest()->first();
        if ($lastGuest && preg_match('/GRC(\d+)/', $lastGuest->grc_id, $matches)) {
            $newNumber = intval($matches[1]) + 1;
        } else {
            $newNumber = 1;
        }
        $grc_id = 'GRC' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
      
        $guest = Registration::create([
            'grc_id' => $grc_id,
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'dob' => $request->dob,
            'address' => $request->address,
            'arrivingfrom' => $request->arrivingfrom,
            'datetime' => $request->datetime,
            'purposeofvisit' => $request->purposeofvisit,
            'depaturedate' => $request->depaturedate,
            'proceedingto' => $request->proceedingto,
            'email' => $request->email,
            'phone' => $validated['phone'],
            'nationality' => $validated['nationality'],
            'notes_text' => $request->notes_text,
            'roomno' => $request->roomno,
            'packno' => $request->packno,
            'mealplan' => $request->mealplan,
            'isvip' => $request->has('isvip') ? 1 : 0,

        ]);

        if ($request->hasFile('image_url')) {
            foreach ($request->file('image_url') as $file) {
                Document::create([
                    'guest_id' => $guest->id,
                    'image_url' => $file->store('guest_images', 'public'),
                ]);
            }
        }

        if ($request->nationality !== 'Indian' && $request->filled('passportno')) {
            foreach ($request->passportno as $key => $passportno) {
                if (!empty($passportno) || !empty($request->visano[$key])) {
                    Foreigners::create([
                        'guest_id' => $guest->id,
                        'passportno' => $passportno,
                        'dateofissue' => $request->dateofissue[$key] ?? null,
                        'placeofissue' => $request->placeofissue[$key] ?? null,
                        'dateofexpiry' => $request->dateofexpiry[$key] ?? null,
                        'dateofarrival' => $request->dateofarrival[$key] ?? null,
                        'visano' => $request->visano[$key] ?? null,
                        'placeofvisaissue' => $request->placeofvisaissue[$key] ?? null,
                        'durationofstay' => $request->durationofstay[$key] ?? null,
                        'dateofvisaissue' => $request->dateofvisaissue[$key] ?? null,
                        'dateofvisaexpiry' => $request->dateofvisaexpiry[$key] ?? null,
                        'employeed' => $request->employeed[$key] ?? null,
                        'guest_name' => $request->guest_name[$key] ?? null,
                        'guest_phone' => $request->guest_phone[$key] ?? null,
                    ]);
                }
            }
        }



        if ($request->filled('vipdetails')) {
            $vipSignature = $request->vipdetails;
            $vipSignaturePath = $this->storeVipSignature($vipSignature);

            $guest->update([
                'vipdetails' => $vipSignaturePath,
            ]);
        }

        if ($request->filled('signature_image_url')) {
            $signatureData = $request->signature_image_url;
            $signaturePath = $this->storeSignature($signatureData);

            $guest->update([
                'signature_image_url' => $signaturePath,
            ]);
        }
        if ($request->filled('manager_signature_image_url')) {
            $managersignatureData = $request->manager_signature_image_url;
            $managersignaturePath = $this->managerstoreSignature($managersignatureData);

            $guest->update([
                'manager_signature_image_url' => $managersignaturePath,
            ]);
        }

        return redirect('welcome')->with('success', 'Guest registration successful!');
    }

    private function storeVipSignature($base64Image)
    {
        $image = str_replace('data:image/png;base64,', '', $base64Image);
        $image = str_replace(' ', '+', $image);
        $imageData = base64_decode($image);

        $fileName = 'vip_signature_' . time() . '.png';
        $filePath = 'vip_signatures/' . $fileName;

        Storage::disk('public')->put($filePath, $imageData);

        return $filePath;
    }

    private function storeSignature($base64Image)
    {
        $image = str_replace('data:image/png;base64,', '', $base64Image);
        $image = str_replace(' ', '+', $image);
        $imageData = base64_decode($image);

        $fileName = 'signature_' . time() . '.png';
        $filePath = 'signatures/' . $fileName;

        Storage::disk('public')->put($filePath, $imageData);

        return $filePath;
    }
    private function managerstoreSignature($base64Image)
    {
        $image = str_replace('data:image/png;base64,', '', $base64Image);
        $image = str_replace(' ', '+', $image);
        $imageData = base64_decode($image);

        $fileName = 'manager_signature_' . time() . '.png';
        $filePath = 'manager_signatures/' . $fileName;

        Storage::disk('public')->put($filePath, $imageData);

        return $filePath;
    }
    public function getGuestDetails($id)
    {
        $guest = DB::table('guest_registration')->where('id', $id)->first();

        if (!$guest) {
            return response()->json(['error' => 'Guest not found'], 404);
        }

        return response()->json($guest);
    }

    public function editguests($id)
    {
        $guest = Registration::with('documents', 'foreigners')->findOrFail($id);

        return view('guest-edit', compact('guest'));
    }
    public function updateguests(Request $request, $id)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'nationality' => 'required|string|max:255',
        ]);

        $guest = Registration::findOrFail($id);

        $guest->update([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'dob' => $request->dob,
            'address' => $request->address,
            'arrivingfrom' => $request->arrivingfrom,
            'datetime' => $request->datetime,
            'purposeofvisit' => $request->purposeofvisit,
            'depaturedate' => $request->depaturedate,
            'proceedingto' => $request->proceedingto,
            'notes_text' => $request->notes_text,
            'email' => $request->email,
            'phone' => $validated['phone'],
            'nationality' => $validated['nationality'],
            'roomno' => $request->roomno,
            'packno' => $request->packno,
            'mealplan' => $request->mealplan,
            'isvip' => $request->has('isvip') ? 1 : 0,
        ]);

        // Foreigners Data Handling
        if ($request->nationality !== 'Indian' && $request->filled('passportno')) {
            foreach ($request->passportno as $key => $passportno) {
                $foreigner = Foreigners::where('guest_id', $guest->id)->skip($key)->first();

                if ($foreigner) {
                    // If record exists, update it
                    $foreigner->update([
                        'passportno' => $passportno,
                        'dateofissue' => $request->dateofissue[$key],
                        'placeofissue' => $request->placeofissue[$key],
                        'dateofexpiry' => $request->dateofexpiry[$key],
                        'dateofarrival' => $request->dateofarrival[$key],
                        'visano' => $request->visano[$key],
                        'placeofvisaissue' => $request->placeofvisaissue[$key],
                        'durationofstay' => $request->durationofstay[$key],
                        'employeed' => $request->employeed[$key],
                        'guest_name' => $request->guest_name[$key],
                        'guest_phone' => $request->guest_phone[$key],
                    ]);
                } else {
                    // If no record exists, create a new one
                    Foreigners::create([
                        'guest_id' => $guest->id,
                        'passportno' => $passportno,
                        'dateofissue' => $request->dateofissue[$key],
                        'placeofissue' => $request->placeofissue[$key],
                        'dateofexpiry' => $request->dateofexpiry[$key],
                        'dateofarrival' => $request->dateofarrival[$key],
                        'visano' => $request->visano[$key],
                        'placeofvisaissue' => $request->placeofvisaissue[$key],
                        'durationofstay' => $request->durationofstay[$key],
                        'employeed' => $request->employeed[$key],
                        'guest_name' => $request->guest_name[$key],
                        'guest_phone' => $request->guest_phone[$key],
                    ]);
                }
            }
        }


        // Image Upload Handling
        if ($request->hasFile('image_url') && is_array($request->file('image_url'))) {
            foreach ($request->file('image_url') as $file) {
                $filePath = $file->store('guest_images', 'public');
                Document::create([
                    'guest_id' => $guest->id,
                    'image_url' => $filePath,
                ]);
            }
        }

        // VIP Signature Handling
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

        return redirect()->route('welcome')->with('success', 'Guest details updated successfully!');
    }
    public function deleteDocument($id)
    {
        $document = Document::findOrFail($id);

        Storage::delete('public/' . $document->image_url);

        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}
