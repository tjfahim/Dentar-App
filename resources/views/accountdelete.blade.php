<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Deletion</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        /* Full-width container with padding */
        .account-delete-container {
            padding: 40px 20px;
            background-color: #ffffff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        /* Title */
        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        /* Paragraph */
        p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.7;
        }

        /* Form Styling */
        .form-group input {
            font-size: 1.1rem;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .form-group button {
            padding: 10px 20px;
            font-size: 1.2rem;
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 5px;
        }

        /* Media query for mobile view */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10 col-lg-8 account-delete-container">
                <!-- Title -->
                <h1>Account Deletion</h1>

                <!-- Instructions -->
                <p>
                    Do you want to delete your TapTask Account? <br>
                    If yes, then please proceed by entering your registered email address below.
                </p>

                <!-- Form for Email Input -->
                <form action="{{ route('accountdeletesubmit') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="email">Enter Your Registered Email:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                    
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Delete My Account</button>
                        </div>
                </form>

                <!-- Optional: Cancel/Delete Actions (can navigate to previous page or home page) -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (Optional, for Bootstrap components that require JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
