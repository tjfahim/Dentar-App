<!DOCTYPE html>
<html>
<head>
    <title>Account Created Successfully</title>
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
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        a {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
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

        <p>I hope this message finds you well.</p>

        <p>We are pleased to inform you that your account has been created successfully!</p>

        <p>Your registered email address is: <strong>{{ $user->email }}</strong></p>

        <p>Your One-Time Password (OTP) for email verification is: <strong>{{ $otp }}</strong></p>

        {{-- <p>Please click the button below to verify your email address:</p>
        <p><a href="{{ route('verifyOtpApi', ['email' => $user->email, 'otp' => $otp]) }}">Verify Email Address</a></p> --}}

        <p>If you have any questions or need assistance, please feel free to reach out.</p>

        <p>Thank you for your time and consideration.</p>

        <div>
            <p>Best regards,<br>Fuji</p>
        </div>
    </div>
</body>
</html>
