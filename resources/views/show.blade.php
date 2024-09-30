<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Product Details</title>
    <style>
        body {
            background: black;
            color: white;
        }

        .form-group {
            margin: 20px;
            text-align: center;
        }
        img {
            width: 300px;
            height: 300px;
            margin: 20px 0;
        }

        .btn-outline-primary {
            width: 50%;
            margin-top: 10px;
        }

        @media (max-width: 576px) {
            .form-group {
                margin: 10px;
            }

            h3 {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            img {
                max-width: 100%;
            }
        }
    </style>
</head>
<body class="p-5">
    <div class="form-group">
        <h3>Name:<br><br>{{$shoes->name}}</h3>
        <img src="{{asset('images')}}/{{ $shoes->image}}" alt="{{$shoes->name}} Image" class="img-fluid">
        <h3>Description:<br><br>{{$shoes->description}}</h3>
        <h3>Price:<br><br>₱{{$shoes->price}}</h3>
      <a href="/dashboard!2HmHzjLE90zxbdgftcxnbsazxctyr538djf!" class="btn btn-outline-primary mt-3 shadow">Back</a>

    </div>
</body>
</html>