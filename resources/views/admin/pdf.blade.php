<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table style="font-size: 12px; border: 1px double #433e1d; padding: 5px; width: 80%; height:90%" cellspacing="2"
        cellpadding="2" align="center">
        <tbody>
            <tr>
                <td>
                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td style="width: 30%; background: #ffffff; padding: 2px; text-align: center;">
                                    <img style="object-fit: contain;" src="{{ public_path('admin/logo.png') }}"
                                        height="90" />
                                </td>
                                <td style="width: 70%; font-size: 18px; color: #000; padding: 2px; text-align: right;">
                                    <div>Date: {{ \Carbon\Carbon::parse($guests->datetime)->format('d-m-Y') }}</div>
                                    <div>GRC No: {{ $guests->id }}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px;" valign="top">
                    <table border="0" width="100%" cellspacing="2" cellpadding="2">
                        <tbody>
                            <tr>
                                <td
                                    style="font-weight: 500; font-size: 18px; text-align: center; color: #000000; padding-bottom: 8px;">
                                    ViceRoy Form B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="2" cellpadding="2">
                                        <tbody>
                                            <tr>
                                                <td valign="top">
                                                    <table width="100%" cellspacing="2" cellpadding="2">
                                                        <tbody>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td style="border-right: #ebebeb solid 1px; border-bottom: 1px solid #ebebeb; padding: 10px;"
                                                                    width="30%">
                                                                    <strong>Guest Details:</strong>
                                                                </td>
                                                                <td style="padding: 5px; border-bottom: 1px solid #ebebeb;"
                                                                    width="70%"></td>
                                                            </tr>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td
                                                                    style="border-bottom: 1px solid #ebebeb; border-right: #ebebeb solid 1px; padding: 10px;">
                                                                    <strong>Name</strong>
                                                                </td>
                                                                <td
                                                                    style="padding: 5px; border-bottom: 1px solid #ebebeb;">
                                                                    {{ $guests->firstname . ' ' . $guests->lastname }}
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td
                                                                    style="border-bottom: 1px solid #ebebeb; border-right: #ebebeb solid 1px; padding: 10px;">
                                                                    <strong>Nationality</strong>
                                                                </td>
                                                                <td
                                                                    style="padding: 5px; border-bottom: 1px solid #ebebeb;">
                                                                    {{ $guests->nationality }}
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td
                                                                    style="border-right: #ebebeb solid 1px; border-bottom: 1px solid #ebebeb; padding: 10px;">
                                                                    <strong>Passport Details</strong>
                                                                </td>
                                                                <td
                                                                    style="padding: 5px; border-bottom: 1px solid #ebebeb;">
                                                                    {{ $guests->passportno . ',' . \Carbon\Carbon::parse($guests->dateofissue)->format('d-m-Y') . ',' . $guests->placeofissue }}
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td
                                                                    style="border-right: #ebebeb solid 1px; border-bottom: 1px solid #ebebeb; padding: 10px;">
                                                                    <strong>Address In India</strong>
                                                                </td>
                                                                <td
                                                                    style="padding: 5px; border-bottom: 1px solid #ebebeb;">
                                                                    {{ $guests->address }}
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td
                                                                    style="border-right: #ebebeb solid 1px; border-bottom: 1px solid #ebebeb; padding: 10px;">
                                                                    <strong>Date Of Arrival To India</strong>
                                                                </td>
                                                                <td
                                                                    style="padding: 5px; border-bottom: 1px solid #ebebeb;">
                                                                    {{ \Carbon\Carbon::parse($guests->dateofarrival)->format('d-m-Y') }}
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td style="border-right: #ebebeb solid 1px; border-bottom: 1px solid #ebebeb; padding: 10px;"
                                                                    width="30%">
                                                                    <strong>Employeed In India?</strong>
                                                                </td>
                                                                <td
                                                                    style="padding: 5px; border-bottom: 1px solid #ebebeb;">
                                                                    {{ $guests->employeed }}
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td style="border-right: #ebebeb solid 1px; border-bottom: 1px solid #ebebeb; padding: 10px;"
                                                                    width="30%">
                                                                    <strong>Duration Of Stay</strong>
                                                                </td>
                                                                <td
                                                                    style="padding: 5px; border-bottom: 1px solid #ebebeb;">
                                                                    {{ $guests->durationofstay }}
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td
                                                                    style="border-right: #ebebeb solid 1px; border-bottom: 1px solid #ebebeb; padding: 10px;">
                                                                    <strong>User Signature</strong>
                                                                </td>
                                                                <td
                                                                    style="padding: 5px; border-bottom: 1px solid #ebebeb;">
                                                                    <img src="{{ public_path('storage/' . $guests->signature_image_url) }}"
                                                                        height="150" />
                                                                </td>
                                                            </tr>
                                                            <tr style="color: #484848; font-size: 16px;">
                                                                <td
                                                                    style="border-right: #ebebeb solid 1px; border-bottom: 1px solid #ebebeb; padding: 10px;">
                                                                    <strong>Manager Signature</strong>
                                                                </td>
                                                                <td
                                                                    style="padding: 5px; border-bottom: 1px solid #ebebeb;">
                                                                    <img src="{{ public_path('storage/' . $guests->manager_signature_image_url) }}"
                                                                        height="150" />
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
