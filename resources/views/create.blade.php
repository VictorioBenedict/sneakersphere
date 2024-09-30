<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create</title>
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
<body class="p-5">
    <h1>Add Product</h1>
    <div class="form-group">
        <form action="{{route('create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Jordan 1">

            <label>Image</label>
            <input type="text" name="image" class="form-control" required placeholder="1.png">

            <label>Description</label>
            <input type="text" name="description" class="form-control" required placeholder="Released on April 1, 1985, Peter Moore, a creative director at Nike, designed Air Jordan 1, which retailed for $65. The Jordan Brand had made Nike more than $100 million by the end of the year.">

            <label>Price</label>
            <input type="number" name="price" class="form-control" required placeholder="₱1000">
            
            <input type="submit" name="submit" value="Create" class="btn btn-outline-primary mt-3 shadow">
            <a href="{{route('dashboard')}}" class="btn btn-outline-primary mt-3 shadow">Back</a>            
        </form>
    </div>
</body>
</html>
