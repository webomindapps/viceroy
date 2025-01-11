<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{

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

        if ($request->has('vipdetails') && $request->input('vipdetails') === '1') {
            $registrations->whereNotNull('vipdetails')->where('vipdetails', '!=', '');
        }

        $registrations = $registrations->orderBy('created_at', 'desc')->limit(5)->get();

        if ($request->ajax()) {
            return response()->json($registrations);
        }

        return view('welcome', compact('nationalities', 'registrations'));
    }


    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'nationality' => 'required|string|max:255',
        
        ]);

        $guest = Registration::create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'dob' => $request->dob,
            'address' => $request->address,
            'arrivingfrom' => $request->arrivingfrom,
            'datetime' => $request->datetime,
            'purposeofvisit' =>$request->purposeofvisit,
            'depaturedate' => $request->depaturedate,
            'proceedingto' => $request->proceedingto,
            'email' => $request->email,
            'phone' => $validated['phone'],
            'nationality' => $validated['nationality'],
            'passportno'=>$request->passportno,
            'dateofissue'=>$request->dateofissue,
            'placeofissue'=>$request->placeofissue,
            'dateofexpiry'=>$request->dateofexpiry,
            'dateofarrival'=>$request->dateofarrival,
            'visano'=>$request->visano,
            'placeofvisaissue'=>$request->placeofvisaissue,
            'durationofstay'=>$request->durationofstay,
            'dateofvisaissue'=>$request->dateofvisaissue,
            'dateofvisaexpiry'=>$request->dateofvisaexpiry,
            'employeed'=>$request->employeed,
            'roomno' => $request->roomno,
            'packno' => $request->packno,
            'mealplan' => $request->mealplan,
        ]);

        if ($request->hasFile('image_url')) {
            foreach ($request->file('image_url') as $file) {
                Document::create([
                    'guest_id' => $guest->id,
                    'image_url' => $file->store('guest_images', 'public'),
                ]);
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

        return redirect('/')->with('success', 'Guest registration successful!');
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
        $guest = Registration::with('documents')->findOrFail($id);
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
            'purposeofvisit' =>$request->purposeofvisit,
            'depaturedate' => $request->depaturedate,
            'proceedingto' => $request->proceedingto,
            'email' => $request->email,
            'phone' => $validated['phone'],
            'nationality' => $validated['nationality'],
            'roomno' => $request->roomno,
            'packno' => $request->packno,
            'mealplan' => $request->mealplan,
            'passportno'=>$request->passportno,
            'dateofissue'=>$request->dateofissue,
            'placeofissue'=>$request->placeofissue,
            'dateofexpiry'=>$request->dateofexpiry,
            'dateofarrival'=>$request->dateofarrival,
            'visano'=>$request->visano,
            'placeofvisaissue'=>$request->placeofvisaissue,
            'durationofstay'=>$request->durationofstay,
            'employeed'=>$request->employeed,
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

        return redirect('/')->with('success', 'Guest details updated successfully!');
    }
    public function deleteDocument($id)
    {
        $document = Document::findOrFail($id);

        Storage::delete('public/' . $document->image_url);

        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}
