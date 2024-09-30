

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Products</title>
    <style>
        body {
            background: black;
            color: white;
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin: 20px;
        }

        label {
            color: white;
        }

        @media (max-width: 768px) {
            .form-group {
                margin: 10px;
            }
        }
    </style>
</head>
<body class="p-5" style="background: black;">
   <table class="table table-bordered">
        @if (Session::has('success'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="{{ route ('edit',$shoes->id) }}" method="POST">
            @method("PUT")
            @csrf
            <h1 class="text-center" style="color: white;">Edit Product</h1>
            <div class="form-group">
                <label style="color: white;">Name</label>
                <input type="text" name="name" class="form-control" value="{{$shoes->name}}">

                <label style="color: white;">Image</label>
                <input type="text" name="image" class="form-control" value="{{$shoes->image}}">

                <label style="color: white;">Description</label>
                <input type="text" name="description" class="form-control" value="{{$shoes->description}}">

                <label style="color: white;">Price</label>
                <input type="number" name="price" class="form-control" value="{{$shoes->price}}">
                
                <input type="submit" name="submit" class="btn btn-outline-success mt-3 shadow" value="Update">
                <a href="/dashboard!2HmHzjLE90zxbdgftcxnbsazxctyr538djf!" class="btn btn-outline-primary mt-3 shadow">Back</a>                
            </div>
        </form>
   </table>
</body>
</html>