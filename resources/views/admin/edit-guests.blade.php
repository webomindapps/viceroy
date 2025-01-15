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
                        <div class="col-lg-6 mb-3">
                            <label for="passportno" class="form-label">Passport No</label>
                            <input type="text" class="form-control" id="passportno" name="passportno"
                                value="{{ old('passportno', $guest->passportno) }}" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="dateofissue" class="form-label">Date Of Issue</label>
                            <input type="date" class="form-control" id="dateofissue" name="dateofissue"
                                value="{{ old('dateofissue', $guest->dateofissue) }}" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="placeofissue" class="form-label">Place Of Issue</label>
                            <input type="text" class="form-control" id="placeofissue" name="placeofissue"
                                value="{{ old('placeofissue', $guest->placeofissue) }}" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="dateofexpiry" class="form-label">Date Of Expiry</label>
                            <input type="date" class="form-control" id="dateofexpiry" name="dateofexpiry"
                                value="{{ old('dateofexpiry', $guest->dateofexpiry) }}" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="dateofarrival" class="form-label">Date Of Arrival</label>
                            <input type="date" class="form-control" id="dateofarrival" name="dateofarrival"
                                value="{{ old('dateofarrival', $guest->dateofarrival) }}" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="visano" class="form-label">Visa No</label>
                            <input type="text" class="form-control" id="visano" name="visano"
                                value="{{ old('visano', $guest->visano) }}" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="placeofvisaissue" class="form-label">Place Of Visa Issue</label>
                            <input type="text" class="form-control" id="placeofvisaissue" name="placeofvisaissue"
                                value="{{ old('placeofvisaissue', $guest->placeofvisaissue) }}" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="durationofstay" class="form-label">Duration Of Stay</label>
                            <input type="text" class="form-control" id="durationofstay" name="durationofstay"
                                value="{{ old('durationofstay', $guest->durationofstay) }}" required>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="employeed" class="form-label">Employeed In India?</label>
                            <select name="employeed" class="form-control" id="employeed">
                                <option value="" disabled {{ is_null($guest->employeed) ? 'selected' : '' }}>
                                    Select
                                    Employment Status</option>
                                <option value="yes" {{ $guest->employeed == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ $guest->employeed == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    @endif

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
                                <img src="{{ asset('storage/' . $document->image_url) }}" alt="Document Image"
                                    class="img-fluid" width="150">
                                <a onclick="return confirm('Are you sure you want to delete this?')"
                                    href="{{ route('guest.document.delete', $document->id) }}"
                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1">
                                    <i class='bx bxs-trash text-white'></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="mb-3">
                    <label for="vipdetails" class="form-label">VIP Details</label>
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
                        <div class="sig sigWrapper">
                            <canvas class="pad border border-dark rounded" width="500" height="250"></canvas>
                            <div class="mb-4">
                                <button type="button" id="saveVipDetails" class="btn btn-primary">Save VIP
                                    Details</button>
                                <button type="button" id="clearCanvas" class="btn btn-secondary">Clear</button>
                            </div>
                            <input type="hidden" name="vipdetails" id="vipdetails">

                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <img id="vipSignatureImage"
                            src="{{ $guest->vipdetails ? asset('storage/' . $guest->vipdetails) : '' }}"
                            alt="VIP Signature" class="img-fluid border rounded"
                            style="display: {{ $guest->vipdetails ? 'block' : 'none' }}; max-width: 100%; height: auto;">
                        <button type="button" id="removeFile" class="btn btn-danger mt-2"
                            style="display: none;">Remove</button>
                    </div>
                    <div class="col lg-4 mt-4">
                        <button type="submit" class="btn btn-primary">Update Guest</button>
                    </div>
            </form>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            const sigPad = $(".SigPad").signaturePad({
                drawOnly: true,
                defaultAction: 'drawIt',
                penColour: '#000',
                output: '#vipdetails',
                lineTop: 200
            });

            $("#saveVipDetails").click(function() {
                const canvas = document.querySelector(".pad");
                const dataURL = canvas.toDataURL("image/png");
                $("#vipdetails").val(dataURL);

                const vipSignatureImage = $("#vipSignatureImage");
                vipSignatureImage.attr("src", dataURL).show();

                $("#removeFile").show();
            });

            $("#clearCanvas").click(function() {
                sigPad.clearCanvas();
                $("#vipdetails").val("");
                $("#vipSignatureImage").hide();
                $("#removeFile").hide();
            });

            $("#removeFile").click(function() {
                $("#vipSignatureImage").attr("src", "").hide();
                $("#vipdetails").val("");
                $(this).hide();
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
