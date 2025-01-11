<x-app-layout>
    <div class="container-fluid">
        @if ($guest->nationality != 'India')
            <div class="d-flex justify-content-end mt-2 mb-4">
                <a href="{{route('admin.guest.download',$guest->id)}}" class="btn btn-primary">
                    Download GRC
                </a>                
            </div>
        @endif
        <div class="accordion" id="accordionExample">
            <!-- Guest Details Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingGuestDetails">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseGuestDetails" aria-expanded="true"
                        aria-controls="collapseGuestDetails">
                        Guest Details
                    </button>
                </h2>
                <div id="collapseGuestDetails" class="accordion-collapse collapse show"
                    aria-labelledby="headingGuestDetails" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <!-- Guest Details in Row-Column Layout -->
                        <div class="section-title p-2 fw-semibold fs-5 bg-light">
                            <span>Guest Details</span>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>First Name</td>
                                    <td>{{ $guest->firstname }}</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>{{ $guest->lastname }}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>{{ \Carbon\Carbon::parse($guest->dob)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $guest->address }}</td>
                                </tr>
                                <tr>
                                    <td>Arriving From</td>
                                    <td>{{ $guest->arrivingfrom }}</td>
                                </tr>
                                <tr>
                                    <td>Date & Time</td>
                                    <td>{{ \Carbon\Carbon::parse($guest->datetime)->format('d-m-Y H:i A') }}</td>
                                </tr>
                                <tr>
                                    <td>Purpose of Visit</td>
                                    <td>{{ $guest->purposeofvisit }}</td>
                                </tr>
                                <tr>
                                    <td>Departure Date</td>
                                    <td>{{ \Carbon\Carbon::parse($guest->depaturedate)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Proceeding To</td>
                                    <td>{{ $guest->proceedingto }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $guest->email }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $guest->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Nationality</td>
                                    <td>{{ $guest->nationality }}</td>
                                </tr>
                                <tr>
                                    <td>Room No</td>
                                    <td>{{ $guest->roomno }}</td>
                                </tr>
                                <tr>
                                    <td>Pack No</td>
                                    <td>{{ $guest->packno }}</td>
                                </tr>
                                <tr>
                                    <td>Meal Plan</td>
                                    <td>{{ $guest->mealplan }}</td>
                                </tr>
                                <tr>
                                    <td>VIP Details</td>
                                    <td>
                                        @if ($guest->vipdetails)
                                            <img src="{{ asset('storage/' . $guest->vipdetails) }}" alt="VIP Details"
                                                class="img-fluid" width="400">
                                        @else
                                            <p>No VIP details available</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foreigner Details</td>

                                </tr>
                                @if ($guest->nationality != 'India')
                                    <tr>
                                        <td>Passport No</td>
                                        <td>{{ $guest->passportno }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Issue</td>
                                        <td>{{ $guest->dateofissue }}</td>
                                    </tr>
                                    <tr>
                                        <td>Place Of Issue</td>
                                        <td>{{ $guest->placeofissue }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Expiry</td>
                                        <td>{{ $guest->dateofexpiry }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Arrival</td>
                                        <td>{{ $guest->dateofarrival }}</td>
                                    </tr>
                                    <tr>
                                        <td>Visa Number</td>
                                        <td>{{ $guest->visano }}</td>
                                    </tr>
                                    <tr>
                                        <td>Place Of Visa Issue</td>
                                        <td>{{ $guest->placeofvisaissue }}</td>
                                    </tr>
                                    <tr>
                                        <td>Duration Of Stay</td>
                                        <td>{{ $guest->durationofstay }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Visa Issue</td>
                                        <td>{{ $guest->dateofvisaissue }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Visa Expiry</td>
                                        <td>{{ $guest->dateofvisaexpiry }}</td>
                                    </tr>
                                    <tr>
                                        <td>Employeed in India?</td>
                                        <td>{{ $guest->employeed }}</td>
                                    </tr>
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Documents Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingDocuments">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseDocuments" aria-expanded="true" aria-controls="collapseDocuments">
                        Documents
                    </button>
                </h2>
                <div id="collapseDocuments" class="accordion-collapse collapse show" aria-labelledby="headingDocuments"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="section-title p-2 fw-semibold fs-5 bg-light">
                            <span>Documents</span>
                        </div>
                        <div class="row">
                            @foreach ($guest->documents as $document)
                                <div class="col-md-3 mb-3">
                                    <img src="{{ asset('storage/' . $document->image_url) }}" alt="Document Image"
                                        class="img-fluid" width="150">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Signature Image Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSignature">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSignature" aria-expanded="true" aria-controls="collapseSignature">
                        Signature
                    </button>
                </h2>
                <div id="collapseSignature" class="accordion-collapse collapse show" aria-labelledby="headingSignature"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="section-title p-2 fw-semibold fs-5 bg-light">
                            <span>Signature</span>
                        </div>
                        @if ($guest->signature_image_url)
                            <img src="{{ asset('storage/' . $guest->signature_image_url) }}" alt="Signature Image"
                                class="img-fluid" width="250">
                        @else
                            <p>No signature available</p>
                        @endif
                    </div>
                </div>
                <div id="collapseSignature" class="accordion-collapse collapse show" aria-labelledby="headingSignature"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="section-title p-2 fw-semibold fs-5 bg-light">
                            <span>Manager Signature</span>
                        </div>
                        @if ($guest->manager_signature_image_url)
                            <img src="{{ asset('storage/' . $guest->manager_signature_image_url) }}"
                                alt="Signature Image" class="img-fluid" width="250">
                        @else
                            <p>No signature available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
