<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Requests List</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('navbar')
@include('Referrer.navbar')
<div class="container">
        <h1>Job Seekers Applied to Your Company</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
        @endif
        @if($jobSeekerProfiles->isEmpty())
            <p>No job seekers have applied to your company yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Current Job Title</th>
                        <!-- <th>Skills</th> -->
                        <th>Referral Status</th>
                        <th>Application Date</th>
                        <th>Edit Status</th> 
                        <th>Chat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobSeekerProfiles as $profile)
                        <tr>
                            <td>{{ $profile->full_name }}</td>
                            <td>{{ $profile->email }}</td>
                            <td>{{ $profile->phone_number }}</td>
                            <td>{{ $profile->current_job_title }}</td>

                            <td>{{ ucfirst($profile->referral_status) }}</td>  
                            <td>{{ $profile->referral_date }}</td>  
                            <td>
                                <!-- Form to update status -->
                                <form action="{{ route('jobseeker.updateStatus') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="referral_id" value="{{ $profile->referral_id }}">
                                    <select name="status" class="form-control">
                                        <option value="accepted" {{ $profile->referral_status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                        <option value="pending" {{ $profile->referral_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="declined" {{ $profile->referral_status == 'declined' ? 'selected' : '' }}>Declined</option>
                                    </select>


                                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </form>
                            </td>
                            <td>
                                @if($profile->referral_status === 'accepted')
                                    <form action="{{ route('chat.select') }}" method="POST">
                                        @csrf
                                        <!-- Pass the referrer's user ID as selected_user -->
                                        <input type="hidden" name="selected_user" value="{{ $profile->user_id }}">
                                        <button type="submit" class="btn btn-secondary">
                                            Chat
                                        </button>
                                    </form>
                                @else
                                    <span>N/A</span> <!-- No chat option if not accepted -->
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
