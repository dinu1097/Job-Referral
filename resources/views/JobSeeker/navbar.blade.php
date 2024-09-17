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
                        <a class="nav-link" href="{{ route('JobSeeker.create') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobseeker.requests') }}">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('JobSeeker.show') }}">Show Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>