<!DOCTYPE html>
<html>

<head>
    <title>Guest Details</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid rgb(228, 218, 218);
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .logo-container {
            width: 30%;
            background: #ffffff;
            padding: 1px;
            text-align: left;
        }

       

        .heading {
            text-align: center;
            padding: 5px 0;
            font-size: 24px;
            font-weight: bold;
        }

        .date-container {
            text-align: right;
            padding: 10px 0;
            font-size: 16px;
        }

        .logo-date {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .details-container {
            text-align: right;
            font-size: 12px;
            color: #080808;
        }

        .logo-container {
            width: 30%;
            background: #ffffff;
            padding: 1px;
            text-align: left;
        }


        .signature-section {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="logo-date">
            <div class="logo-container">
                <img style="object-fit: contain;" src="{{ public_path('admin/logo.png') }}" height="200" width="150"
                    alt="Logo" />
            </div>
            <div class="details-container">
                <div class="date-container">
                    Date: {{ \Carbon\Carbon::parse($guests->datetime)->format('d-m-Y') }}
                </div>
                <div class="date-container">
                    GRC No: {{ $guests->id }}
                </div>
            </div>
            <div class="heading">Guest Details</div>

            <table>
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td>{{ $guests->firstname }}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{{ $guests->lastname }}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>{{ \Carbon\Carbon::parse($guests->dob)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $guests->address }}</td>
                    </tr>
                    <tr>
                        <td>Arriving From</td>
                        <td>{{ $guests->arrivingfrom }}</td>
                    </tr>
                    <tr>
                        <td>Date & Time</td>
                        <td>{{ \Carbon\Carbon::parse($guests->datetime)->format('d-m-Y H:i A') }}</td>
                    </tr>
                    <tr>
                        <td>Purpose of Visit</td>
                        <td>{{ $guests->purposeofvisit }}</td>
                    </tr>
                    <tr>
                        <td>Departure Date</td>
                        <td>{{ \Carbon\Carbon::parse($guests->depaturedate)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td>Proceeding To</td>
                        <td>{{ $guests->proceedingto }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $guests->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $guests->phone }}</td>
                    </tr>
                    <tr>
                        <td>Nationality</td>
                        <td>{{ $guests->nationality }}</td>
                    </tr>
                    <tr>
                        <td>Room No</td>
                        <td>{{ $guests->roomno }}</td>
                    </tr>
                    <tr>
                        <td>Pack No</td>
                        <td>{{ $guests->packno }}</td>
                    </tr>
                    <tr>
                        <td>Meal Plan</td>
                        <td>{{ $guests->mealplan }}</td>
                    </tr>
                    <tr>
                        <td>Is VIP</td>
                        <td>{{ $guests->isvip ? 'True' : 'False' }}</td>
                    </tr>
                    <tr>
                        <td>Guest Notes</td>
                        <td>
                            @if ($guests->vipdetails)
                                <img src="{{ public_path('storage/' . $guests->vipdetails) }}" alt="VIP Details"
                                    class="img-fluid" width="300" height="300">
                            @else
                                <p>No Guest Notes available</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Foreigner Details</td>
                    </tr>
                    @if ($guests->nationality != 'India')
                        <tr>
                            <td>Passport No</td>
                            <td>{{ $guests->passportno }}</td>
                        </tr>
                        <tr>
                            <td>Date Of Issue</td>
                            <td>{{ $guests->dateofissue }}</td>
                        </tr>
                        <tr>
                            <td>Place Of Issue</td>
                            <td>{{ $guests->placeofissue }}</td>
                        </tr>
                        <tr>
                            <td>Date Of Expiry</td>
                            <td>{{ $guests->dateofexpiry }}</td>
                        </tr>
                        <tr>
                            <td>Date Of Arrival</td>
                            <td>{{ $guests->dateofarrival }}</td>
                        </tr>
                        <tr>
                            <td>Visa Number</td>
                            <td>{{ $guests->visano }}</td>
                        </tr>
                        <tr>
                            <td>Place Of Visa Issue</td>
                            <td>{{ $guests->placeofvisaissue }}</td>
                        </tr>
                        <tr>
                            <td>Duration Of Stay</td>
                            <td>{{ $guests->durationofstay }}</td>
                        </tr>
                        <tr>
                            <td>Date of Visa Issue</td>
                            <td>{{ $guests->dateofvisaissue }}</td>
                        </tr>
                        <tr>
                            <td>Date Of Visa Expiry</td>
                            <td>{{ $guests->dateofvisaexpiry }}</td>
                        </tr>
                        <tr>
                            <td>Employeed in India?</td>
                            <td>{{ $guests->employeed }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="signature-section">
            <div class="section-title p-2 fw-semibold fs-5 bg-light">
                <span>Signature</span>
            </div>
            @if ($guests->signature_image_url)
                <img src="{{ public_path('storage/' . $guests->signature_image_url) }}" alt="Signature Image"
                    class="img-fluid" width="300" height="300">
            @else
                <p>No signature available</p>
            @endif

            <div class="section-title p-2 fw-semibold fs-5 bg-light">
                <span>Manager Signature</span>
            </div>
            @if ($guests->manager_signature_image_url)
                <img src="{{ public_path('storage/' . $guests->manager_signature_image_url) }}"
                    alt="Manager Signature Image" class="img-fluid" width="300" height="300">
            @else
                <p>No signature available</p>
            @endif
        </div>
</body>

</html>
