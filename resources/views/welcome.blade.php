<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Viceroy-GRC</title>
    <link rel="icon" type="image/ico" href="">
    <link defer preload rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link defer href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" rel="stylesheet"
        crossorigin>

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('frontend/css/jquery.signaturepad.css') }}" rel="stylesheet">

</head>

<body>


    <section class="main_content">
        <!-- <video src="./assets/bg-video.mp4" class="banner_video"></video> -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-2 mx-auto">
                    <div class="row header">

                        <div class="col-lg-4 col-md-4 col-2 my-auto">
                            <div class="menu">
                                <div class="three">
                                    <div class="hamburger" id="hamburger-6" onclick="openModal()">
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 text-center">
                            <div class="logo">
                                <img src="https://www.viceroymunnar.com/img/logo-light.png" class="img-fluid"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4 my-auto text-end">
                            <a href="{{ url('/') }}" class="grc_btn">New GRC</a>
                        </div>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="alert alert-success text-center" id="successMessage"
                            style="color: white; background-color: #58b66e; padding: 15px; border-radius: 5px;">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('successMessage').style.display = 'none';
                    }, 5000);
                </script>
            @endif

            <div class="row mt-4">
                <div class="col-lg-7 col-md-11 bg_Mix m-auto">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pt-3">
                                <form action="{{ route('guest.store') }}" method="POST" id="msform"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="progress mb-4">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="firstname"
                                                            class="form-control text-uppercase" id="firstname"
                                                            placeholder="First Name" autocomplete="off" t required>
                                                        <label for="firstname">First Name <span
                                                                style="color: red;">*</span></label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="lastname"
                                                            class="form-control text-uppercase" id="lastname"
                                                            placeholder="Last Name" autocomplete="off">
                                                        <label for="lastname">Last Name<span
                                                                style="color: red;">*</span></label>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="dob" class="form-control"
                                                            placeholder="DOB" onfocus="(this.type='date')"
                                                            onblur="(this.type='text')" id="dob"
                                                            autocomplete="off">
                                                        <label for="dob">DOB</label>
                                                    </div>
                                                    @error('dob')
                                                        <span style="font-size:13px;color:#ffff;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="address" class="form-control"
                                                            placeholder="Address" onfocus="(this.type='Address')"
                                                            onblur="(this.type='Address')" id="address"
                                                            autocomplete="off">
                                                        <label for="address">Address</label>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="arrivingfrom"
                                                            class="form-control" id="arrivingfrom"
                                                            placeholder="Arriving From" autocomplete="off">
                                                        <label for="floatingArriving">Arriving From</label>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="datetime-local" name="datetime"
                                                            class="form-control" placeholder="Datetime"
                                                            id="datetime"
                                                            value="{{ \Carbon\Carbon::now('Asia/Kolkata')->format('Y-m-d\TH:i') }}">
                                                        <label for="datetime">Arrival Date Time</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="purposeofvisit"
                                                            class="form-control" id="purposeofvisit"
                                                            placeholder="Purpose of visit" autocomplete="off">
                                                        <label for="purposeofvisit">Purpose of visit</label>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" name="depaturedate"
                                                            class="form-control" placeholder="MM/DD/YYYY"
                                                            onfocus="(this.type='date')" onblur="(this.type='text')"
                                                            id="depaturedate" autocomplete="off">
                                                        <label for="depaturedate">Departure Date</label>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="proceedingto"
                                                            class="form-control" id="proceedingto"
                                                            placeholder="Proceeding to" autocomplete="off">
                                                        <label for="proceedingto">Proceeding to </label>
                                                    </div>
                                                    @error('proceedingto')
                                                        <span
                                                            style="font-size:13px;color:#ffff;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="email" name="email" class="form-control"
                                                            id="email" placeholder="Email ID" autocomplete="off">
                                                        <label for="email">Email ID</label>
                                                        @error('email')
                                                            <span
                                                                style="font-size:13px;color:#ffff;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="phone" class="form-control"
                                                            id="phone" placeholder="Phone" minlength="10" maxlength="15"
                                                            oninput="this.value = this.value.replace(/\D/g, '')"
                                                            autocomplete="off">
                                                        <label for="phone">Phone No<span
                                                                style="color: red;">*</span></label>
                                                    </div>
                                                    @error('phone')
                                                        <span
                                                            style="font-size:13px;color:#ffff;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating custom-select-container">
                                                        <input type="text" class="form-control"
                                                            id="nationalitySearch" placeholder="Select Nationality"
                                                            onclick="toggleDropdown()" oninput="filterOptions()"
                                                            autocomplete="off">
                                                        <label for="nationalitySearch">Nationality<span
                                                                style="color: red;">*</span></label>

                                                        <input type="hidden" name="nationality" id="nationality">

                                                        <div id="customDropdown" class="custom-dropdown"
                                                            style="display: none;">
                                                            @foreach ($nationalities as $nationality)
                                                                <div class="custom-option"
                                                                    onclick="selectOption('{{ $nationality->name }}')">
                                                                    {{ $nationality->name }}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" name="roomno" class="form-control"
                                                            id="roomno" placeholder="Room no" autocomplete="off">
                                                        <label for="Roomno">Room No</label>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" name="packno" class="form-control"
                                                            id="packno" placeholder="packno" autocomplete="off">
                                                        <label for="packno">Number Of Packs</label>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <select name="mealplan" class="form-control" id="mealplan"
                                                            autocomplete="off">
                                                            <option value="" disabled selected>Select Meal Plan
                                                            </option>
                                                            <option value="CP">CP</option>
                                                            <option value="AP">AP</option>
                                                            <option value="MAP">MAP</option>
                                                        </select>
                                                        <label for="mealplan">Meal Plan</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-2">
                                                    <input type="checkbox" id="flexCheckChecked">
                                                    <label class="form-check-label text-white" for="flexCheckChecked">
                                                        Is VIP
                                                    </label>
                                                </div>


                                                <div class="row mt-4 mb-2 p-1">
                                                    <div class="col lg-3">
                                                        <button id="vipButton" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#vipModal">
                                                            VIP
                                                        </button>
                                                        <div class="file-icon-container"
                                                            style="position: relative; display: inline-block;">
                                                            <i id="vipFileIcon" class="fas fa-file"
                                                                style="font-size: 54px; display: none; cursor: pointer;"
                                                                onclick="showSignatureModal()"></i>
                                                            <i id="vipDeleteIcon" class="fa-solid fa-delete-left"
                                                                style="font-size: 24px; display: none; cursor: pointer; color: rgb(197, 71, 83); position: absolute; top: -1px; right: -15px; transform: translate(50%, -50%);"
                                                                onclick="deleteVipSignature()"></i>
                                                        </div>

                                                    </div>
                                                </div>

                                                <input type="hidden" name="vipdetails" id="vipDetailsInput"
                                                    value="" />



                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button"
                                            value="Next" />
                                    </fieldset>
                                    <fieldset>
                                        <div id="additionalFields" style="display: none;">
                                            <div class="row mt-2">
                                                <h5 class="foreignheading">For Foreign Nationals Only</h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" name="passportno" class="form-control"
                                                            id="passportno" placeholder="Passport Number"
                                                            autocomplete="off">
                                                        <label for="passportno">Passport Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="dateofissue" class="form-control"
                                                            placeholder="MM/DD/YYYY" onfocus="(this.type='date')"
                                                            onblur="(this.type='text')" id="dateofissue"
                                                            autocomplete="off">
                                                        <label for="dateofissue">Date of Issue</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="placeofissue"
                                                            class="form-control" id="placeofissue"
                                                            placeholder="Place of Issue" autocomplete="off">
                                                        <label for="placeofissue">Place of Issue</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="dateofexpiry"
                                                            class="form-control" placeholder="MM/DD/YYYY"
                                                            onfocus="(this.type='date')" onblur="(this.type='text')"
                                                            id="dateofexpiry" autocomplete="off">
                                                        <label for="dateofexpiry">Date of Expiry</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Third Row -->
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="dateofarrival"
                                                            class="form-control" placeholder="MM/DD/YYYY"
                                                            onfocus="(this.type='date')" onblur="(this.type='text')"
                                                            id="dateofarrival" autocomplete="off">
                                                        <label for="dateofarrival">Date of Arrival In
                                                            India</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" name="visano" class="form-control"
                                                            id="visano" placeholder="Visa Number"
                                                            autocomplete="off">
                                                        <label for="visano">Visa Number</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Fourth Row -->
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="placeofvisaissue"
                                                            class="form-control" id="placeofvisaissue"
                                                            placeholder="Place of Visa Issue" autocomplete="off">
                                                        <label for="placeofvisaissue">Place of Visa
                                                            Issue</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="durationofstay"
                                                            class="form-control" id="durationofstay"
                                                            placeholder="Duration Of Stay" autocomplete="off">
                                                        <label for="durationofstay">Duration Of Stay</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Fifth Row -->
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="dateofvisaissue"
                                                            class="form-control" placeholder="MM/DD/YYYY"
                                                            onfocus="(this.type='date')" onblur="(this.type='text')"
                                                            id="dateofvisaissue" autocomplete="off">
                                                        <label for="dateofvisaissue">Date of Visa Issue</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" name="dateofvisaexpiry"
                                                            class="form-control" placeholder="MM/DD/YYYY"
                                                            onfocus="(this.type='date')" onblur="(this.type='text')"
                                                            id="dateofvisaexpiry" autocomplete="off">
                                                        <label for="dateofvisaexpiry">Date of Visa
                                                            Expiry</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Sixth Row -->
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-floating">
                                                        <select name="employeed" class="form-control" id="employeed">
                                                            <option value="" disabled selected>Employed in India
                                                            </option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                        <label for="employeed">Employed in India</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button"
                                            value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <div class="terms_sec rounded-xl">
                                                <h4 class="text_theme text-center mb-3">Terms & Conditions for Guests
                                                    at the Hotel/Resort</h4>

                                                <div
                                                    style="height: 50vh; overflow-y: auto; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
                                                    <ol>
                                                        <li><strong>Rights of the Management:</strong> Guests are
                                                            expected to conduct themselves respectfully and not cause
                                                            any disturbance within the premises. The management reserves
                                                            the absolute right of admission and may change the guest’s
                                                            room or relocate them at any time without notice. The
                                                            management retains full control over the entire premises.
                                                        </li>
                                                        <li><strong>Guest Belongings:</strong> Guests are advised to
                                                            secure their doors and windows when leaving the room or
                                                            before sleeping. Private lockers are available at the front
                                                            office for additional security. The management is not liable
                                                            for any loss or damage to guest belongings, cash, or
                                                            property from the room, locker, or any other part of the
                                                            hotel, including theft or pilferage.</li>
                                                        <li><strong>Relation Between Management and Guests:</strong> The
                                                            hotel management retains control of all parts of the hotel
                                                            premises and its entirety during the guest's stay.</li>
                                                        <li><strong>Admission and Identification Requirements:</strong>
                                                            Guests are required to complete and sign the registration
                                                            card at the reception upon check-in. It is mandatory for all
                                                            guests to present valid identification. Foreign nationals
                                                            must present their passport and a valid visa.</li>
                                                        <li><strong>Guest Visitors:</strong> Visitors and servants of
                                                            guests are not permitted in guest rooms at any time. They
                                                            may be entertained in the lounge area.</li>
                                                        <li><strong>Check-in/Check-out and Departure:</strong>
                                                            <ul>
                                                                <li>Check-in time: 2:00 PM onwards</li>
                                                                <li>Check-out time: 11:00 AM</li>
                                                            </ul>
                                                            Guests must vacate their rooms by the check-out time.
                                                            Failure to do so by 12:00 PM will result in a half-day
                                                            rental charge. The management reserves the right to remove
                                                            the guest and their belongings if they overstay.
                                                        </li>
                                                        <li><strong>Use of Hotel Facilities:</strong> Guests must use
                                                            hotel facilities and services with care and at their own
                                                            risk. The management will not be responsible for any
                                                            injuries or damage to guest belongings arising from the use
                                                            of hotel facilities.</li>
                                                        <li><strong>Damages to Property:</strong> Guests are liable for
                                                            any damage, loss, or harm to hotel property caused by
                                                            themselves, their friends, or individuals for whom they are
                                                            responsible.</li>
                                                        <li><strong>Smoking, Alcohol, and Drugs:</strong>
                                                            <ul>
                                                                <li>Smoking is prohibited in rooms and the restaurant,
                                                                    with a violation charge of 5000.</li>
                                                                <li>Alcohol consumption is prohibited in public areas of
                                                                    the hotel.</li>
                                                                <li>The possession, use, distribution, or sale of
                                                                    illegal drugs is strictly prohibited.</li>
                                                            </ul>
                                                        </li>
                                                        <li><strong>Noise Levels:</strong> Guests are required to
                                                            maintain a reasonable level of noise. Loud music or high TV
                                                            volume should not disturb other guests.</li>
                                                        <li><strong>Housekeeping:</strong> Housekeeping services are
                                                            available between 10:00 AM and 4:00 PM. Guests are requested
                                                            to care for resort equipment, and damages due to negligence
                                                            will be charged.</li>
                                                        <li><strong>Prohibited Items:</strong> Guests are not allowed to
                                                            bring flammable materials, explosives, firearms, hazardous
                                                            items, or prohibited goods onto the premises.</li>
                                                        <li><strong>Children Policy:</strong>
                                                            <ul>
                                                                <li>Children under 6 years old can stay for free,
                                                                    sharing existing bedding in selected rooms.</li>
                                                                <li>Children aged 6–12 will be charged 1500 per night.
                                                                </li>
                                                                <li>Children aged 13 and above will incur a charge of
                                                                    2000 per night.</li>
                                                                <li>Jacuzzi rooms will have an additional charge of
                                                                    2500.</li>
                                                            </ul>
                                                        </li>
                                                        <li><strong>Pool Usage:</strong> Only pool towels are allowed in
                                                            the pool area. Room towels are not permitted for use in the
                                                            pool.</li>
                                                        <li><strong>Pets:</strong> Pets are not allowed within the hotel
                                                            premises.</li>
                                                        <li><strong>Behavior and Conduct:</strong> Guests are expected
                                                            to behave respectfully, without disturbing other guests. The
                                                            management reserves the right to remove any guest who
                                                            misbehaves or causes disruption.</li>
                                                        <li><strong>Applicable Law:</strong> Guests must comply with all
                                                            applicable laws, government rules, and regulations in force
                                                            during their stay.</li>
                                                        <li><strong>Amendment of Rules:</strong> The management reserves
                                                            the right to amend or alter these terms and conditions at
                                                            any time without prior notice.</li>
                                                    </ol>
                                                </div>

                                                <div class="col-lg-12 mt-3">
                                                    <input type="checkbox" id="flexCheckChecked_1">
                                                    <label class="form-check-label text-white"
                                                        for="flexCheckChecked_1">
                                                        I agree to terms & conditions
                                                    </label>
                                                </div>
                                                <span id="termsError" class="error-text"
                                                    style="color: rgb(11, 11, 11); display: none;">
                                                    Please accept the terms and conditions.
                                                </span>
                                            </div>
                                        </div>

                                        <input type="button" name="next" class="next action-button"
                                            value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" />
                                    </fieldset>




                                    <fieldset>
                                        <div class="form-card">
                                            <div class="terms_sec rounded-xl">
                                                <h3> Documents</h3>
                                                <div class="col-lg-12 mt-4">
                                                    <div class="customized-choose-file">
                                                        Take pictures of documents
                                                        <input id="file-upload" type="file" name="image_url[]"
                                                            accept="image/*" capture="camera" multiple required />

                                                        <span>
                                                            <img src="{{ asset('frontend/camera.png') }}"
                                                                alt="">
                                                        </span>
                                                    </div>
                                                    <div id="file-previews"></div>
                                                </div>

                                                <div class="col-lg-6 mt-4 mdl_content_2">
                                                    <button id="userSignatureButton" class="btn btn-primary w-100"
                                                        data-bs-toggle="modal" data-bs-target="#userSignatureModal">
                                                        Guest Signature
                                                    </button>
                                                    <div id="userSignatureDisplay"
                                                        style="display: none; position: relative; text-align: center;">
                                                        <label id="userSignatureLabel"
                                                            style="display: block; font-size: 16px; font-weight: bold; margin-bottom: 8px;">
                                                            Guest Signature
                                                        </label>
                                                        <i id="userFileIcon" class="fas fa-file"
                                                            style="font-size: 54px; cursor: pointer; color: #272525;"></i>
                                                        <button type="button" id="removeUserSignature"
                                                            class="fa-solid fa-delete-left"
                                                            style="font-size: 24px; cursor: pointer; color: rgb(197, 71, 83); position: absolute; top: 23px; right: 0;">
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Manager Signature Section -->
                                                <div class="col-lg-6 mt-4 mdl_content_2">
                                                    <button id="managerSignatureButton" class="btn btn-primary w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#managerSignatureModal">
                                                        Manager Signature
                                                    </button>
                                                    <div id="managerSignatureDisplay"
                                                        style="display: none; position: relative; text-align: center;">
                                                        <label id="managerSignatureLabel"
                                                            style="display: block; font-size: 16px; font-weight: bold; margin-bottom: 8px;">
                                                            Manager Signature
                                                        </label>
                                                        <i id="managerFileIcon" class="fas fa-file"
                                                            style="font-size: 54px; cursor: pointer; color: #272525;"></i>
                                                        <button type="button" id="removeManagerSignature"
                                                            class="fa-solid fa-delete-left"
                                                            style="font-size: 24px; cursor: pointer; color: rgb(197, 71, 83); position: absolute; top: 23px; right: 0;">
                                                        </button>
                                                    </div>
                                                </div>



                                            </div>
                                            <input type="hidden" name="signature_image_url" id="signature">
                                            <input type="hidden" name="manager_signature_image_url"
                                                id="manager_signature">
                                        </div>
                                        <button type="submit" name="next" class="next action-button"
                                            id="submitButton" disabled>Submit</button>


                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="Previous" />
                                    </fieldset>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="headerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-white">
                <div class="modal-header">
                    <h2>GRC</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-lg-4">
                    <div class="row mb-3">
                        <ul class="month_count list-inline">
                            <li class="list-inline-item filter-button" onclick="filterByDays(0, this)">Today</li>
                            <li class="list-inline-item filter-button" onclick="filterByDays(7, this)">7 Days</li>
                            <li class="list-inline-item filter-button" onclick="filterByDays(30, this)">Month</li>
                        </ul>
                    </div>

                    <div class="row mb-3">
                        <ul class="Nationality list-inline">
                            <li class="list-inline-item filter-button" onclick="filterByAll(this)">All</li>
                            <li class="list-inline-item filter-button" onclick="filterByNationality('India', this)">
                                Indian Nationals</li>
                            <li class="list-inline-item filter-button"
                                onclick="filterByNationality('Foreigner', this)">Foreigners</li>
                            <li class="list-inline-item filter-button" onclick="filterByVIP(this)">VIPs</li>
                        </ul>
                    </div>


                    <div class="row table_content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="w_60">Sl no</th>
                                        <th class="w_100">First Name</th>
                                        <th class="w_100">Date of Birth</th>
                                        <th>Address</th>
                                        <th>Arriving From</th>
                                        <th class="w_140">Email</th>
                                        <th>Phone</th>
                                        <th>Nationality</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div id="guest-details" style="display: none;">
                                <h3>Guest Details</h3>
                                <div id="details-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="vipModal" tabindex="-1" aria-labelledby="vipModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-md-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="vipModalLabel">VIP Instructions</h5>
                        <p class="mb-0">Please write who this is and if they have any special instructions apart from
                            VIP protocol.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <canvas id="signature-pad_vip" width="700" height="300"
                        style="border: 1px solid #000;"></canvas>
                </div>
                <div class="modal-footer">
                    <button type="button" id="clearVipDetails" class="btn btn-warning">Clear</button>
                    <button type="button" id="saveVipDetails" class="btn btn-primary">Save VIP Details</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signatureDisplayModal" tabindex="-1" aria-labelledby="signatureDisplayModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signatureDisplayModalLabel">VIP Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="displaySignatureImage" src="" alt="VIP Signature"
                        style="max-width: 100%; border: 1px solid #000;">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="userSignatureModal" tabindex="-1" aria-labelledby="userSignatureModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal_dilog_2">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="userSignatureModalLabel">Guest Signature</h5>
                        <p class="mb-0">Please provide your signature below.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="user-SigPad mb-4">
                        <div class="sig sigWrapper mx-auto">
                            <canvas class="pad" width="400" height="180" id="signature-pad"></canvas>
                            <input type="hidden" name="output" class="output" id="signature" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="clearUserSignature" class="btn btn-warning">Clear</button>
                    <button type="button" id="saveUserSignature" class="btn btn-primary">Save Signature</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Manager Signature Modal -->
    <div class="modal fade" id="managerSignatureModal" tabindex="-1" aria-labelledby="managerSignatureModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal_dilog_2">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="managerSignatureModalLabel">Manager Signature</h5>
                        <p class="mb-0">Please provide the manager's signature below.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="man-SigPad mb-4">
                        <div class="sig sigWrapper mx-auto">
                            <canvas class="pad" width="400" height="180" id="manager-signature-pad"></canvas>
                            <input type="hidden" name="managersignature" id="managersignature">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="clearManagerSignature" class="btn btn-warning">Clear</button>
                        <button type="button" id="saveManagerSignature" class="btn btn-primary">Save Signature</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- User Signature Display Modal -->
    <div class="modal fade" id="userSignatureViewModal" tabindex="-1" aria-labelledby="userSignatureViewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userSignatureViewModalLabel">Guest Signature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="viewUserSignatureImage" style="width:100%; height:auto;" />
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="managerSignatureViewModal" tabindex="-1"
        aria-labelledby="managerSignatureViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="managerSignatureViewModalLabel">Manager Signature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="viewmanagerSignatureImage" style="width:100%; height:auto;" />
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/js/jquery.signaturepad.js') }}"></script>
    <script src="{{ asset('admin/js/json2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/hamburgerdata.js') }}"></script>
    <script>
        function openModal() {
            const modal = new bootstrap.Modal(document.getElementById('headerModal'));
            modal.show();
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(this).toggleClass("is-active");
            });
        });
    </script>


    <script>
        document.querySelector("#file-upload").onchange = function() {
            const fileInput = this;
            const fileList = Array.from(fileInput.files);
            const filePreviewContainer = document.querySelector("#file-previews");
            filePreviewContainer.innerHTML = '';
            fileList.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.classList.add('file-item');

                const imagePreview = document.createElement('img');
                imagePreview.src = URL.createObjectURL(file);
                imagePreview.style.maxWidth = '100px';
                imagePreview.style.marginRight = '10px';
                const removeButton = document.createElement('button');
                removeButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
                removeButton.classList.add('btn', 'btn-danger', 'btn-sm');
                removeButton.style.marginLeft = '10px';
                removeButton.addEventListener('click', function() {
                    fileItem.remove();
                });
                fileItem.appendChild(imagePreview);
                fileItem.appendChild(removeButton);
                filePreviewContainer.appendChild(fileItem);
            });
        };
    </script>
    <script>
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);
            $("#submitButton").prop("disabled", true);

            $(".next").click(function(e) {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                var isValid = true;

                current_fs.find(".error").remove();
                $("#termsError").hide();
                $("#rulesError").hide();

                current_fs.find("#firstname, #lastname, #phone ,#email").each(function() {
                    if ($(this).val().trim() === "") {
                        isValid = false;
                        var fieldLabel = $(this).attr("placeholder") || $(this).closest(
                            '.form-floating').find('label').text();
                        $(this).after(
                            "<span class='error' style='color:black; font-size: 13px;'>The " +
                            fieldLabel + " field is required</span>");
                    }
                });

                var nationality = $("#nationality").val();
                if (nationality === null || nationality === "") {
                    isValid = false;
                    $("#nationality").after(
                        "<span class='error' style='color:black; font-size: 13px;'>Please select a nationality</span>"
                    );
                }
                if (current === 1 && nationality !== "India") {
                    current_fs.find(
                        " #arrivingfrom , #address , #datetime , #purposeofvisit  , #proceedingto "
                    ).each(
                        function() {
                            if ($(this).val().trim() === "") {
                                isValid = false;
                                var fieldLabel = $(this).attr("placeholder") || $(this).closest(
                                    '.form-floating').find('label').text();
                                $(this).after(
                                    "<span class='error' style='color:black; font-size: 13px;'>The " +
                                    fieldLabel + " field is required</span>");
                            }
                        });
                    var depaturedate = $("#depaturedate").val();
                    if (depaturedate === null || depaturedate === "") {
                        isValid = false;
                        $("#depaturedate").after(
                            "<span class='error' style='color:black; font-size: 13px;'>Please Enter The depature date</span>"
                        );
                    }
                }

                var phone = current_fs.find("#phone").val();
                if (phone && !/^\d{10,}$/.test(phone)) {
                    isValid = false;
                    current_fs.find("#phone").after(
                        "<span class='error' style='color:black; font-size: 13px;'>Please enter a valid phone number with at least 10 digits</span>"
                    );
                }

                var email = current_fs.find("#email").val();
                if (email && !/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/.test(email)) {
                    isValid = false;
                    current_fs.find("#email").after(
                        "<span class='error' style='color:black; font-size: 13px;'>Please enter a valid email address</span>"
                    );
                }

                if (current_fs.is("fieldset:has(#flexCheckChecked_1)")) {
                    if (!$("#flexCheckChecked_1").is(":checked")) {
                        isValid = false;
                        $("#termsError").show();
                    }
                }
                if (current_fs.is("fieldset:has(#flexCheckChecked_2)")) {
                    if (!$("#flexCheckChecked_2").is(":checked")) {
                        isValid = false;
                        $("#rulesError").show();
                    }
                }
                if (current === 2) {
                    var passportNo = current_fs.find("#passportno").val();
                    var visaNo = current_fs.find("#visano").val();
                    var dateofissue = current_fs.find('#dateofissue').val();
                    var placeofissue = current_fs.find('#placeofissue').val();
                    var dateofarrival = current_fs.find('#dateofarrival').val();
                    var durationofstay = current_fs.find('#durationofstay').val();
                    var employeed = current_fs.find('#employeed').val();


                    if (!passportNo) {
                        isValid = false;
                        current_fs.find("#passportno").after(
                            "<span class='error' style='color:black; font-size: 13px;'>Passport Number is required</span>"
                        );
                    }

                    if (!visaNo) {
                        isValid = false;
                        current_fs.find("#visano").after(
                            "<span class='error' style='color:black; font-size: 13px;'>Visa Number is required</span>"
                        );
                    }
                    if (!dateofissue) {
                        isValid = false;
                        current_fs.find("#dateofissue").after(
                            "<span class='error' style='color:black; font-size: 13px;'>Date of passport issue is required</span>"
                        );
                    }
                    if (!placeofissue) {
                        isValid = false;
                        current_fs.find("#placeofissue").after(
                            "<span class='error' style='color:black; font-size: 13px;'>Place of passport issue is required</span>"
                        );
                    }
                    if (!dateofarrival) {
                        isValid = false;
                        current_fs.find("#dateofarrival").after(
                            "<span class='error' style='color:black; font-size: 13px;'>The Arrival date to India is required</span>"
                        );
                    }
                    if (!durationofstay) {
                        isValid = false;
                        current_fs.find("#durationofstay").after(
                            "<span class='error' style='color:black; font-size: 13px;'>The duration of stay is required</span>"
                        );
                    }
                    if (!employeed) {
                        isValid = false;
                        current_fs.find("#employeed").after(
                            "<span class='error' style='color:black; font-size: 13px;'>The employment in India is required</span>"
                        );
                    }
                }

                if (!isValid) {
                    e.preventDefault();
                    return;
                }

                if (current === 1 && nationality === "India") {
                    next_fs = $("fieldset").eq(2);
                    current = 2;
                }


                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                next_fs.show();
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        var opacity = 1 - now;
                        current_fs.css({
                            display: "none",
                            position: "relative"
                        });
                        next_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 500
                });


                current++;
                setProgressBar(current);

                if (current === steps && isValid) {
                    $("#submitButton").prop("disabled", false);
                }
            });

            $(".previous").click(function() {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                if (current === 3 && $("#nationality").val() === "India") {
                    previous_fs = $("fieldset").eq(0);
                    current = 2;
                }

                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                previous_fs.show();

                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        var opacity = 1 - now;
                        current_fs.css({
                            display: "none",
                            position: "relative"
                        });
                        previous_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 500
                });


                current--;
                setProgressBar(current);
            });

            function setProgressBar(step) {
                var percent = (step / steps) * 100;
                $(".progress-bar").css("width", percent + "%");
            }

            $("#submitButton").click(function(e) {
                e.preventDefault();

                var isFormValid = true;

                $("fieldset").each(function() {
                    var fieldset = $(this);

                    fieldset.find("#firstname, #lastname, #phone, #nationality, #email").each(
                        function() {
                            if ($(this).val().trim() === "") {
                                isFormValid = false;
                            }
                        });

                    var phone = fieldset.find("#phone").val();
                    if (phone && !/^\d{10}$/.test(phone)) {
                        isFormValid = false;
                    }

                    if (fieldset.is("fieldset:has(#flexCheckChecked_1)") && !$(
                            "#flexCheckChecked_1").is(":checked")) {
                        isFormValid = false;
                    }

                    if (fieldset.is("fieldset:has(#flexCheckChecked_2)") && !$(
                            "#flexCheckChecked_2").is(":checked")) {
                        isFormValid = false;
                    }
                });

                if (isFormValid) {
                    $("#msform").submit();
                }
            });
        });
    </script>
    <script>
        const vipCanvas = document.getElementById('signature-pad_vip');
        const vipCtx = vipCanvas.getContext('2d');
        const vipSignatureInput = document.getElementById('vipDetailsInput');
        const saveVipButton = document.getElementById('saveVipDetails');
        const clearVipButton = document.getElementById('clearVipDetails');
        const vipButton = document.getElementById('vipButton');
        const vipFileIcon = document.getElementById('vipFileIcon');
        const displaySignatureImage = document.getElementById('displaySignatureImage');

        let drawingVip = false;
        let lastX_Vip, lastY_Vip;

        function getPositionVip(event) {
            const rect = vipCanvas.getBoundingClientRect();
            const clientX = event.touches ? event.touches[0].clientX : event.clientX;
            const clientY = event.touches ? event.touches[0].clientY : event.clientY;
            return {
                x: clientX - rect.left,
                y: clientY - rect.top
            };
        }

        function startDrawingVip(event) {
            event.preventDefault();
            drawingVip = true;
            const {
                x,
                y
            } = getPositionVip(event);
            lastX_Vip = x;
            lastY_Vip = y;
            vipCtx.beginPath();
        }

        function stopDrawingVip() {
            drawingVip = false;
            vipCtx.closePath();
        }

        function drawVip(event) {
            if (!drawingVip) return;
            const {
                x,
                y
            } = getPositionVip(event);

            const pressure = Math.max(event.pressure || 0.5, 0.1);
            vipCtx.lineWidth = pressure * 5;


            vipCtx.lineTo(x, y);
            vipCtx.strokeStyle = "#000";
            vipCtx.lineJoin = "round";
            vipCtx.stroke();
            lastX_Vip = x;
            lastY_Vip = y;
        }


        function clearCanvasVip() {
            vipCtx.clearRect(0, 0, vipCanvas.width, vipCanvas.height);
        }

        vipCanvas.addEventListener('mousedown', startDrawingVip, false);
        vipCanvas.addEventListener('mouseup', stopDrawingVip, false);
        vipCanvas.addEventListener('mousemove', drawVip, false);

        vipCanvas.addEventListener('touchstart', startDrawingVip, false);
        vipCanvas.addEventListener('touchend', stopDrawingVip, false);
        vipCanvas.addEventListener('touchmove', drawVip, false);

        vipCanvas.addEventListener('pointerdown', (event) => {
            if (event.pointerType === 'pen') {
                startDrawingVip(event);
            }
        }, false);

        vipCanvas.addEventListener('pointerup', (event) => {
            if (event.pointerType === 'pen') {
                stopDrawingVip();
            }
        }, false);

        vipCanvas.addEventListener('pointermove', (event) => {
            if (event.pointerType === 'pen') {
                drawVip(event);
            }
        }, false);


        // Clear Button Functionality
        clearVipButton.addEventListener('click', () => {
            clearCanvasVip();
            vipSignatureInput.value = "";
            displaySignatureImage.style.display = 'none';
            vipButton.style.display = 'inline-block';
            vipFileIcon.style.display = 'none';
        });

        function deleteVipSignature() {
            clearCanvasVip();

            displaySignatureImage.style.display = 'none';
            vipFileIcon.style.display = 'none';
            vipDeleteIcon.style.display = 'none';
            vipButton.style.display = 'inline-block';
            vipSignatureInput.value = "";
            const vipCheckbox = document.getElementById('flexCheckChecked');
            if (vipCheckbox) {
                vipCheckbox.checked = false;
            }
        }
        saveVipButton.addEventListener('click', () => {
            const dataURL = vipCanvas.toDataURL('image/png');
            vipSignatureInput.value = dataURL;
            vipButton.style.display = 'none';
            vipFileIcon.style.display = 'inline-block';
            vipDeleteIcon.style.display = 'inline-block';

            const modal = bootstrap.Modal.getInstance(document.getElementById('vipModal'));
            modal.hide();

            displaySignatureImage.src = dataURL;
            displaySignatureImage.style.display = 'block';

            const vipCheckbox = document.getElementById(
                'flexCheckChecked');
            if (vipCheckbox) {
                vipCheckbox.checked = true;
            }
        });



        clearVipButton.addEventListener('click', () => {
            clearCanvasVip();
            vipSignatureInput.value = "";
            displaySignatureImage.style.display = 'none';
            vipButton.style.display = 'inline-block';
            vipFileIcon.style.display = 'none';
        });


        function showSignatureModal() {
            const signatureModal = new bootstrap.Modal(document.getElementById('signatureDisplayModal'));
            signatureModal.show();
        }
    </script>



    <script>
        $(document).ready(function() {
            const userFileIcon = document.getElementById('userFileIcon');
            const displayUserSignatureImage = document.getElementById('displayUserSignatureImage');
            const userSignatureInput = document.getElementById('signature');
            const removeUserSignature = document.getElementById('removeUserSignature');
            const userButton = document.getElementById('userSignatureButton');
            const userSignatureDisplay = document.getElementById('userSignatureDisplay');

            const userSigPad = $(".user-SigPad").signaturePad({
                drawOnly: true,
                defaultAction: 'drawIt',
                penColour: '#000',
                output: '#signature',
                lineTop: 250
            });

            $("#saveUserSignature").click(function() {
                const canvas = document.querySelector("#signature-pad");
                const dataURL = canvas.toDataURL("image/png");
                userSignatureInput.value = dataURL;

                userButton.style.display = 'none';
                userFileIcon.style.display = 'inline-block';
                removeUserSignature.style.display = 'inline-block';
                userSignatureDisplay.style.display = 'inline-block';

                const modal = bootstrap.Modal.getInstance(document.getElementById('userSignatureModal'));
                modal.hide();

                userSigPad.clearCanvas();
            });

            $("#clearUserSignature").click(function() {
                userSigPad.clearCanvas();
                userSignatureInput.value = "";
                $("#removeUserSignature").hide();
            });

            removeUserSignature.addEventListener('click', () => {
                userSignatureInput.value = '';
                userFileIcon.style.display = 'none';
                removeUserSignature.style.display = 'none';
                userSignatureDisplay.style.display = 'none';

                userButton.style.display = 'inline-block';
            });

            userFileIcon.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('userSignatureViewModal'));
                const viewImage = document.getElementById('viewUserSignatureImage');
                viewImage.src = userSignatureInput.value;

                modal.show();
            });
        });



        $(document).ready(function() {
            const managerFileIcon = document.getElementById('managerFileIcon');
            const displayManagerSignatureImage = document.getElementById('displayManagerSignatureImage');
            const managerSignatureInput = document.getElementById('manager_signature');
            const removeManagerSignature = document.getElementById('removeManagerSignature');
            const managerButton = document.getElementById('managerSignatureButton');
            const managerSigPad = $(".man-SigPad").signaturePad({
                drawOnly: true,
                defaultAction: 'drawIt',
                penColour: '#000',
                output: '#managersignature',
                lineTop: 250
            });

            $("#saveManagerSignature").click(function() {
                const canvas = document.querySelector("#manager-signature-pad");
                const dataURL = canvas.toDataURL("image/png");
                managerSignatureInput.value = dataURL;

                managerButton.style.display = 'none';
                managerFileIcon.style.display = 'inline-block';
                removeManagerSignature.style.display = 'inline-block';


                const modal = bootstrap.Modal.getInstance(document.getElementById('managerSignatureModal'));
                modal.hide();

                managerSignatureDisplay.style.display = 'inline-block';

                $("#removeManagerSignature").show();

                managerSigPad.clearCanvas();
            });

            $("#clearManagerSignature").click(function() {
                managerSigPad.clearCanvas();
                $("#managersignature").val("");
                $("#removeManagerSignature").hide();
            });

            removeManagerSignature.addEventListener('click', () => {
                managerSignatureInput.value = '';

                managerFileIcon.style.display = 'none';
                removeManagerSignature.style.display = 'none';
                managerSignatureDisplay.style.display = 'none';

                managerButton.style.display = 'inline-block';
            });

            managerFileIcon.addEventListener('click', () => {
                const modal = new bootstrap.Modal(document.getElementById('managerSignatureViewModal'));
                const viewImage = document.getElementById('viewmanagerSignatureImage');
                viewImage.src = managerSignatureInput.value;

                modal.show();
            });
        });
    </script>


    <script>
        function selectOption(selectedNationality) {
            document.getElementById('nationality').value = selectedNationality;
            document.getElementById('nationalitySearch').value = selectedNationality;

            const additionalFields = document.getElementById('additionalFields');
            if (selectedNationality.toLowerCase() === 'india') {
                additionalFields.style.display = 'none';
            } else {
                additionalFields.style.display = 'block';
            }

            toggleDropdown();
        }


        function toggleDropdown() {
            const dropdown = document.getElementById('customDropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }

        function filterOptions() {
            const input = document.getElementById('nationalitySearch').value.toLowerCase();
            const options = document.querySelectorAll('.custom-option');
            options.forEach(option => {
                const nationality = option.textContent.toLowerCase();
                option.style.display = nationality.includes(input) ? 'block' : 'none';
            });
        }
    </script>

    <script>
        function filterByDays(days, element) {
            setActiveFilter(element, 'month_count');
            console.log("Filtered by days:", days);
        }

        function filterByAll(element) {
            setActiveFilter(element, 'Nationality');
            console.log("Filtered by all nationalities");
        }

        function filterByNationality(nationality, element) {
            setActiveFilter(element, 'Nationality');
            console.log("Filtered by nationality:", nationality);
        }

        function filterByVIP(element) {
            setActiveFilter(element, 'Nationality');
            console.log("Filtered by VIP");
        }

        function setActiveFilter(element, groupClass) {
            const group = document.querySelectorAll(`.${groupClass} .filter-button`);
            group.forEach(button => button.classList.remove('active-filter'));
            element.classList.add('active-filter');
        }
    </script>
</body>

</html>