<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #007bff;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
        }
        .navbar-custom .navbar-brand:hover,
        .navbar-custom .nav-link:hover {
            color: #e0e0e0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="{{ route('home') }}">JobReferralSystem</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                @if (auth()->user()->role === 'job_seeker')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.create') }}">Profile</a>
                    </li>
                @endif
                    <li class="nav-item">
                        <a class="nav-link" href="">Role: {{ auth()->user()->role }}</a>
                    </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('search') }}">Marketplace</a>
                </li>
                
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('chatbox') }}">Chat</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('referrer.request-referrals') }}">Request Referrals</a>
                </li>
                <li class="nav-item">
                    @php
                        // Get the count of referrals for the authenticated referrer
                        $jobSeekerProfileCount = \App\Models\JobSeekerProfile::join('referrals', 'job_seeker_profiles.id', '=', 'referrals.job_seeker_profile_id')
                            ->where('referrals.referrer_id', Auth::id())
                            ->count();
                    @endphp
                    <a class="nav-link" href="{{ route('jobseekers.applications') }}">
                        Connection Requests <span class="badge badge-light">{{ $jobSeekerProfileCount }}</span>
                    </a>
                </li>
                    @if (auth()->user()->role === 'referrer')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('referrer.create') }}">Profile</a>
                    </li>
                    @endif
                @endauth
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Referrals
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('refer') }}">Refer a Job Seeker</a>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">My Referrals</a>
                    </div>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('search') }}">Search</a>
                </li> -->
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('signup') }}">Signup</a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
