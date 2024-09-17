<style>
        .navbar-color {
            background-color: #ffffff; /* White background */
        }
        .navbar-nav .nav-link {
            color: #000000; /* Black text color */
        }
        .navbar-nav .nav-link:hover {
            color: #007bff; /* Blue color on hover */
        }
    </style>
<nav class="navbar navbar-color navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('referrer.create') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        @php
                            // Get the count of referrals for the authenticated referrer
                            $jobSeekerProfileCount = \App\Models\JobSeekerProfile::join('referrals', 'job_seeker_profiles.id', '=', 'referrals.job_seeker_profile_id')
                                ->where('referrals.referrer_id', Auth::id())
                                ->count();
                        @endphp
                        <a class="nav-link" href="{{ route('jobseekers.applications') }}">
                            Connection Request <span class="badge badge-primary">{{ $jobSeekerProfileCount }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('referrer.show') }}">Show Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>