<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table style="font-size: 10px; border: 1px double #433e1d; padding: 5px; width: 70%; height: 80%;" cellspacing="1"
        cellpadding="1" align="center">
        <tbody>
            <tr>
                <td>
                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td style="width: 30%; background: #ffffff; padding: 1px; text-align: center;">
                                    <img style="object-fit: contain;" src="{{ public_path('admin/logo.png') }}"
                                        height="60" />
                                </td>
                                <td style="width: 70%; font-size: 12px; color: #000; padding: 1px; text-align: right;">
                                    <div>Date: {{ \Carbon\Carbon::parse($guests->datetime)->format('d-m-Y') }}</div>
                                    <div>GRC No: {{ $guests->id }}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;" valign="top">
                    <table border="0" width="100%" cellspacing="1" cellpadding="1">
                        <tbody>
                            <tr>
                                <td
                                    style="font-weight: 500; font-size: 14px; text-align: center; color: #000000; padding-bottom: 5px;">
                                    Form B
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="font-weight: 500; font-size: 14px; text-align: center; color: #000000; padding-bottom: 5px;">
                                    Hotel Register
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="1" cellpadding="1">
                                        <tbody>
                                            <tr>
                                                <td valign="top">
                                                    <table width="100%" cellspacing="1" cellpadding="1"
                                                        style="font-size: 10px;">
                                                        <tbody>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;" width="30%"></td>
                                                                <td style="padding: 3px;" width="70%"></td>
                                                            </tr>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;">
                                                                    <strong>Name of the Visitor</strong>
                                                                </td>
                                                                <td style="padding: 3px;">
                                                                    <input type="text"
                                                                        style="width: 100%; height: 20px; font-size: 10px;"
                                                                        value="{{ strtoupper($guests->lastname . ' ' . $guests->firstname) }}"
                                                                        readonly>
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;">
                                                                    <strong>Nationality</strong>
                                                                </td>
                                                                <td style="padding: 3px;">
                                                                    <input type="text"
                                                                        style="width: 100%; height: 20px; font-size: 10px;"
                                                                        value="{{ $guests->nationality }}" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;">
                                                                    <strong>Passport Details</strong>
                                                                </td>
                                                                <td style="padding: 3px;">
                                                                    <input type="text"
                                                                        style="width: 100%; height: 20px; font-size: 10px;"
                                                                        value="{{ $guests->passportno . ',' . \Carbon\Carbon::parse($guests->dateofissue)->format('d-m-Y') . ',' . $guests->placeofissue }}"
                                                                        readonly>
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;">
                                                                    <strong>Address In India</strong>
                                                                </td>
                                                                <td style="padding: 3px;">
                                                                    <input type="text"
                                                                        style="width: 100%; height: 20px; font-size: 10px;"
                                                                        value="{{ $guests->address }}" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;">
                                                                    <strong>Date Of Arrival In India</strong>
                                                                </td>
                                                                <td style="padding: 3px;">
                                                                    <input type="text"
                                                                        style="width: 100%; height: 20px; font-size: 10px;"
                                                                        value="{{ \Carbon\Carbon::parse($guests->dateofarrival)->format('d-m-Y') }}"
                                                                        readonly>
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;">
                                                                    <strong>Whether Employeed In India? Yes/no</strong>
                                                                </td>
                                                                <td style="padding: 3px;">
                                                                    <input type="text"
                                                                        style="width: 100%; height: 20px; font-size: 10px;"
                                                                        value="{{ $guests->employeed }}" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;">
                                                                    <strong>Proposed Duration Of Stay</strong>
                                                                </td>
                                                                <td style="padding: 3px;">
                                                                    <input type="text"
                                                                        style="width: 100%; height: 20px; font-size: 10px;"
                                                                        value="{{ $guests->durationofstay }}" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;">
                                                                    <strong>User Signature</strong>
                                                                </td>
                                                                <td style="padding: 3px;">
                                                                    <img src="{{ public_path('storage/' . $guests->signature_image_url) }}"
                                                                        height="60" />
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848;">
                                                                <td style="padding: 3px;">
                                                                    <strong>Manager Signature</strong>
                                                                </td>
                                                                <td style="padding: 3px;">
                                                                    <img src="{{ public_path('storage/' . $guests->manager_signature_image_url) }}"
                                                                        height="60" />
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>


</body>

</html>
