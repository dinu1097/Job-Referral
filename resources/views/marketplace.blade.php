<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('navbar')
    <div class="container mt-5">
        <h2>Job Seeker Marketplace</h2>
        <form action="{{ route('search') }}" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="category" placeholder="Category">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="location" placeholder="Location">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="experience_years" placeholder="Experience Years">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="skills" placeholder="Skills">
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
        <div class="mt-4">
            @if($jobSeekerProfiles->isEmpty())
                <p>No profiles found.</p>
            @else
                @foreach($jobSeekerProfiles as $jobSeeker)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $jobSeeker->full_name }}</h5>
                            <p class="card-text">{{ $jobSeeker->current_job_title }} - {{ $jobSeeker->industry }}</p>
                            <a href="{{ route('profile.view', $jobSeeker->id) }}" class="btn btn-primary">View Profile</a>
                            <form action="{{ route('chat.select') }}" method="POST">
                                @csrf
                                <input type="hidden" name="selected_user" value="{{ $jobSeeker->user_id }}">
                                <button type="submit" class="btn btn-secondary">
                                    Chat
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
