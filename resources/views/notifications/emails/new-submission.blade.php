{{-- New submission email template --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New submission</title>
    <style>
        body {
            color: #333333;
            background: #efefef;
        }

        table {
            width: 600px;
            max-width: 100%;
            border-collapse: collapse;
            border: none;
            background-color: #ffffff;
        }

        table tr,
        table th,
        table td {
            border-collapse: collapse;
            border: none;
        }

        table th,
        table td {
            padding: 6px;
        }

        table th {
            text-align: left;
        }

        table td strong {
            color: rgb(0, 54, 95);
        }
    </style>
</head>
<body>
    <table width="600px" border="0">
        <thead>
            <th colspan="2">A new user has filled out the form with the following information:</th>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <th width='30%'>Membership</th>
                <td width='70%'><strong>{{ strtoupper($membership) }}</strong></td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ ucwords($firstname .' ' .$lastname) }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td><a href='mailto:{{ $email }}'>{{ $email }}</a></td>
            </tr>
            <tr>
                <th>Phone number</th>
                <td><a href="tel:{{ $phone_number }}">{{ $phone_number }}</a></td>
            </tr>
            <tr>
                <th>Place of residence</th>
                <td>{{ $residence }}</td>
            </tr>
            <tr>
                <th>Unit number</th>
                <td>{{ $unit_number }}</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <p>
                        Please take the necessary action and update our records accordingly.<br>

                        Best regards,
                    </p>
                </td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
