<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('cssfile/developers.css')}}">
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
        justify-content: center; /* Center the cards */
    }

    .card {
        background: #f8f9fa;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 20px;
        padding: 20px;
        text-align: center;
        width: 300px;
    }

    .card img {
        width: 100%;
        height: auto;
        border-radius: 50%;
    }

    .icon {
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
            margin: 20px 0; /* Adjust margin for better spacing on smaller screens */
        }
    }
</style>

</head>
<body>
    @include('nav')
    <div class="section">
        <div class="title">
            <h1>Our Developers</h1>
        </div>
        <div class="services">
            <div class="card">
                <div class="icon">
                    <img src="{{asset('developersimg/benedict.jpg')}}" alt="">
                </div>
                <br>
                <h3>Benedict Victorio</h3>
                <br>
                <h5>Full-Stack Developer</h5>
                <p></p>
                <a href="#" class="button">Read More</a>
            </div>
            <div class="card">
                <div class="icon">
                    <img src="{{asset('developersimg/raniel.png')}}" alt="">
                </div>
                <br>
                <h3>Raniel Soriano</h3>
                <br>
                <h5>Backend Developer</h5>
                <p></p>
                <a href="#" class="button">Read More</a>
            </div>
            <div class="card">
                <div class="icon">
                    <img src="{{asset('developersimg/claude.jpg')}}" alt="">
                </div>
                <br>
                <h3>Claude De Guzman</h3>
                <br>
                <h5>Android Developer</h5>
                <p></p>
                <a href="#" class="button">Read More</a>
            </div>
            <div class="card">
                <div class="icon">
                    <img src="{{asset('developersimg/alexis.gif')}}" alt="">
                </div>
                <br>
                <h3>Alexis Aquino</h3>
                <br>
                <h5>Database Manager</h5>
                <p></p>
                <a href="#" class="button">Read More</a>
            </div>
            <div class="card">
                <div class="icon">
                    <img src="{{asset('developersimg/dar.jpg')}}" alt="">
                </div>
                <br>
                <h3>Dar Calonia</h3>
                <br>
                <h5>UI/UX Designer</h5>
                <p></p>
                <a href="#" class="button">Read More</a>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>