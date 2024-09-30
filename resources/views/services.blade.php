<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('cssfile/services.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .section {
            text-align: center;
            padding: 50px 20px;
        }

        .title h1 {
            margin-bottom: 20px;
        }

        .services {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            background: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            text-align: center;
            width: 300px;
        }

        .icon {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .card {
                width: 80%;
            }
        }
    </style>
</head>
<body>
    @include('nav')
    <div class="section">
        <div class="title">
            <h1>Our Services</h1>
        </div>
        <div class="services">
            <div class="card">
                <div class="icon">
                    <ion-icon name="pricetag-outline"></ion-icon>
                </div>
                <h2>Student Discounts Inside Campus</h2>
                <p>Offer exclusive discounts for students with a valid campus email address to make the shoes more affordable.</p>
                <a href="#" class="button">Read More</a>
            </div>
            <div class="card">
                <div class="icon">
                    <ion-icon name="bicycle-outline"></ion-icon>
                </div>
                <h2>Quick Delivery Within Campus</h2>
                <p>Ensure fast and free delivery directly to designated campus locations, making it convenient for students.</p>
                <a href="#" class="button">Read More</a>
            </div>
            <div class="card">
                <div class="icon">
                    <ion-icon name="cube-outline"></ion-icon>
                </div>
                <h2>Easy Returns and Exchanges</h2>
                <p> Our hassle-free return policy ensures you're satisfied, even if preferences shift after trying on the shoes.</p>
                <a href="#" class="button">Read More</a>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>