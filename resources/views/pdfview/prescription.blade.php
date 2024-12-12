<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Design</title>
    <style>
        body {
            background-color: #f7fafc;
            padding: 2.5rem 0;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 40rem;
            margin: auto;
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo-circle {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background: #48bb78;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.125rem;
        }
        .info {
            margin-bottom: 1rem;
        }
        .info div {
            display: flex;
            align-items: center;
            margin-top: 0.5rem;
        }
        .info div span {
            margin-right: 1rem;
        }
        .info div input[type="checkbox"] {
            margin-left: 0.5rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        th, td {
            border: 1px solid #e2e8f0;
            padding: 0.5rem;
            text-align: left;
        }
        th {
            background: #edf2f7;
        }
        .note {
            margin-top: 1rem;
            border-top: 1px solid #e2e8f0;
            padding-top: 0.5rem;
        }
        .footer {
            margin-top: 1.5rem;
            font-size: 0.875rem;
        }
        .footer button {
            margin-top: 1rem;
            background: #3182ce;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <div class="logo-circle">DB</div>
                <h1 style="margin-left: 0.5rem; font-weight: bold; font-size: 1.125rem;">DENTER</h1>
            </div>
        </div>

        <!-- Patient Info -->
        <div class="info">
            <div>
                <span>Name:</span>
                <div style="flex-grow: 1; border-bottom: 1px solid #e2e8f0;"></div>
            </div>
            <div>
                <span>Address:</span>
                <div style="flex-grow: 1; border-bottom: 1px solid #e2e8f0;"></div>
            </div>
            <div>
                <span>Age:</span>
                <div style="width: 4rem; border-bottom: 1px solid #e2e8f0; margin-right: 1rem;"></div>
                <span>Male</span>
                <input type="checkbox">
                <span>Female</span>
                <input type="checkbox" checked>
            </div>
        </div>

        <!-- Table -->
         <table style="border: 1px solid #e2e8f0;">
            <thead>
                <tr>
                    <th>Description</th>
                    <th style="text-align: center; padding: 20px;">
                        <div style="border-bottom: 1px solid black; padding-bottom: 5px">Guideline</div>
                        <div style="clear: both;"> <!-- Clear float after the guideline row -->
                            <div style="float: left; width: 33%;">Dose</div>
                            <div style="float: left; width: 33%; text-align: center;">Male</div>
                            <div style="float: left; width: 33%; text-align: right;">Duration</div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody style="">
                @foreach ($data as $item)
                    <tr style="padding: 20px">
                        <td style="border: none;">
                            <span>01</span> <span> {{ $item->name }}</span>
                        </td>
                        <td style="clear: both;"> <!-- Clear float after each row -->
                            <div style="float: left; width: 33%; text-align: center;">
                                @php
                                   $doses = json_decode($item->dose);

                                @endphp
                                @foreach ($doses as $key =>  $dose)
                                    @if ($key === 0)
                                        {{ $dose }}
                                        @continue
                                    @endif
                                    + {{ $dose }}
                                @endforeach
                            </div>
                            <div style="float: left; width: 33%; text-align: center;">{{ $item->meal }}</div>
                            <div style="float: left; width: 33%; text-align: center;">{{ $item->duration }} Days</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th style="text-align: center">
                        <div style="border-bottom: 1px solid black; padding-bottom: 5px">Guideline</div>
                        <div style="clear: both;"> <!-- Clear float after the guideline row -->
                            <div style="float: left; width: 33%;">Dose</div>
                            <div style="float: left; width: 33%; text-align: center;">Male</div>
                            <div style="float: left; width: 33%; text-align: right;">Duration</div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>

                    <tr style="padding: 10px">
                        <td style="">
                            <span>01</span> <span> Namap</span>
                        </td>
                        <td style="clear: both;"> <!-- Clear float after each row -->
                            <div style="float: left; width: 33%;">1+0+1</div>
                            <div style="float: left; width: 33%; text-align: center;">Before</div>
                            <div style="float: left; width: 33%; text-align: right;">10 Days</div>
                        </td>

                    </tr>
                    <tr style="padding: 10px">
                        <td style="">
                            <span>01</span> <span> Namap</span>
                        </td>
                        <td style="clear: both;"> <!-- Clear float after each row -->
                            <div style="float: left; width: 33%;">1+0+1</div>
                            <div style="float: left; width: 33%; text-align: center;">Before</div>
                            <div style="float: left; width: 33%; text-align: right;">10 Days</div>
                        </td>

                    </tr>

            </tbody>
        </table> --}}


        <!-- Note -->
        <div class="note">
            <span>Note:</span>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Dr. Abdullah</p>
            <p>License No: 1234</p>
            <p>DD/MM/YY</p>
            <button>Send</button>
        </div>
    </div>
</body>
</html>
