<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Privacy Policy</title>
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
        .policy-container {
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

        /* Success Message Styling */
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10 col-lg-8 policy-container">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Title -->
                <h1>Edit Privacy Policy</h1>

                <!-- Form to Edit Privacy Policy -->
                <form action="{{ route('privacy-policy.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Policy Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $policy->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Policy Description</label>
                        <textarea id="description" name="description" class="form-control" rows="10" required>{{ old('description', $policy->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Policy</button>
                </form>

                <!-- Display Privacy Policy -->
                <!--<div class="mt-5">-->
                <!--    <h2>{{ $policy->title }}</h2>-->
                <!--    <p>{!! nl2br(e($policy->description)) !!}</p>-->
                <!--</div>-->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (Optional, for Bootstrap components that require JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
