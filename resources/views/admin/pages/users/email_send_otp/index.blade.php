<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your OTP Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #333;
            font-size: 24px;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            padding: 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            display: inline-block;
            margin: 20px 0;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello {{ $user->name }},</h1>

        <p>We are sending you this email to verify your identity.</p>

        <p>Your One-Time Password (OTP) is:</p>
        <div class="otp">{{ $otp }}</div>

        <p>Please enter this OTP to complete your verification.</p>

        <p>If you did not request this, please ignore this email.</p>

        <div class="footer">
            <p>Thank you for your time!<br>DERTER PRO</p>
        </div>
    </div>
</body>
</html>
