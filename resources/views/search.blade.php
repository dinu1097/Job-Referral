<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('navbar')
    <div class="container mt-5">
        <h2>Search Results</h2>
        <div class="row">
            @forelse($jobSeekers as $jobSeeker)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $jobSeeker->full_name }}</h5>
                            <p class="card-text">{{ $jobSeeker->current_job_title }} - {{ $jobSeeker->industry }}</p>
                            <a href="{{ route('profile.view', $jobSeeker->id) }}" class="btn btn-primary">View Profile</a>
                            <a href="{{ route('refer', $jobSeeker->id) }}" class="btn btn-secondary">Refer</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No job seekers found.</p>
                </div>
            @endforelse
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
