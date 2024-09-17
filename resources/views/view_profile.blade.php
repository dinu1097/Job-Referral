<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('navbar')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $profile->full_name }}'s Profile</h4>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p>{{ $profile->email }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Phone Number:</strong>
                        <p>{{ $profile->phone_number }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Current Job Title:</strong>
                        <p>{{ $profile->current_job_title }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Industry:</strong>
                        <p>{{ $profile->industry }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Experience (Years):</strong>
                        <p>{{ $profile->experience_years }}</p>
                    </div>

                    <div class="mb-3">
                    <strong>Skills:</strong>
                    <ul>
                        @foreach($profile->skills as $skill)
                            <li>{{ is_array($skill) ? implode(', ', $skill) : $skill }}</li>
                        @endforeach
                    </ul>
                    </div>

                    <div class="mb-3">
                        <strong>Education:</strong>
                        <ul>
                            @foreach($profile->education as $education)
                                <li>{{ is_array($education) ? implode(', ', $education) : $education }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-3">
                        <strong>Location:</strong>
                        <p>{{ $profile->location }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Expected Salary:</strong>
                        <p>${{ number_format($profile->expected_salary, 2) }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Availability:</strong>
                        <p>{{ $profile->availability }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Resume:</strong>
                        <p><a href="{{ Storage::url($profile->resume) }}" target="_blank">Download Resume</a></p>
                    </div>

                    <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
