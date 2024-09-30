<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Dashboard</title>
    <style>
        body {
            background: black;
        }

        h1, th, td {
            color: white;
        }

        .form-value {
            color: green;
        }

        @media (max-width: 768px) {
            .float-end {
                float: none;
                margin-bottom: 10px;
            }
            
            .col-md-6 {
                max-width: 100%;
                flex: 0 0 100%;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .table {
                overflow-x: auto;
                display: block;
            }

            .table thead,
            .table tbody,
            .table th,
            .table td,
            .table tr {
                display: block;
            }

            .table thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            .table tr {
                border: 1px solid #ccc;
            }

            .table td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            .table td:before {
                content: attr(data-label);
                position: absolute;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            .action-buttons {
                text-align: center;
            }

            .action-buttons a,
            .action-buttons button {
                display: block;
                margin-bottom: 5px;
                width: 100%;
            }

            .action-buttons form {
                display: inline-block; /* Prevent form from taking full width */
            }
        }
    </style>
</head>
<body class="p-5">
   <table class="table table-bordered">
    <h1 class="text-center mb-3">SNEAKERSPHERE ADMIN</h1>
    @if(Session::has('success'))
    <div class="form-value">
       <h5 class="form-value text-center">{{ Session::get('success') }}</h5>
    </div>
    @endif
    <br>
    <div class="container mb-3 text-center">
        <a href="{{route('create')}}" class="btn btn-outline-primary shadow">Add New Product</a>
        <a href="{{route('login')}}" class="btn btn-outline-primary shadow">Logout</a>        
    </div>
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('search') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ isset($search) ? $search : '' }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <thead class="text-center">
        <tr>
            <th data-label="ID" style="width: 5%">ID</th>
            <th data-label="Name" style="width: 7%">Name</th>
            <th data-label="Image" style="width: 5%">Image</th>
            <th data-label="Description" style="width: 50%">Description</th>
            <th data-label="Price" style="width: 5%">Price</th>
            <th data-label="Actions" class="text-center" style="width: 11%">Actions</th>
        </tr>
    </thead>

    <tbody class="text-center">
        @forelse($shoes as $shoe)
        <tr>
            <td data-label="ID">{{$shoe->id}}</td>
            <td data-label="Name" style="font-size: 20px;">{{$shoe->name}}</td>
            <td data-label="Image"><img src="{{asset('images')}}/{{ $shoe->image}}" style="height: 80px;"></td>
            <td data-label="Description">{{$shoe->description}}</td>
            <td data-label="Price">₱{{$shoe->price}}</td>
            <td data-label="Actions" class="action-buttons">
                <form action="{{route('destroy',$shoe->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('edit',$shoe->id)}}" class="btn btn-outline-success shadow">Edit</a>
                    <a href="{{route('show',$shoe->id)}}" class="btn btn-outline-info shadow">Show</a>
                    <button type="submit" class="btn btn-outline-danger shadow">Delete</button>                    
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No Products Added</td>
        </tr>
        @endforelse
    </tbody>
   </table>
</body>
</html>

