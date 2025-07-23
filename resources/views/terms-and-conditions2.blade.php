<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
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
        .terms-container {
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
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 terms-container">
                <!-- Title -->
                <h1>Terms and Conditions</h1>

               

                <!-- Form to Update Terms and Conditions -->
                <form method="POST" action="{{ route('terms-and-conditions.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $terms->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="5" required>{{ $terms->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Terms and Conditions</button>
                </form>
                
                 <!-- Display Terms and Conditions -->
                <!--<div class="mb-4">-->
                <!--    <h2>{{ $terms->title }}</h2>-->
                <!--    <p>{{ $terms->description }}</p>-->
                <!--</div>-->

                <!-- Display Success Message -->
                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
