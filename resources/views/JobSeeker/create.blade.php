<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('navbar')
    @include('JobSeeker.navbar')
    <div class="container mt-5">
        <h2>Create Job Seeker Profile</h2>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Display form errors -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('profile.create.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Full Name -->
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <!-- Phone Number -->
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number">
        </div>

        <!-- Current Job Title -->
        <div class="form-group">
            <label for="current_job_title">Current Job Title</label>
            <input type="text" class="form-control" id="current_job_title" name="current_job_title">
        </div>

        <!-- Industry -->
        <div class="form-group">
            <label for="industry">Industry</label>
            <input type="text" class="form-control" id="industry" name="industry">
        </div>

        <!-- Years of Experience -->
        <div class="form-group">
            <label for="experience_years">Years of Experience</label>
            <input type="number" class="form-control" id="experience_years" name="experience_years">
        </div>

        <!-- Skills -->
        <div class="form-group">
            <label for="skills">Skills (comma-separated)</label>
            <input type="text" class="form-control" id="skills" name="skills">
        </div>

        <!-- Education -->
        <div class="form-group">
            <label for="education">Education (comma-separated)</label>
            <input type="text" class="form-control" id="education" name="education">
        </div>

        <!-- Location -->
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>

        <!-- Current Salary -->
        <div class="form-group">
            <label for="current_salary">Current Salary</label>
            <input type="number" class="form-control" id="current_salary" name="current_salary" placeholder="Enter your current salary">
        </div>

        <!-- Expected Salary -->
        <div class="form-group">
            <label for="expected_salary">Expected Salary</label>
            <input type="number" class="form-control" id="expected_salary" name="expected_salary">
        </div>

        <!-- Willing to Relocate -->
        <div class="form-group">
            <label for="willing_to_relocate">Willing to Relocate?</label>
            <select class="form-control" id="willing_to_relocate" name="willing_to_relocate">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <!-- Availability -->
        <div class="form-group">
            <label for="availability">Availability</label>
            <input type="text" class="form-control" id="availability" name="availability">
        </div>

        <!-- LinkedIn Profile -->
        <div class="form-group">
            <label for="linkedin_profile">LinkedIn Profile URL</label>
            <input type="url" class="form-control" id="linkedin_profile" name="linkedin_profile" placeholder="Enter your LinkedIn profile URL">
        </div>

        <!-- GitHub Profile -->
        <div class="form-group">
            <label for="github_profile">GitHub Profile URL</label>
            <input type="url" class="form-control" id="github_profile" name="github_profile" placeholder="Enter your GitHub profile URL">
        </div>

        <!-- LeetCode Profile -->
        <div class="form-group">
            <label for="leetcode_profile">LeetCode Profile URL</label>
            <input type="url" class="form-control" id="leetcode_profile" name="leetcode_profile" placeholder="Enter your LeetCode profile URL">
        </div>

        <!-- Portfolio Website -->
        <div class="form-group">
            <label for="portfolio_website">Portfolio Website URL</label>
            <input type="url" class="form-control" id="portfolio_website" name="portfolio_website" placeholder="Enter your portfolio website URL">
        </div>

        <!-- Highest Degree -->
        <div class="form-group">
            <label for="highest_degree">Highest Degree</label>
            <input type="text" class="form-control" id="highest_degree" name="highest_degree" placeholder="Bachelors, Masters, PhD, etc.">
        </div>

        <!-- Institution -->
        <div class="form-group">
            <label for="institution">Institution</label>
            <input type="text" class="form-control" id="institution" name="institution" placeholder="Enter your institution">
        </div>

        <!-- GPA/Grade -->
        <div class="form-group">
            <label for="gpa">GPA/Grade</label>
            <input type="text" class="form-control" id="gpa" name="gpa" placeholder="Enter your GPA or grade">
        </div>

        <!-- Languages -->
        <div class="form-group">
            <label for="languages">Languages (comma-separated)</label>
            <input type="text" class="form-control" id="languages" name="languages" placeholder="English, Spanish, French">
        </div>

        <!-- Certifications -->
        <div class="form-group">
            <label for="certifications">Certifications (comma-separated)</label>
            <input type="text" class="form-control" id="certifications" name="certifications" placeholder="AWS, PMP, etc.">
        </div>

        <!-- Resume -->
        <div class="form-group">
            <label for="resume">Resume (PDF only)</label>
            <input type="file" class="form-control" id="resume" name="resume" accept=".pdf">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Profile</button>
    </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
