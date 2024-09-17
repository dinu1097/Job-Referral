<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Referrer Details</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('navbar')    
@include('Referrer.navbar')
    <div class="container mt-5">
        <h2 class="mb-4">Referrer Details</h2>

        <!-- Referrer Information -->
        <div class="card mb-4">
            <div class="card-header">
                Referrer Information
            </div>
            <div class="card-body">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text"><strong>Email:</strong> john.doe@example.com</p>
                <p class="card-text"><strong>Contact Number:</strong> (555) 123-4567</p>
                <p class="card-text"><strong>Position:</strong> Senior Referrer</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
