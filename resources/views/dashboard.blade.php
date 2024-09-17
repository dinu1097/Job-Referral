<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('navbar')
    <div class="container mt-5">
        <h2>Referrer Dashboard</h2>
        <div class="list-group">
            @foreach($referrals as $referral)
                <a href="{{ route('chat', $referral->job_seeker_id) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $referral->jobSeeker->full_name }}</h5>
                    <p class="mb-1">{{ $referral->message }}</p>
                    <small>Referred on {{ $referral->created_at->format('d-m-Y') }}</small>
                </a>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
