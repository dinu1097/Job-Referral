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
@include('JobSeeker.navbar')
<div class="container">
        <h1>Your Referral Requests</h1>

        @if($jobSeekerRequests->isEmpty())
            <p>You haven't sent any requests yet.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Referrer Name</th>
                        <th>Status</th>
                        <th>Application Date</th>
                        <th>Referral Message</th>
                        <th>Chat</th> <!-- New column for Chat button -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobSeekerRequests as $request)
                        <tr>
                            <td>{{ $request->company->name ?? 'N/A' }}</td> <!-- Assuming company relationship -->
                            <td>{{ $request->referrerProfile->name ?? 'N/A' }}</td> <!-- Assuming referrer relationship -->
                            <td>{{ ucfirst($request->status) }}</td> <!-- Capitalize status -->
                            <td>{{ $request->created_at->format('d M Y') }}</td> <!-- Format date -->
                            <td>{{ $request->referral_message }}</td>

                            <!-- Chat button visible only if the status is 'accepted' -->
                            <td>
                                @if($request->status === 'accepted')
                                    <form action="{{ route('chat.select') }}" method="POST">
                                        @csrf
                                        <!-- Pass the referrer's user ID as selected_user -->
                                        <input type="hidden" name="selected_user" value="{{ $request->referrerProfile->user_id }}">
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
