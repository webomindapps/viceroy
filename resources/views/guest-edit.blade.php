<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Viceroy-GRC</title>

    <link rel="icon" type="image/ico" href="">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" rel="stylesheet"
        crossorigin>

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <section class="main_content py-4">
        <div class="container d-flex justify-content-center">
            <div class="col-lg-8 col-md-10 mx-auto">

                <div class="bg-light p-4 rounded shadow">
                    <div class="col-lg-1 col-md-1 col-1 my-auto text-end">
                        <a href="{{ url('/') }}" class="grc_btn">Back</a>
                    </div>
                    <h3 class="text-center mb-4">Edit Guest Details</h3>
                    <form action="{{ route('guests.edit', $guest->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    value="{{ old('firstname', $guest->firstname) }}">
                                @error('firstname')
                                    <div class="error" style="color:black">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    value="{{ old('lastname', $guest->lastname) }}">
                                @error('lastname')
                                    <div class="error" style="color:black">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    value="{{ old('dob', $guest->dob) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address', $guest->address) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="arrivingfrom" class="form-label">Arriving From</label>
                                <input type="text" class="form-control" id="arrivingfrom" name="arrivingfrom"
                                    value="{{ old('arrivingfrom', $guest->arrivingfrom) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="datetime" class="form-label">Arrival Date & Time</label>
                                <input type="datetime-local" class="form-control" id="datetime" name="datetime"
                                    value="{{ old('datetime', \Carbon\Carbon::parse($guest->datetime)->format('Y-m-d\TH:i')) }}"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="purposeofvisit" class="form-label">Purpose of Visit</label>
                                <input type="text" class="form-control" id="purposeofvisit" name="purposeofvisit"
                                    value="{{ old('purposeofvisit', $guest->purposeofvisit) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="depaturedate" class="form-label">Departure Date</label>
                                <input type="date" class="form-control" id="depaturedate" name="depaturedate"
                                    value="{{ old('depaturedate', $guest->depaturedate) }}">
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="proceedingto" class="form-label">Proceeding To</label>
                                <input type="text" class="form-control" id="proceedingto" name="proceedingto"
                                    value="{{ old('proceedingto', $guest->proceedingto) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $guest->email) }}">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone', $guest->phone) }}">
                                @error('phone')
                                    <div class="error" style="color:black">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <label for="nationality" class="form-label">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality"
                                    value="{{ old('nationality', $guest->nationality) }}">
                                @error('nationality')
                                    <div class="error" style="color:black">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="roomno" class="form-label">Room No</label>
                                <input type="number" class="form-control" id="roomno" name="roomno"
                                    value="{{ old('roomno', $guest->roomno) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="packno" class="form-label">Number Of Packages</label>
                                <input type="number" class="form-control" id="packno" name="packno"
                                    value="{{ old('packno', $guest->packno) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="mealplan" class="form-label">MealPlan</label>
                                <select name="mealplan" class="form-control" id="mealplan" autocomplete="off">
                                    <option value="" disabled {{ !$guest->mealplan ? 'selected' : '' }}>Select
                                        Meal Plan
                                    </option>
                                    <option value="CP" {{ $guest->mealplan == 'CP' ? 'selected' : '' }}>CP
                                    </option>
                                    <option value="AP" {{ $guest->mealplan == 'AP' ? 'selected' : '' }}>AP
                                    </option>
                                    <option value="MAP" {{ $guest->mealplan == 'MAP' ? 'selected' : '' }}>MAP
                                    </option>
                                </select>
                            </div>
                        </div>

                        @if ($guest->nationality != 'India')
                            <!--foreigner details-->
                            <div class="section-title p-2 fw-semibold fs-5 bg-light mb-3">
                                <span>Foreigner Details</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="passportno" class="form-label">Passport No</label>
                                    <input type="text" class="form-control" id="passportno" name="passportno"
                                        value="{{ old('passportno', $guest->passportno) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dateofissue" class="form-label">Date Of Issue</label>
                                    <input type="date" class="form-control" id="dateofissue" name="dateofissue"
                                        value="{{ old('dateofissue', $guest->dateofissue) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="placeofissue" class="form-label">Place Of Issue</label>
                                    <input type="text" class="form-control" id="placeofissue" name="placeofissue"
                                        value="{{ old('placeofissue', $guest->placeofissue) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="dateofexpiry" class="form-label">Date Of Expiry</label>
                                    <input type="date" class="form-control" id="dateofexpiry" name="dateofexpiry"
                                        value="{{ old('dateofexpiry', $guest->dateofexpiry) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="dateofarrival" class="form-label">Date Of Arrival</label>
                                    <input type="date" class="form-control" id="dateofarrival"
                                        name="dateofarrival"
                                        value="{{ old('dateofarrival', $guest->dateofarrival) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="visano" class="form-label">Visa No</label>
                                    <input type="text" class="form-control" id="visano" name="visano"
                                        value="{{ old('visano', $guest->visano) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="placeofvisaissue" class="form-label">Place Of Visa Issue</label>
                                    <input type="text" class="form-control" id="placeofvisaissue"
                                        name="placeofvisaissue"
                                        value="{{ old('placeofvisaissue', $guest->placeofvisaissue) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="durationofstay" class="form-label">Duration Of Stay</label>
                                    <input type="text" class="form-control" id="durationofstay"
                                        name="durationofstay"
                                        value="{{ old('durationofstay', $guest->durationofstay) }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="employeed" class="form-label">Employeed In India?</label>
                                <select name="employeed" class="form-control" id="employeed">
                                    <option value="" disabled
                                        {{ is_null($guest->employeed) ? 'selected' : '' }}>Select
                                        Employment Status</option>
                                    <option value="yes" {{ $guest->employeed == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $guest->employeed == 'no' ? 'selected' : '' }}>No
                                    </option>
                                </select>
                            </div>
                        @endif
                        <!-- Document Uploads -->
                        <div class="section-title p-2 fw-semibold fs-5 bg-light mb-3">
                            <span>Documents</span>
                        </div>
                        <div class="mb-3">
                            <label for="document-upload" class="form-label">Upload Document</label>
                            <input type="file" name="image_url[]" id="document-upload" class="form-control"
                                multiple>
                        </div>
                        <div class="row">
                            @foreach ($guest->documents as $document)
                                <div class="col-md-3  mt-4 mb-3 position-relative">
                                    <img src="{{ asset('storage/' . $document->image_url) }}" alt="Document Image"
                                        class="img-fluid" width="150">
                                    <a onclick="return confirm('Are you sure you want to delete this?')"
                                        href="{{ route('guests.document.delete', $document->id) }}"
                                        class="btn btn-md btn-danger position-absolute top-0 end-0 m-1">
                                        <i class='bx bxs-trash text-white'></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- VIP Details -->
                        <div class="mb-3">
                            <label for="vipdetails" class="form-label">VIP Details</label>
                            <div id="signature-pad" class="signature-pad">
                                <canvas id="vipdetails-canvas" class="border" width="400"
                                    height="200"></canvas>
                            </div>
                            <button type="button" id="saveVipDetails" class="btn btn-primary mt-2">Save
                                Vip details</button>
                            <button type="button" class="btn btn-secondary mt-2"
                                onclick="clearCanvas()">Clear</button>
                            <input type="hidden" name="vipdetails" id="vipdetails">
                            <img id="vipSignatureImage"
                                src="{{ $guest->vipdetails ? asset('storage/' . $guest->vipdetails) : '' }}"
                                alt="VIP Signature" class="img-fluid mt-3"
                                style="display: {{ $guest->vipdetails ? 'block' : 'none' }};" width="400">
                            <button type="button" id="removeFile" class="btn btn-danger mt-2"
                                style="display: none;">Remove</button>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Guest</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    const vipCanvas = document.getElementById('vipdetails-canvas');
    const vipCtx = vipCanvas.getContext('2d');
    const vipSignatureInput = document.getElementById('vipdetails');
    const saveVipButton = document.getElementById('saveVipDetails');
    const vipSignatureImage = document.getElementById('vipSignatureImage');
    const removeFileIcon = document.getElementById('removeFile');

    let drawingVip = false;

    function getPosition(event) {
        const rect = vipCanvas.getBoundingClientRect();
        return {
            x: (event.touches ? event.touches[0].clientX : event.clientX) - rect.left,
            y: (event.touches ? event.touches[0].clientY : event.clientY) - rect.top
        };
    }

    function startDrawing(event) {
        drawingVip = true;
        const pos = getPosition(event);
        vipCtx.beginPath();
        vipCtx.moveTo(pos.x, pos.y);
    }

    function draw(event) {
        if (!drawingVip) return;
        const pos = getPosition(event);
        vipCtx.lineTo(pos.x, pos.y);
        vipCtx.strokeStyle = "#000";
        vipCtx.lineWidth = 2;
        vipCtx.lineJoin = "round";
        vipCtx.stroke();
    }

    function stopDrawing() {
        drawingVip = false;
        vipCtx.closePath();
    }

    function clearCanvas() {
        vipCtx.clearRect(0, 0, vipCanvas.width, vipCanvas.height);
        vipSignatureImage.style.display = 'none';
        vipSignatureInput.value = '';
        removeFileIcon.style.display = 'none';
    }

    function saveSignature() {
        const dataURL = vipCanvas.toDataURL('image/png');
        vipSignatureImage.src = dataURL;
        vipSignatureImage.style.display = 'block';
        vipSignatureInput.value = dataURL;
        removeFileIcon.style.display = 'inline';
    }

    vipCanvas.addEventListener('mousedown', startDrawing);
    vipCanvas.addEventListener('mouseup', stopDrawing);
    vipCanvas.addEventListener('mousemove', draw);
    vipCanvas.addEventListener('touchstart', startDrawing);
    vipCanvas.addEventListener('touchend', stopDrawing);
    vipCanvas.addEventListener('touchmove', draw);

    saveVipButton.addEventListener('click', saveSignature);

    removeFileIcon.addEventListener('click', () => {
        clearCanvas();
        removeFileIcon.style.display = 'none';
    });
</script>

</html>
