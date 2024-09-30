
@extends('cartmessage')
   
@section('content')

<style>
    body {
        background: black;
        color: white;
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
            display: inline-block;
        }
    }
</style>
<table id="cart" class="table table-bordered" s>
    <thead>
        <tr style="color: white;">
            <th style="width:50%" class="text-center">Product Name</th>
            <th style="width:1%" class="text-center">Image</th>
            <th style="width:10%" class="text-center">Price</th>
            <th style="width:8%" class="text-center">Quantity</th>
            <th style="width: 8%" class="text-center">US Size</th>
            <th style="width:22%" class="text-center">Subtotal</th>
        </tr>
    </thead>
    <tbody style="background: black;">
        @php $total = 0 @endphp

        @forelse($cartItems as $cartItem)
            @php $total += $cartItem->price * $cartItem->quantity @endphp
            <tr rowId="" style="color: white;">
                <td data-th="Name">
                    <h4 class="text-center mt-4">{{ $cartItem->name }}</h4>
                </td>
                <td data-th="Image">
                    <p><img src="{{ asset('images')}}/{{ $cartItem->image }}" class="card-img-top"/></p>
                </td>
                <td data-th="Price" class="text-center"><p class="mt-4">₱{{ number_format($cartItem->price) }}</p></td>
                <td data-th="Quantity">
                    <p class="mt-3"><input type="number" value="{{ $cartItem->quantity}}" class="form-control quantity cart_update" min="1" readonly/></p>
                </td>
                <td data-th="Size">
                    <p class="mt-3"><input type="number" value="{{ $cartItem->size}}" class="form-control size cart_size" min="6" max="10" readonly/></p>
                </td>
                <td data-th="Subtotal" class="text-center"><p class="mt-4">₱{{ number_format($cartItem->price * $cartItem->quantity) }}</p></td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">You haven't ordered anything yet.</td>
            </tr>
        @endforelse
        
    </tbody>
    <tfoot>
        <tr style="color: white;">
            <td colspan="6" style="text-align: right;"><h3><strong>Total: ₱{{ number_format($total) }} </strong></h3></td>
        </tr>
        <tr>
            <td colspan="6" class="text-center">
                <form action="/session" method="POST">
                <a href="{{ route('home') }}" class="btn btn-outline-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type='hidden' name="productname" id="productname" value="Sneakersphere Shoes">
                <input type='hidden' name="total" id="total" value="{{$total}}">
                </form>
            </td>
        </tr>
        
    </tfoot>
</table>
@endsection
