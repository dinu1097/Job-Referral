<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Big Companies</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card {
      display: flex;
      flex-direction: row;
      align-items: center;
      padding: 15px;
    }
    .card img {
      width: 120px;
      height: 120px;
      object-fit: contain;
      margin-right: 20px;
    }
    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
  </style>
</head>
<body>
@include('navbar')

<div class="container mt-5">
  <h2 class="mb-4 text-center">Big Companies</h2>

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

  
  <div class="row">
  @foreach($companies as $company)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <!-- Dummy image instead of logo -->
            <img src="https://via.placeholder.com/120" alt="{{ $company->name }}">
            
            <div class="card-body">
                <!-- Display company name -->
                <h5 class="card-title">{{ $company->name }}</h5>
                
                <!-- Display company description -->
                <p class="card-text">{{ $company->description }}</p>
                
                <!-- Apply Button -->
                <form action="{{ route('company.apply-referrals') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $company->id }}" name="company_id">
                    <button type="submit" class="btn btn-primary">Apply</button>
                </form>
            </div>
        </div>
    </div>
@endforeach

  </div>
</div>




<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
