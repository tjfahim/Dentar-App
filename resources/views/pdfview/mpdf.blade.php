<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali&display=swap" rel="stylesheet">
    <title>Prescription Design</title>
    <style>
    
     @font-face {
            font-family: "kalpurush";
            font-style: normal;
            font-weight: normal;
            src: url('fonts/kalpurush.ttf') format('truetype');
        } 
        
        *{
    font-family: "kalpurush";
}
        body {
            /* background-color: #f7fafc; */
            padding: 2.5rem 0;
            /*font-family: Arial, sans-serif;*/
            /*font-family: 'Noto Sans Bengali', Arial, sans-serif;*/
             font-family: 'Noto Sans Bengali', 'Arial Unicode MS', 'SolaimanLipi', 'Vrinda', 'Kalpurush', Arial, sans-serif;
        }
        .container {
            max-width: 40rem;
            margin: auto;
            background: white;
            padding: 1.5rem;
            /* border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
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
        .note span {
            font-size: 0.75rem; /* or 12px */
            line-height: 1.4;
            display: block;
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

        @page {
            footer: page-footer;
            margin-bottom: 50px; /* Adjust space as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <table width="100%" style="margin-bottom: 20px;">
            <tr>
                <!-- Logo on the left -->
                <td style="width: 50%; vertical-align: middle; padding: 10px;">
                    <img src="{{ public_path('logo.jpg') }}" style="height: 80px; width: 200px;">
                </td>
        
                <!-- "Prescription" text on the right -->
                <td style="width: 50%; text-align: right; vertical-align: middle; padding: 10px;">
                    <span style="font-size: 24px; font-weight: bold;">Prescription</span>
                </td>
            </tr>
        </table>
        
        

    

            <table style="border: none; margin-bottom: 20px;">
                <tr>
                    <td>Name</td>
                    <td>{{ $patient->name ?? '' }}</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{ $patient->age ?? '' }}</td>
                </tr>
                 <tr>
                    <td>Weight</td>
                    <td>{{ $patient->weight ?? '' }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{ $patient->gender ?? '' }}</td>
                </tr>
                <tr>
                    <td>Problem Title</td>
                    <td>{{ $patient->problem_title ?? '' }}</td>
                </tr>
            </table>
          
        <table border="1" cellpadding="6" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Medicine (ওষুধ)</th>
                    <th>
                        <table width="100%">
                            <tr>
                                <td colspan="3" style="border-bottom: 1px solid black; text-align: center; padding-bottom: 5px;">
                                    Guideline
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 33%; text-align: left;">Dose</td>
                                <td style="width: 34%; text-align: center;">Male</td>
                                <td style="width: 33%; text-align: right;">Duration</td>
                            </tr>
                        </table>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr style="padding: 20px">
                       
                        <td>
                            <span>01</span> <span> {{ $item->name }}</span>
                        </td>
                        <td>
                            <table width="100%">
                                <tr>
                                    <td style="width: 33%; text-align: left;">
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
                                    </td>
                                    <td style="width: 34%; text-align: center;">{{ $item->meal }}</td>
                                    <td style="width: 33%; text-align: right;">{{ $item->duration }} Days</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                 @endforeach
              
            </tbody>
            
        </table>


       

        <div class="note">
            <span><strong>Note:</strong>  {!! $prescription->note !!}</span>
        </div>
        
       
       
    </div>

    <htmlpagefooter name="page-footer">
        <div style="font-size: 12px; text-align: center; border-top: 1px solid #ccc; padding-top: 8px;">
            <strong>Name:</strong>  {{ $doctor->name }} &nbsp;&nbsp; 
            <strong>License No:</strong> {{ $doctor->bmdc_number }} &nbsp;&nbsp;
            <strong>Date:</strong> {{ \Carbon\Carbon::parse($prescription->created_at)->format('d M Y') }}
        </div>
    </htmlpagefooter>
</body>
</html>