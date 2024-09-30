<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakerSphere Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <style>
        /* Custom footer styles */
        .footer {
            background-color: #1e72c7; /* Dark background color */
            color: white; /* Text color */
            text-align: center; /* Center align text */
            position: fixed; /* Fixed position */
            bottom: 0; /* Stick to the bottom */
            width: 100%; /* Full width */
            z-index: 9999; /* Ensure footer appears above other elements */
        }
    </style>
</head>
<body style="background: black;">
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}" style="color: white;">
                <img src="{{asset('logo/img/logo.jpg')}}" alt="" style="height: 35px; width: 35px; border-radius: 50%; margin-right: 10px;">
                <span>SneakerSphere</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('services')}}" style="color: white;">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('developers')}}" style="color: white;">Developers</a>
                    </li>
                </ul>
    
                <div class="navbar-text ms-md-4 me-md-2 d-flex align-items-center">
                    <a class="btn btn-outline-dark" href="{{ route('mycart') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                        <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                    </a>
                    
                    <a class="btn btn-outline-dark ms-2" href="{{ route('history') }}">
                        <i class="fa fa-history" aria-hidden="true"></i> History
                    </a>
                
                    <form action="{{route('logout')}}" method="POST" class="ms-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-light"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                    </form>
                </div>
                
            </div>
        </div>
    </nav>
<div class="container mt-4" style="color: white;">
    <h2 class="mb-3 text-center">Welcome to SneakerSphere!</h2>
    <p class="text-center">Select your favorite shoes and buy them now!</p>
    <br>
    @if(Session::has('success'))
    <div class="form-value text-center" style="color: green;">
       <h5 class="form-value">{{ Session::get('success') }}</h5>
    </div>
    <br>
    @endif
    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <p class="mt-3">&copy; 2024 Sneakersphere. All Rights Reserved.</p>
    </div>
</footer>

@yield('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
