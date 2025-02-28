<x-app-layout>

    <main>
        <div class="container-fluid mt-4">
            <h3>Edit Guest Details</h3>
            <form action="{{ route('guest.edit', $guest->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            value="{{ old('firstname', $guest->firstname) }}" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                            value="{{ old('lastname', $guest->lastname) }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob"
                            value="{{ old('dob', $guest->dob) }}" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('address', $guest->address) }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="arrivingfrom" class="form-label">Arriving From</label>
                        <input type="text" class="form-control" id="arrivingfrom" name="arrivingfrom"
                            value="{{ old('arrivingfrom', $guest->arrivingfrom) }}" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="datetime" class="form-label">Arrival Date & Time</label>
                        <input type="datetime-local" class="form-control" id="datetime" name="datetime"
                            value="{{ old('datetime', \Carbon\Carbon::parse($guest->datetime)->format('Y-m-d\TH:i')) }}"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="purposeofvisit" class="form-label">Purpose of Visit</label>
                        <input type="text" class="form-control" id="purposeofvisit" name="purposeofvisit"
                            value="{{ old('purposeofvisit', $guest->purposeofvisit) }}" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="depaturedate" class="form-label">Departure Date</label>
                        <input type="date" class="form-control" id="depaturedate" name="depaturedate"
                            value="{{ old('depaturedate', $guest->depaturedate) }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="proceedingto" class="form-label">Proceeding To</label>
                        <input type="text" class="form-control" id="proceedingto" name="proceedingto"
                            value="{{ old('proceedingto', $guest->proceedingto) }}" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $guest->email) }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="{{ old('phone', $guest->phone) }}" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" class="form-control" id="nationality" name="nationality"
                            value="{{ old('nationality', $guest->nationality) }}" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="roomno" class="form-label">Room No</label>
                        <input type="number" class="form-control" id="roomno" name="roomno"
                            value="{{ old('roomno', $guest->roomno) }}" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="packno" class="form-label">Number Of Packages</label>
                        <input type="number" class="form-control" id="packno" name="packno"
                            value="{{ old('packno', $guest->packno) }}" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="mealplan" class="form-label">MealPlan</label>
                        <select name="mealplan" class="form-control" id="mealplan" autocomplete="off">
                            <option value="" disabled {{ !$guest->mealplan ? 'selected' : '' }}>Select Meal Plan
                            </option>
                            <option value="CP" {{ $guest->mealplan == 'CP' ? 'selected' : '' }}>CP</option>
                            <option value="AP" {{ $guest->mealplan == 'AP' ? 'selected' : '' }}>AP</option>
                            <option value="MAP" {{ $guest->mealplan == 'MAP' ? 'selected' : '' }}>MAP</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <input type="checkbox" id="isvip" name="isvip" value="1"
                            {{ old('isvip', $guest->isvip) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="isvip">
                            Is VIP
                        </label>
                    </div>

                    @if ($guest->nationality != 'India')
                            <!--foreigner details-->
                            <div class="section-title p-2 fw-semibold fs-5 bg-light mb-3">
                                <span>Foreigner Details</span>
                            </div>
                            <div class="text-end">
                                <button type="button" id="addMore" class="btn btn-primary">Add Person</button>
                            </div>

                            <div id="additionalFieldsContainer">
                                @foreach ($guest->foreigners as $foreign)
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="guest_name" class="form-label">Name</label>
                                            <input type="text" class="form-control guest_name" name="guest_name[]"
                                                value="{{ old('guest_name', $foreign->guest_name) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="guest_phone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control guest_phone"
                                                name="guest_phone[]"
                                                value="{{ old('guest_phone', $foreign->guest_phone) }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="passportno" class="form-label">Passport No</label>
                                            <input type="text" class="form-control passportno" name="passportno[]"
                                                value="{{ old('passportno', $foreign->passportno) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dateofissue" class="form-label">Date Of Issue</label>
                                            <input type="date" class="form-control dateofissue"
                                                name="dateofissue[]"
                                                value="{{ old('dateofissue', $foreign->dateofissue) }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="placeofissue" class="form-label">Place Of Issue</label>
                                            <input type="text" class="form-control placeofissue"
                                                name="placeofissue[]"
                                                value="{{ old('placeofissue', $foreign->placeofissue) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dateofexpiry" class="form-label">Date Of Expiry</label>
                                            <input type="date" class="form-control dateofexpiry"
                                                name="dateofexpiry[]"
                                                value="{{ old('dateofexpiry', $foreign->dateofexpiry) }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="dateofarrival" class="form-label">Date Of Arrival</label>
                                            <input type="date" class="form-control dateofarrival"
                                                name="dateofarrival[]"
                                                value="{{ old('dateofarrival', $foreign->dateofarrival) }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="visano" class="form-label">Visa No</label>
                                            <input type="text" class="form-control visano" name="visano[]"
                                                value="{{ old('visano', $foreign->visano) }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="placeofvisaissue" class="form-label">Place Of Visa
                                                Issue</label>
                                            <input type="text" class="form-control placeofvisaissue"
                                                name="placeofvisaissue[]"
                                                value="{{ old('placeofvisaissue', $foreign->placeofvisaissue) }}"
                                                required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="durationofstay" class="form-label">Duration Of
                                                Stay</label>
                                            <input type="text" class="form-control durationofstay"
                                                name="durationofstay[]"
                                                value="{{ old('durationofstay', $foreign->durationofstay) }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="employeed" class="form-label">Employed In India?</label>
                                        <select name="employeed[]" class="form-control employeed">
                                            <option value="" disabled
                                                {{ is_null($foreign->employeed) ? 'selected' : '' }}>Select
                                                Employment Status</option>
                                            <option value="yes"
                                                {{ $foreign->employeed == 'yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="no"
                                                {{ $foreign->employeed == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                        @endif


                        <!-- Hidden template for cloning -->
                        <div id="additionalFieldsTemplate" class="additionalFields" style="display: none;">
                            <h5 class="mt-3" style="color:black;">Add Person</h5>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control " name="guest_name[]">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control " name="guest_phone[]">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Passport No</label>
                                    <input type="text" class="form-control " name="passportno[]">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Date Of Issue</label>
                                    <input type="date" class="form-control " name="dateofissue[]">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Place Of Issue</label>
                                    <input type="text" class="form-control " name="placeofissue[]">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Date Of Expiry</label>
                                    <input type="date" class="form-control " name="dateofexpiry[]">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Date Of Arrival</label>
                                    <input type="date" class="form-control " name="dateofarrival[]">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Visa No</label>
                                    <input type="text" class="form-control " name="visano[]">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Place Of Visa Issue</label>
                                    <input type="text" class="form-control " name="placeofvisaissue[]">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Duration Of Stay</label>
                                    <input type="text" class="form-control " name="durationofstay[]">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Employed In India?</label>
                                <select name="employeed[]" class="form-control ">
                                    <option value="" selected>Select Employment Status</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>

                    <div class="section-title p-2 fw-semibold fs-5 bg-light">
                        <span>Documents</span>
                    </div>
                    <!-- Document Upload -->
                    <div class="mb-3">
                        <label for="document-upload" class="form-label">Upload Document</label>
                        <input type="file" name="image_url[]" id="document-upload" class="form-control" multiple>
                    </div>
                    <div class="row">
                        @foreach ($guest->documents as $document)
                            <div class="col-md-3  mt-4 mb-3 position-relative">
                                <!-- Add position-relative to the container -->
                                <img src="{{ asset($document->image_url) }}" alt="Document Image" class="img-fluid"
                                    width="150">
                                <a onclick="return confirm('Are you sure you want to delete this?')"
                                    href="{{ route('guest.document.delete', $document->id) }}"
                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1">
                                    <i class='bx bxs-trash text-white'></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="mb-3">
                    <div id="signature-pad" class="signature-pad">
                        <canvas id="vipdetails-canvas" class="border" width="400" height="200"></canvas>
                    </div>
                    <button type="button" id="saveVipDetails" class="btn btn-primary mt-2">Save
                        Vip details</button>
                    <button type="button" class="btn btn-secondary mt-2" onclick="clearCanvas()">Clear</button>
                    <input type="hidden" name="vipdetails" id="vipdetails">
                    <img id="vipSignatureImage"
                        src="{{ $guest->vipdetails ? asset('storage/' . $guest->vipdetails) : '' }}"
                        alt="VIP Signature" class="img-fluid mt-3"
                        style="display: {{ $guest->vipdetails ? 'block' : 'none' }};" width="400">
                    <button type="button" id="removeFile" class="btn btn-danger mt-2"
                        style="display: none;">Remove</button>
                </div> --}}
                    <div class="SigPad mb-4">
                        {{-- <div class="sig sigWrapper">
                            <canvas class="pad border border-dark rounded" width="500" height="250"></canvas>
                            <div class="mb-4">
                                <button type="button" id="saveVipDetails" class="btn btn-primary">Save VIP
                                    Details</button>
                                <button type="button" id="clearCanvas" class="btn btn-secondary">Clear</button>
                            </div>
                            <input type="hidden" name="vipdetails" id="vipdetails">

                        </div> --}}
                    </div>
                    <div class="mt-4 text-center">
                        <h5 class="text-start">Guest Notes</h5>
                        {{-- <img id="vipSignatureImage"
                            src="{{ $guest->vipdetails ? asset( $guest->vipdetails) : '' }}"
                            alt="VIP Signature" class="img-fluid border rounded"
                            style="display: {{ $guest->vipdetails ? 'block' : 'none' }}; max-width: 100%; height: auto;">
                        <button type="button" id="removeFile" class="btn btn-danger mt-2"
                            style="display: none;">Remove</button> --}}
                        <textarea class="form-control" name="notes_text" rows="4"> {{ $guest->notes_text }}</textarea>

                    </div>
                    <div class="col lg-4 mt-4">
                        <button type="submit" class="btn btn-primary">Update Guest</button>
                    </div>
            </form>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#addMore").click(function() {
                let newFields = $("#additionalFieldsTemplate").clone().removeAttr('id').show();
                newFields.find("input").val(""); // Clear all input fields
                newFields.find("select").prop("selectedIndex", 0); // Reset select fields
                $("#additionalFieldsContainer").append(newFields);
            });
    
            $("form").submit(function() {
                // Remove hidden template to avoid null values
                $("#additionalFieldsTemplate").remove();
    
                // Remove empty inputs before submitting
                $("input[name='guest_name[]'], input[name='guest_phone[]']").each(function() {
                    if ($(this).val().trim() === '') {
                        $(this).closest('.row').remove(); // Remove the entire row if empty
                    }
                });
            });
        });
    </script>
    
    <style>
        #isvip {
            width: 16px;
            height: 16px;
        }
    </style>
</x-app-layout>
