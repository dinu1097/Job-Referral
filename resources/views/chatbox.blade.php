<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Chat Page</title>
  <style>
    .chat-list {
      max-height: 80vh;
      overflow-y: auto;
    }
    .chat-window {
      height: 80vh;
      overflow-y: auto;
      border: 1px solid #dee2e6;
    }
    @font-face {
        font-family: 'Akira Expanded';
        src: url('../Fonts/fonnts.com-Domus_Titling.otf') format('opentype');
        font-weight: normal;
        font-style: normal;
    }
    h1, h2, h3, h4, h5, h6, p, a, strong {
        font-family: 'Akira Expanded', sans-serif;
    }
  </style>
</head>
<body>
@include('navbar')
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group chat-list">
          @foreach ($recentChats as $user)
            <form action="{{ route('chat.select') }}" method="POST">
              @csrf
              <button type="submit" name="selected_user" value="{{ $user->user_id }}" class="list-group-item list-group-item-action">
                Chat with {{ $user->name }} ({{ $user->role }})
              </button>
            </form>
          @endforeach
        </div>
      </div>
      <div class="col-md-8" style="display:none;">
        @if ($selectedUser)
          <div class="chat-window p-3">
            <div class="mb-3">
              <h5>Chat with {{ $selectedUser->name }} ({{ $selectedUser->role }})</h5>
            </div>
            @foreach ($chats as $chat)
              <div class="chat-message">
                <strong>{{ $chat->sender_id === Auth::id() ? 'You' : 'User ' . $chat->sender_id }}:</strong> {{ $chat->message }}
              </div>
            @endforeach
          </div>
          <form action="{{ route('chat.send') }}" method="POST" class="mt-3">
            @csrf
            <!-- {{ $selectedUser->user_id }} -->
            <input type="hidden" name="receiver_id" value="{{ $selectedUser->id }}">
            <div class="input-group">
              <input type="text" name="message" class="form-control" placeholder="Type a message" required>
              <button class="btn btn-primary" type="submit">Send</button>
            </div>
          </form>
        @else
          <p>Select a user to start chatting.</p>
        @endif
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
