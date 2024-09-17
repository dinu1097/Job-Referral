<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('navbar')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit {{ $profile->full_name }}'s Profile</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('profile.edit.post', $profile->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="full_name"><strong>Full Name:</strong></label>
                            <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $profile->full_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email"><strong>Email:</strong></label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $profile->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number"><strong>Phone Number:</strong></label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $profile->phone_number }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="current_job_title"><strong>Current Job Title:</strong></label>
                            <input type="text" name="current_job_title" id="current_job_title" class="form-control" value="{{ $profile->current_job_title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="industry"><strong>Industry:</strong></label>
                            <input type="text" name="industry" id="industry" class="form-control" value="{{ $profile->industry }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="experience_years"><strong>Experience (Years):</strong></label>
                            <input type="number" name="experience_years" id="experience_years" class="form-control" value="{{ $profile->experience_years }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="skills"><strong>Skills:</strong></label>
                            <input type="text" name="skills" id="skills" class="form-control" value="{{ implode(', ', $profile->skills) }}" required>
                            <small class="form-text text-muted">Separate skills with commas.</small>
                        </div>

                        <div class="mb-3">
                            <label for="education"><strong>Education:</strong></label>
                            <input type="text" name="education" id="education" class="form-control" value="{{ implode(', ', $profile->education) }}" required>
                            <small class="form-text text-muted">Separate education entries with commas.</small>
                        </div>

                        <div class="mb-3">
                            <label for="location"><strong>Location:</strong></label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ $profile->location }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="expected_salary"><strong>Expected Salary:</strong></label>
                            <input type="number" name="expected_salary" id="expected_salary" class="form-control" value="{{ $profile->expected_salary }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="availability"><strong>Availability:</strong></label>
                            <input type="text" name="availability" id="availability" class="form-control" value="{{ $profile->availability }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="resume"><strong>Resume:</strong></label>
                            <input type="file" name="resume" id="resume" class="form-control-file">
                            <small class="form-text text-muted">Upload a new resume if you want to replace the current one.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('profile.view', $profile->id) }}" class="btn btn-secondary">Cancel</a>
                    </form>
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
